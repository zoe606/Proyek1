<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\History_log;

/**
 * History_logSearch represents the model behind the search form of `backend\models\History_log`.
 */
class History_logSearch extends History_log
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'No_Servis','Teknisi_id'], 'integer'],
            [['Tanggal','updated_by'], 'safe'],
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
        $query = History_log::find();

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
            'No_Servis' => $this->No_Servis,
            'Tanggal' => $this->Tanggal,
            'Teknisi_id' => $this->Teknisi_id,
            //'updated_by' => $this->updated_by,

        ]);

        return $dataProvider;
    }
}
