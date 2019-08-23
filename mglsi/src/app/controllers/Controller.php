<?php
namespace App\Controllers;


class Controller
{
    private $views_path;
    private $layout;

    public function __construct()
    {
        $this->views_path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
        $this->layout = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR;
    }

    public function view($path, $data = [])
    {
        ob_start();

        extract($data);
        $parts = explode('.', $path);
        $path = implode(DIRECTORY_SEPARATOR, $parts);
        //var_dump($this->views_path . "$path");
        require $this->views_path . "$path" . '.php';

        $content = ob_get_clean();
        require $this->layout . 'layout.php';

    }

    public function view_log($path, $data = [])
    {
        ob_start();

        extract($data);
        $parts = explode('.', $path);
        $path = implode('/', $parts);
        require $this->views_path . "$path" . '.php';

        $content = ob_get_clean();
        require $this->layout . 'log.php';

    }

    public function view_err($path, $data = [])
    {
        ob_start();

        extract($data);
        $parts = explode('.', $path);
        $path = implode('/', $parts);
        require $this->views_path . "$path" . '.php';

        $content = ob_get_clean();
        require $this->layout . '404.php';

    }


}