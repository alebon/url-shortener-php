<?php

class Router
{

    /**
     * Map path to controller/action
     *
     * @param string $url
     * @return ControllerInterface
     */
    public static function getController($url)
    {
        // Main page will render form
        if (empty($url)) {
            return new LinkController('form');
        }

        switch($url) {
            case 'add':
                // Form submission to this route
                return new LinkController('ajaxAdd');
                break;
            default:
                // Detect short urls or 404
                if (strlen($url) === Generator::DEFAULT_SHORT_URL_LENGTH) {
                    return new LinkController('redirect');
                } else {
                    return new NotFoundController('index');
                }
                break;
        }
    }

}