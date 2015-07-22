<?php

/**
 * Class Template
 *
 * A template handles rendering of a view
 */
class Template implements TemplateInterface
{
    /** @var ControllerInterface */
    protected $controller;

    /** @var  string */
    protected $renderedAction;

    /** @var  array */
    protected $vars;

    /**
     * Class constructor
     *
     * @param ControllerInterface $controller
     * @param string $action
     */
    public function __construct(ControllerInterface $controller, $action)
    {
        $this->controller = $controller;
        $this->renderedAction = $action;
        $this->vars = array();
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function bindViewVar($key, $value)
    {
        $this->vars[$key] = $value;
    }

    /**
     *
     */
    public function render()
    {
        // On ajax requests, return JSON data instead of html
        if (strpos($this->renderedAction, 'ajax') !== false) {
            echo json_encode($this->vars);
            return;
        }

        /** Expose template vars */
        extract($this->vars);

        //var_dump('Rendering view for controller [' . $this->controller->name() .'] - Action: ' .$this->renderedAction);

        /** @var string $templatePath */
        $templatePath = ROOT . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'View'
            . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $this->controller->name()
            . DIRECTORY_SEPARATOR . $this->renderedAction . '.php';

        if (file_exists($templatePath)) {
            include ($templatePath);
        }
    }
}