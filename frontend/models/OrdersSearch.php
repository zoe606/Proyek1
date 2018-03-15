<?php

namespace frontend\models;

use Yii;
use yii\db\Query;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Orders;
use backend\models\Pelanggan;
use yii\helpers\VarDumper;


/**
 * OrdersSearch represents the model behind the search form of `backend\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'no_servis', 'teknisi_id', 'pelanggan_id', 'status_id', 'totalharga'], 'integer'],
            [['tanggal', 'barang', 'keterangan'], 'safe'],
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
  			$query = Orders::find();
  		}else {
        $query = Orders::find()->where('teknisi_id in (select id_teknisi from Teknisi where user_id ='.Yii::$app->user->identity->id.')');
        #$query = Orders::find();
        #$query = Orders::find()->where('teknisi_id=')
        #$plg = Pelanggan::find()->where('User_id=:user',[':user'=>Yii::$app->user->identity->id])->one();
  			#$query = Orders::find()->where('teknisi_id=:user',[':user'=>Yii::$app->user->identity->id]);
        #$query = Orders::find()->where('teknisi_id in (select id from User where id ='.Yii::$app->user->identity->id.')');
        #varDumper::dump($query,20,true);

  		}

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'no_servis' => $this->no_servis,
            'teknisi_id' => $this->teknisi_id,
            'pelanggan_id' => $this->pelanggan_id,
            'status_id' => $this->status_id,
            'tanggal' => $this->tanggal,
            'totalharga' => $this->totalharga,
        ]);

        $query->andFilterWhere(['like', 'barang', $this->barang])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
