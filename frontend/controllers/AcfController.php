<?php

namespace frontend\controllers;

use \yii\web\Controller;
use yii\filters\AccessControl;

class AcfController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['public', 'user'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['public'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['user'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionPublic()
    {
        return $this->render('public');
    }

    public function actionUser()
    {
        return $this->render('user');
    }

}
