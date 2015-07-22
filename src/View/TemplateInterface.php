<?php

/**
 * Interface TemplateInterface
 *
 *  template handles rendering of a view
 */
interface TemplateInterface
{
    /**
     * @return mixed
     */
    public function render();

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function bindViewVar($key, $value);
}