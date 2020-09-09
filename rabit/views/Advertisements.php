<?php
class AdvertisementsView
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
                    <div class="ten wide computer only sixteen wide mobile tablet only column">
                        <table class="ui striped selectable table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Title</th>
                                </tr>
                            </thead>
                            <tbody>
HTML;

        foreach ($this->controller->getAdvertisements() as $advertisement){
            $html .= sprintf('<tr><td>%s</td><td>%s</td><td>%s</td></tr>',$advertisement->getId(),$advertisement->getUserName(),$advertisement->getTitle());
        }
        
        $html .= <<<HTML
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="ten wide computer only sixteen wide mobile tablet only column">
                        <button class="ui left labeled icon secondary button" onclick="back()">
                            <i class="left arrow icon"></i>
                            Back
                        </button>
                    </div>
                </div>
HTML;
        return $html;
        
    }
}