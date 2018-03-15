<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "servis".
 *
 * @property integer $No_Servis
 * @property string $Deskripsikan_kerusakan
 * @property integer $Status_servis
 * @property integer $Teknisi_id_teknisi
 * @property integer $Pelanggan_id
 */
class Servis extends \yii\db\ActiveRecord
{
	public $keterangan;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Deskripsikan_kerusakan'], 'required'],
            [['Deskripsikan_kerusakan'], 'string'],
            [['Status_servis', 'Teknisi_id', 'Pelanggan_id'], 'integer'],
            [['Pelanggan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pelanggan::className(), 'targetAttribute' => ['Pelanggan_id' => 'id']],
						#[['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['Status_servis'], 'exist', 'skipOnError' => true, 'targetClass' => StatusServis::className(), 'targetAttribute' => ['Status_servis' => 'status_id']],
            [['Teknisi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teknisi::className(), 'targetAttribute' => ['Teknisi_id' => 'id_teknisi']],
						[['Tanggal'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'No_Servis' => 'No  Servis',
            'Deskripsikan_kerusakan' => 'Deskripsikan Kerusakan',
            'Status_servis' => 'Status Servis',
            'Teknisi_id' => 'Teknisi id',
						#'order_id' => 'Nomor Order',
            'Pelanggan_id' => 'Pelanggan ID',
						'Tanggal' => 'Tanggal',
        ];
    }

	public function getStatus()
	{
		$status=StatusServis::findOne($this->Status_servis);
		if ($status!=null)
			return $this->hasOne(StatusServis::className(),['Status_id' => 'Status_servis']);
		else
			return null;
	}

	public function getNama()
	{
		$Nama=Pelanggan::findOne($this->Pelanggan_id);
		if ($Nama!=null)
			return $this->hasOne(Pelanggan::className(),['id' => 'Pelanggan_id']);
		else
			return null;
	}

	public function getTeknisi()
	{
		$Teknisi=Teknisi::findOne($this->Teknisi_id);
		if ($Teknisi!=null)
			return $this->hasOne(Teknisi::className(),['id_teknisi' => 'Teknisi_id']);
		else
			return null;
	}

	public function getOrders()
	{
			return $this->hasOne(Orders::className(), ['no_servis' => 'No_Servis']);
	}


}
