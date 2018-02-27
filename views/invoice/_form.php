<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */
/* @var $form yii\widgets\ActiveForm */

$rows = (new \yii\db\Query())
    ->select(['id', 'name'])
    ->from('status')
    ->all();
$rows = ArrayHelper::index($rows, 'id');
$rows = ArrayHelper::getColumn($rows, 'name');
?>

<div class="invoice-form">

    <?php
        $form = ActiveForm::begin();
        if (isset($action)) {
            $form->action = $action;
        }
    ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'in')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_id')->dropDownList($rows) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'name' => 'formBtn', 'id' => 'formBtn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
