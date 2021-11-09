<?php

namespace app\controllers;

use yii\web\View;

class TestController extends AppController
{
//    public $defaultAction = 'my-test';
    public $my_var;
//    public $layout = 'test';
    /*public function actions()
    {
        return [
            // объявляет "error" действие с помощью названия класса
            'test' => 'app\components\HelloAction',
        ];
    }*/

    public function actionIndex($name='user', $age=32)
    {
        //debug(\Yii::getAlias('@webroot'));
        //debug(\Yii::getAlias('@web'));

        $this->layout = 'test';
        $this->my_var = 'My Variable';

        //Rendering
        /*return $this->renderFile('@app/views/test/index.php');
        return $this->renderAjax('index');
        return $this->renderPartial('index');*/

//        debug(\Yii::$app);
//        \Yii::$app->view->params['t1'] = 'T1 Params';
        $this->view->params['t1'] = 'T1 Params';
        $this->view->title = 'Test Page';

        //RegisterMetaTage
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета описание 3'], 'description');

        //Event date show
        \Yii::$app->view->on(View::EVENT_END_BODY, function () {
            echo "<p>&copy; Yii2 ".date('Y')."</p>";
        });

        //COmpact rendering
        return $this->render('index', compact('name', 'age'));
        /*return $this->render('index', [
            'name' => $name,
            'age' => $age,
        ]);*/
    }

    public function actionMyTest()
    {
        return $this->render('my-test');
    }



}