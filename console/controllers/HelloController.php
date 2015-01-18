<?php

namespace console\controllers;

use yii\helpers\Console;
use yii\helpers\FileHelper;
use yii\console\Controller;

class HelloController extends Controller
{
    public function  actionAdd()
    {
        $path = "files/";
        $name = "hello.txt";
        $text = "Hello, World!";
        FileHelper::createDirectory($path, 0777, true);
        if(file_put_contents($path.$name, $text)){
            echo "Recorded";
        }

    }

}