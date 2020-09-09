<?php

class IndexView
{
    private $model;
    private $controller;

    public function __construct($controller=null,$model = null) {
        $this->controller = $controller;
        $this->model = $model;
    }
	
    public function make(){
        $html = <<<HTML
                <div class="row">
                    <div class="eight wide computer only fourteen wide mobile only tablet only column">
                        <div class="ui two item menu">
                            <a href="./users" class="item"><i class="user outline icon"></i>Users</a>
                            <a href="./advertisements" class="item"><i class="newspaper outline icon"></i>Advertisements</a>
                        </div>
                    </div>
                </div>
HTML;
                return $html;
    }
}

?>
