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
            [['Nama', 'Alamat', 'Kontak','user_id'], 'required'],
            [['Kontak'], 'string', 'max' => 21],
            [['user_id','lama_kerja'], 'integer'],
            [['Nama', 'Alamat','start_time','end_time'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_teknisi' => 'Id Teknisi',
            'Nama' => 'Nama Teknisi',
            'Alamat' => 'Alamat',
            'Kontak' => 'Kontak',
            'user_id' => 'Login',
            'start_time' => 'Mulai Kerja',
            'end_time' => 'Terakhir Kerja',
            'lama_kerja' => 'Lama kerja'
        ];
    }

    public function getKerja()
    {
      $time1 = 'start_time';
      $time2 = 'end_time';
      $interval = $time1->diff($time2);
    }
}
