<?php declare(strict_types=1);

namespace WSC\TagManagerSW6;

use Shopware\Core\Framework\Plugin;

class TagManagerSW6 extends Plugin
{

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatch_Frontend' => 'onFrontend',
        ];
    }
     
    public function onFrontend(\Enlight_Event_EventArgs $args){
        $controller = $args->getSubject();
        $view = $controller->View();
        $view->addTemplateDir($this->getPath() . '/Resources/views');
      }    

}