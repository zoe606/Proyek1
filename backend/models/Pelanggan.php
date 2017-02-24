<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pelanggan".
 *
 * @property integer $id
 * @property string $Nama
 * @property string $Alamat
 * @property integer $Kontak
 * @property integer $User_id
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
            [['Nama', 'Alamat', 'Kontak', 'User_id'], 'required'],
            [['Kontak', 'User_id'], 'integer'],
            [['Nama'], 'string', 'max' => 50],
            [['Alamat'], 'string', 'max' => 100],
            [['User_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_id' => 'id']],
        ];
    }

	public function getUser()
	{
		$usr=User::findOne($this->User_id);
		if ($usr!=null)
			return $this->hasOne(User::className(),['id' => 'User_id']);
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
            'Nama' => 'Nama',
            'Alamat' => 'Alamat',
            'Kontak' => 'Kontak',
            'User_id' => 'User ID',
        ];
    }
}
