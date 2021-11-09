<?php $this->title = 'Моя тестовая страничка';?>

<?php
$this->registerMetaTag(['name' => 'description', 'content' => 'мета описание'], 'description');
$this->registerMetaTag(['name' => 'description', 'content' => 'мета описание2'], 'description');

?>


<p><code><?= __FILE__?></code></p>

<?php //$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']); ?>

<?php

$js = <<<JS
alert('Hellow');
JS;

$this->registerJs($js, \yii\web\View::POS_LOAD);
?>
