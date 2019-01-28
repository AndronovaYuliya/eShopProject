<?php

namespace Core;

/**
 * Class View
 * @package Core
 */
class View
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $layout;
    public $prefix;
    public $data = [];
    public $meta = [];


    /**
     * View constructor.
     * @param $route
     * @param string $layout
     * @param string $view
     * @param array $meta
     */
    public function __construct($route, $layout = '', $view = '', $meta = null)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];

        if (!$meta) {
            $meta = ['title' => '', 'desc' => '', 'keywords' => ''];
        }
        $this->meta = $meta;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
    }

    /**
     * @param $data
     * @throws \Exception
     */
    public function rendor($data)
    {
        var_dump($data);die();
        if (is_array($data)) {
            extract($data);
        }

        $fileFile = RESOURCES . "/{$this->prefix}{$this->controller}/{$this->view}.php";

        if (is_file($fileFile)) {
            ob_start();
            require_once $fileFile;
            $content = ob_get_clean();
        } else {
            throw new \Exception("View not found {$fileFile}", 500);
        }

        if ($this->layout !== false) {
            $layoutFile = RESOURCES . "/Layouts/{$this->layout}.php";
            if (is_file($layoutFile)) {
                require_once $layoutFile;
            } else {
                throw new \Exception("Layout not found{$this->layout}", 500);
            }
        }
    }

    /**
     * @return string
     */
    public function getMeta()
    {
        $output = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        $output .= '<meta name="description" content="' . $this->meta['desc'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;
        return $output;
    }

    /**
     * @return string
     */
    public function getName()
    {
        if (isset($this->meta['title'])) {
            $title = $this->meta['title'];
            $output = $title[0] . '<span>' . substr($title, 1) . '</span>';
        } else {
            $output = 'e<span>Shop</span>';
        }
        return $output;
    }
}
