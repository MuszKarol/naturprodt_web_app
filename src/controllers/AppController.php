<?php


class AppController
{
    private $request;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isPost(): bool {
        return $this-> request === 'POST';
    }

    protected function isGet(): bool {
        return $this->request === 'GET';
    }


    protected function render(String $template = null, array $variables = [])
    {
        $templatePath = 'public/views/'. $template.'.php';
        $output = 'File not found';

        if(file_exists($templatePath))
        {
            extract($variables);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }

        print $output;
    }

    protected function sessionCheck(): void
    {
        if(!isset($_SESSION['user']))
            header("Location: http://$_SERVER[HTTP_HOST]");
    }
}