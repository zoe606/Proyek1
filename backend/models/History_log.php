<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "history_log".
 *
 * @property integer $id
 * @property integer $No_Servis
 * @property string $Tanggal
 */
class History_log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'history_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No_Servis', 'Tanggal'], 'required'],
            [['No_Servis','Status_servis','Teknisi_id'], 'integer'],
			#[['Keterangan'], 'String'],
            #[['updated_by'], 'String'],
            [['Tanggal'], 'safe'],
            [['No_Servis'], 'exist', 'skipOnError' => true, 'targetClass' => Servis::className(), 'targetAttribute' => ['No_Servis' => 'No_Servis']],

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

  public function getTeknisi()
	{
		$Teknisi=Teknisi::findOne($this->Teknisi_id);
		if ($Teknisi!=null)
			return $this->hasOne(Teknisi::className(),['id_teknisi' => 'Teknisi_id']);
		else
			return null;
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'No_Servis' => 'No  Servis',
            'Tanggal' => 'Tanggal',
			'Status_servis' => 'Status servis',
      'Teknisi_id' => 'Teknisi_id',
			'Keterangan' => 'Keterangan',
      'updated_by' => 'Updated By'
        ];
    }
}
