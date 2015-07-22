<?php

abstract class WebController implements ControllerInterface
{
    /** @var  TemplateInterface */
    protected $template;
    /** @var  string */
    protected $action;
    /** @var  \MongoClient */
    protected $db;


    public function __construct($action)
    {
        $this->template = new Template($this, $action);
        $this->action = $action;
    }

    /**
     * Apply model var to view
     *
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        $this->template->bindViewVar($name, $value);
    }

    /**
     * Render
     */
    public function __destruct()
    {
        $this->template->render();
    }

    /**
     * @return string
     */
    public function name()
    {
        return str_replace("Controller", "", get_class($this));
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }


    /**
     * @param MongoClient $mongoClient
     */
    public function setDb(\MongoClient $mongoClient)
    {
        $this->db = $mongoClient;
        $this->db->connect();
    }

    /**
     * @param TemplateInterface $template
     * @return void
     */
    public function setTemplate(TemplateInterface $template)
    {
        $this->template = $template;
    }


    /**
     * Return the mongo collection with given name
     *
     * @param $name
     * @return \MongoCollection
     */
    protected function getCollection($name)
    {
        if (!$this->db) {
            global $config;
            $this->setDb(MongoProvider::getClient($config['db']['host'], array()));
        }

        return $this->db->selectCollection('shortener', 'links');
    }
}
