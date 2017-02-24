<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelanggan".
 *
 * @property string $id_Pelanggan
 * @property string $Password
 * @property string $Nama
 * @property string $Alamat
 * @property integer $Kontak
 */
class Pelanggan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelanggan';
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
			'Nama' => 'Nama',
            'Alamat' => 'Alamat',
            'Kontak' => 'Kontak',
        ];
    }
}
