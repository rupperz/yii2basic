<?php

namespace app\controllers;

use app\models\EntryForm;
use yii\web\Response;
use yii\widgets\ActiveForm;

//use yii\web\View;

class TestController extends AppController
{
//    public $defaultAction = 'my-test';
//    public $my_var;
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
        //$this->my_var = 'My Variable';

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
        /*\Yii::$app->view->on(View::EVENT_END_BODY, function () {
            echo "<p>&copy; Yii2 ".date('Y')."</p>";
        });*/


        $model = new EntryForm();
//        debug($model);

        $model->load(\Yii::$app->request->post());
        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            if($model->validate()){
                return ['message' => 'ok'];
            }else{
                return ActiveForm::validate($model);
            }
            //return ActiveForm::validate($model);
        }
        /*if($model->load(\Yii::$app->request->post()) && $model->validate() ){
            \Yii::$app->session->setFlash('success', 'Данные переданы стандартно');
            return $this->refresh();
//            debug($model);

            if(\Yii::$app->request->isPjax){
                \Yii::$app->session->setFlash('success', 'Данные переданы через Pjax');
                $model = new EntryForm();
            }else{
                \Yii::$app->session->setFlash('success', 'Данные переданы стандартно');
                return $this->refresh();
            }


        }*/


        //COmpact rendering
//        return $this->render('index', compact('name', 'age'));
        return $this->render('index', compact('model'));
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