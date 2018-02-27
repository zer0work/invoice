<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $invoices app\models\Invoice */

$this->title = 'Накладные';
?>
<div class="invoice-index">

    <p>
        <?= Html::a('Создать накладную', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php Pjax::begin(); ?>
        <table class="table table-bordered table-striped">
            <tr>
                <th><input type="checkbox" id="checkall"></th>
                <th><?= $sort->link('from') ?></th>
                <th><?= $sort->link('in') ?></th>
                <th><?= $sort->link('client') ?></th>
                <th><?= $sort->link('status_id') ?></th>
                <th></th>
            </tr>


                <?php foreach ($invoices as $invoice): ?>
                    <tr>
                        <td><input type="checkbox" name="id[]" value="<?= $invoice->id ?>"></td>
                        <td><?= $invoice->from ?></td>
                        <td><?= $invoice->in ?></td>
                        <td><?= $invoice->client ?></td>
                        <td><?= $invoice->status ?></td>
                        <td><?php
                            Modal::begin([
                                'clientOptions' => ['backdrop' => false],
                                'toggleButton' => [
                                    'tag' => 'a',
                                    'label' => 'Изменить',
                                ]
                            ]);
                            $action = '/invoice/update?id=' . $invoice->id;
                            echo $this->render('_form', ['model' => $invoice, 'action' => $action]);

                            Modal::end();
                            ?> | <a href="/invoice/delete?id=<?= $invoice->id ?>" data-method="post">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </table>
    <?php Pjax::end(); ?>
        <div class="form-group">
        <?= Html::dropDownList(
                'dropdown',
              'null',
                ['all'=> 'Удалить все', 'selected' => 'Только выбранные'],
                ['prompt' => 'Удалить', 'id' => 'dropdown']
        ) ?>
            <?= Html::Button('Применить', ['class' => 'btn btn-default', 'name' => 'delBtn', 'data-method'=>'post', 'onclick'=>'delInvoice()']) ?>
        </div>

</div>