<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "status_servis".
 *
 * @property integer $status_id
 * @property string $Status
 */
class StatusServis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_servis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Status'], 'required'],
            [['Status'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Status_id' => 'Status ID',
            'Status' => 'Status',
        ];
    }
}
