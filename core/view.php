<?php

class View
{
    function generate($content_view, $data = null,$singleProduct=null)
    {
        include '../resources/home/'.$content_view;
    }
}