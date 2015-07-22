<?php

/**
 * Class LinkController
 */
class LinkController extends WebController
{

    const TOKEN_ATTRIBUTE = "token";
    const URL_ATTRIBUTE = "url";
    const MONGO_COLLECTION = "links";

    /**
     * Render the form with its session token
     */
    public function formAction()
    {
        $token = Generator::getRandomString(25);
        $this->set("token", $token);
        $_SESSION['token'] = $token;
    }

    /**
     * Ajax call to create new shortcut urls
     */
    public function ajaxAddAction()
    {
        if (isset($_SESSION[self::TOKEN_ATTRIBUTE]) && isset($_POST[self::TOKEN_ATTRIBUTE])
            && $_SESSION[self::TOKEN_ATTRIBUTE] === $_POST[self::TOKEN_ATTRIBUTE]
        ) {

            if (isset($_POST[self::URL_ATTRIBUTE]) && $this->isValidLink($_POST[self::URL_ATTRIBUTE])) {
                $this->save($_POST[self::URL_ATTRIBUTE]);
            } else {
                $this->set('error', array(
                    'code' => 100,
                    'message' => 'Please enter a valid url'
                ));
            }

        } else {
            $this->set('error', array(
                'code' => 101,
                'message' => 'Can not process request without valid token'
            ));
        }
    }

    /**
     * Forward the requested short url
     */
    public function redirectAction()
    {
        $params = array('key' => $_GET['url']);
        $records = $this->getCollection(self::MONGO_COLLECTION)->find($params);

        if ($records->hasNext()) {
            $record = $records->getNext();
            $this->set('redirectTo', $record['target']);
            header('Location: ' . $record['target']);
        } else {
            $this->set('redirectTo', 'http://' . $_SERVER['SERVER_NAME']);
            header('Location: ' . 'http://' . $_SERVER['SERVER_NAME']);
        }
    }

    /**
     * @param string $link
     * @return bool
     */
    protected function isValidLink($link)
    {
        $validator = new LinkValidator();
        return $validator->isValid($link);
    }

    /**
     * Store url to db
     *
     * @param $url
     */
    protected function save($url)
    {
        $shortLink = Generator::getRandomString();

        $item = array(
            'created' => new \MongoDate(),
            'key' => $shortLink,
            'target' => $url
        );

        $this->getCollection(self::MONGO_COLLECTION)->insert($item);

        $this->set("link", 'http://' . $_SERVER['SERVER_NAME'] . '/' . $shortLink);
    }

}