<?php

class NotFoundController extends WebController
{

    public function indexAction()
    {
        header("HTTP/1.1 404 Not Found");
    }

}