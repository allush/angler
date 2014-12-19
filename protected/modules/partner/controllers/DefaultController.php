<?php

class DefaultController extends PartnerController
{
    public function actionIndex()
    {
        $this->render('index');
    }
}