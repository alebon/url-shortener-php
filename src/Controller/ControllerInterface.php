<?php

interface ControllerInterface
{
    /**
     * @return string
     */
    public function name();

    /**
     * @return string
     */
    public function getAction();

    /**
     * @param MongoClient $mongoClient
     * @return void
     */
    public function setDb(\MongoClient $mongoClient);

    /**
     * @param TemplateInterface $template
     * @return void
     */
    public function setTemplate(TemplateInterface $template);
}