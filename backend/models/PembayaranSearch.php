<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pembayaran;

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
        $query = Pembayaran::find();

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
            'No_transaksi' => $this->No_transaksi,
            'Total_harga' => $this->Total_harga,
            'Status_Kerusakan' => $this->Status_Kerusakan,
            'No_Servis' => $this->No_Servis,
        ]);

        $query->andFilterWhere(['like', 'Barang', $this->Barang]);

        return $dataProvider;
    }
}
