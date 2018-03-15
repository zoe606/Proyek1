<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $no_servis
 * @property int $teknisi_id
 * @property int $pelanggan_id
 * @property int $status_id
 * @property string $tanggal
 * @property string $barang
 * @property int $totalharga
 * @property string $keterangan
 *
 * @property Servis $noServis
 * @property Teknisi $teknisi
 * @property Pelanggan $pelanggan
 * @property StatusServis $status
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_servis', 'teknisi_id', 'pelanggan_id', 'status_id'], 'required'],
            [['no_servis', 'teknisi_id', 'pelanggan_id', 'status_id', 'totalharga'], 'integer'],
            [['tanggal','barang'], 'safe'],
            [['keterangan'], 'string'],
            #[['barang'], 'string', 'max' => 1000],
            [['no_servis'], 'exist', 'skipOnError' => true, 'targetClass' => Servis::className(), 'targetAttribute' => ['no_servis' => 'No_Servis']],
            [['teknisi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teknisi::className(), 'targetAttribute' => ['teknisi_id' => 'id_teknisi']],
            [['pelanggan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pelanggan::className(), 'targetAttribute' => ['pelanggan_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => StatusServis::className(), 'targetAttribute' => ['status_id' => 'Status_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_servis' => 'No Servis',
            'teknisi_id' => 'Teknisi ID',
            'pelanggan_id' => 'Pelanggan ID',
            'status_id' => 'Status ID',
            'tanggal' => 'Tanggal',
            'barang' => 'Barang',
            'totalharga' => 'Totalharga',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoServis()
    {
        return $this->hasOne(Servis::className(), ['No_Servis' => 'no_servis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeknisi()
    {
        return $this->hasOne(Teknisi::className(), ['id_teknisi' => 'teknisi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggan()
    {
        return $this->hasOne(Pelanggan::className(), ['id' => 'pelanggan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(StatusServis::className(), ['Status_id' => 'status_id']);
    }

    /*public function getNamaplg()
  	{
  			return $this->hasOne(Pelanggan::className(),['id' => 'pelanggan_id']);
  	}*/
}
