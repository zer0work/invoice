<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property string $from
 * @property string $in
 * @property string $client
 * @property int $status_id
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_id'], 'integer'],
            [['from', 'in', 'client'], 'string', 'max' => 80],
        ];
    }


    public function __get($name) {
        if ($name === 'status') {
            $ret = Status::findOne(['id' => $this->status_id]);
            return $ret->name;
        }
        return parent::__get($name);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'Откуда',
            'in' => 'Куда',
            'client' => 'Получатель',
            'status_id' => 'Статус',
        ];
    }
}
