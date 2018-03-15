<?php

namespace backend\models;
use backend\models\StatusKerusakan;

use Yii;

/**
 * This is the model class for table "pembayaran".
 *
 * @property integer $No_transaksi
 * @property string $Barang
 * @property Status_bayar
 * @property Tanggal_Bayar
 * @property integer $Total_harga
 * @property integer $Status_Kerusakan
 * @property integer $Servis_No_Servis
 */
class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembayaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Status_Kerusakan', 'No_Servis'], 'required'],
            [['Total_harga', 'Status_Kerusakan', 'No_Servis'], 'integer'],
            #[['Barang'], 'string', 'max' => 45],
			[['Barang'], 'safe'],
			      [['Status_bayar'], 'string', 'max' => 6],
			      [['Tanggal_Bayar'], 'string', 'max' => 20],
            [['No_Servis'], 'exist', 'skipOnError' => true, 'targetClass' => Servis::className(), 'targetAttribute' => ['No_Servis' => 'No_Servis']],
            [['Status_Kerusakan'], 'exist', 'skipOnError' => true, 'targetClass' => StatusKerusakan::className(), 'targetAttribute' => ['Status_Kerusakan' => 'Id']],
            [['gambar'],'file','skipOnEmpty'=>TRUE,'extensions'=>'jpg,  jpeg, png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'No_transaksi' => 'No Transaksi',
            'Barang' => 'Barang Diganti',
            'Total_harga' => 'Total Harga',
            'Status_Kerusakan' => 'Status  Kerusakan',
            'No_Servis' => 'No Servis',
			'Status_bayar' => 'Status Bayar',
			'Tanggal_Bayar' => 'Tanggal',
      'gambar' =>Yii::t('app','Bukti Pembayaran'),
        ];
    }


	public function getKerusakan()
	{
		$Kerusakan=StatusKerusakan::findOne($this->Status_Kerusakan);
		if ($Kerusakan!=null)
			return $this->hasOne(StatusKerusakan::className(),['Id' => 'Status_Kerusakan']);
		else
			return null;
	}

  public function getImageurl()
  {
  return \Yii::$app->request->BaseUrl.'@backend/web/uploads/BuktiPembayaran' . $No_transaksi->gambar;
  }

  public function getNoServis()
  {
      return $this->hasOne(Servis::className(), ['No_Servis' => 'No_Servis']);
  }



}
