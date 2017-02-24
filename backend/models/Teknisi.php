<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "teknisi".
 *
 * @property integer $id_teknisi
 * @property string $Nama
 * @property string $Alamat
 * @property integer $Kontak
 */
class Teknisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teknisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nama', 'Alamat', 'Kontak'], 'required'],
            [['Kontak'], 'integer'],
            [['Nama', 'Alamat'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_teknisi' => 'Id Teknisi',
            'Nama' => 'Nama',
            'Alamat' => 'Alamat',
            'Kontak' => 'Kontak',
        ];
    }
}
