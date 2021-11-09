<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

?>

<div class="col-md-12">
    <h2>Страница с формой</h2>
    <?php Pjax::begin();?>
    <?php if(Yii::$app->session->hasFlash('success')):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= Yii::$app->session->getflash('success'); ?>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin([
            'id' => 'my-form',
            'enableClientValidation' => true,
            'options' => [
                    'class' => 'form-horizontal',
                    'data-pjax' => true,
            ],
            'fieldConfig' => [
                    'template' => "{label}\n<div class='col-md-5'>{input}</div>\n<div class='col-md-5'>{hint}</div>\n<div class='col-md-5'>{error}</div>",
                    'labelOptions' => ['class' => 'col-md-2 control-label']
            ]
    ])?>
    <?php echo $form->field($model, 'name')->textInput(['placeholder'=>'Введите имя']);?>

    <?php echo $form->field($model, 'email')->input('email',['placeholder'=>'Введите емаил']);?>

    <?php echo $form->field($model, 'topic',['enableAjaxValidation' => true])->input('text',['placeholder'=>'Тема сообщения']);?>

    <?php echo $form->field($model, 'text')->textarea(['rows' => 7, 'placeholder' =>'Введите текст']);?>

    <div class="form-group">
        <div class='col-md-5 col-md-offset-2'>
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-block'])?>
        </div>
    </div>

    <?php ActiveForm::end()?>
    <?php Pjax::end()?>
</div>

<?php
$js = <<<JS
    var form = $ ('#my-form');
    form.on('beforeSubmit', function(){
       var data = form.serialize();
       $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: data,
            success: function (res){
                console.log(res);
                form[0].reset();
            },
            error: function(){
                console.log(data);
                //alert('Error!');
            }
       })
       return false;
    });
JS;

$this->registerJs($js);

?>

<?/*= $this->render('inc');*/?><!--
<?/*= $this->render('//inc/test.html');*/?>
<p><?/*= $name */?></p>
<p><?/*= $age */?></p>
<p><?/*= $this->params['t1']*/?></p>


<?php /*$this->params['t2'] = 'T2 params'; */?>
<p><?/*= $this->params['t2']*/?></p>


<?php /*$this->beginBlock('block1'); */?>
    <p><?/*= $this->params['t2']*/?></p>
    <p>...содержимое блока 1...</p>

--><?php /*$this->endBlock(); */?>