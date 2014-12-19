<?php

class PartnerModule extends CWebModule
{
    public function init()
    {
//		// this method is called when the module is being created
//		// you may place code here to customize the module or the application
        $this->defaultController = 'default';
//		// import the module-level models and components
        $this->setImport(array(
            'partner.models.*',
            'partner.components.*',
        ));
//        $this->setModules(array(
//            'gii' => array(
//                'class' => 'system.gii.GiiModule',
//                'password' => '777',
//// If removed, Gii defaults to localhost only. Edit carefully to taste.
//                'ipFilters' => array('127.0.0.1', '::1'),
//            ),));
//        Yii::app()->homeUrl = '/partner';
//        Yii::app()->setComponents(array(
//            'errorHandler' => array(
//                'class' => 'CErrorHandler',
//                'errorAction' => $this->getId() . '/site/error',
//            ),
//
//        ), false);
    }
}
