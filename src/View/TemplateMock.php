<?php

class TemplateMock implements TemplateInterface
{

    /**
     * @return mixed
     */
    public function render()
    {
        // Do nothing
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function bindViewVar($key, $value)
    {
        // Do nothing
    }
}