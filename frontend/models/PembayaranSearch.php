<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pembayaran;
use backend\models\Servis;
use backend\models\Pelanggan;
use yii\db\Query;
use yii\helpers\VarDumper;




/**
 * PembayaranSearch represents the model behind the search form of `backend\models\Pembayaran`.
 */
class PembayaranSearch extends Pembayaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No_transaksi', 'Total_harga', 'Status_Kerusakan', 'No_Servis'], 'integer'],
            [['Barang'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        if (Yii::$app->user->identity->isAdmin){
				$query = Pembayaran::find();
		}else{
      $plg = Pelanggan::find()->where('User_id=:user',[':user'=>Yii::$app->user->identity->id])->one();
      //$srv = Servis::find()->where('Pelanggan_id=:user',[':user'=>$plg->id]);
      $query = Pembayaran::find()->where('No_servis in (select No_Servis from Servis where Pelanggan_id ='.Yii::$app->user->identity->id.')');
      #varDumper::dump($query,20,true);

    }
			//$query = new Query;
			// compose the query
			//$query->from('Pembayaran')
				//->where('No_Servis in (select No_Servis from Servis where Pelanggan_id ='.Yii::$app->user->identity->id.')');
        //var_dump($query);
        //exit;
		//}

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'No_transaksi' => $this->No_transaksi,
            'Total_harga' => $this->Total_harga,
            'Status_Kerusakan' => $this->Status_Kerusakan,
            'No_Servis' => $this->No_Servis,
        ]);

        $query->andFilterWhere(['like', 'Barang', $this->Barang]);

        return $dataProvider;
    }
}
