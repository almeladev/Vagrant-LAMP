<?php

class View
{
    private $templates;

    public function __construct(League\Plates\Engine $e)
    {
        
        $this->templates = $e;
        $this->templates->addData(['titulo' => 'Mi primera APP MVC']);
        $this->templates->registerFunction('borrar_msg_feedback', function(){
                Session::set('feedback_negative', null);
                Session::set('feedback_positive', null);
        });
    }

    public function render($plantilla, $datos=[])
    { 
        return $this->templates->render($plantilla, $datos); 
    } 
}