<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Teknisi;

/**
 * TeknisiSearch represents the model behind the search form of `backend\models\Teknisi`.
 */
class TeknisiSearch extends Teknisi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_teknisi','user_id'], 'integer'],
            [['Nama', 'Alamat', 'Kontak','start_time','end_time','lama_kerja'], 'safe'],
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
        $query = Teknisi::find();

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
            'id_teknisi' => $this->id_teknisi,
            'Kontak' => $this->Kontak,
        ]);

        $query->andFilterWhere(['like', 'Nama', $this->Nama])
            ->andFilterWhere(['like', 'Alamat', $this->Alamat]);

        return $dataProvider;
    }
}
