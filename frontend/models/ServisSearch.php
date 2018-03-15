<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Servis;
use backend\models\Pelanggan;

/**
 * ServisSearch represents the model behind the search form of `backend\models\Servis`.
 */
class ServisSearch extends Servis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No_Servis', 'Status_servis', 'Teknisi_id', 'Pelanggan_id'], 'integer'],
            [['Deskripsikan_kerusakan'], 'safe'],
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
        #$query = Servis::find();
		if (Yii::$app->user->identity->isAdmin){
				$query = Servis::find();
		}else{
			$plg = Pelanggan::find()->where('User_id=:user',[':user'=>Yii::$app->user->identity->id])->one();
			$query = Servis::find()->where('Pelanggan_id=:user',[':user'=>$plg->id]);
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
            'No_Servis' => $this->No_Servis,
            'Status_servis' => $this->Status_servis,
            'Teknisi_id' => $this->Teknisi_id,
            'Pelanggan_id' => $this->Pelanggan_id,
        ]);

        $query->andFilterWhere(['like', 'Deskripsikan_kerusakan', $this->Deskripsikan_kerusakan]);

        return $dataProvider;
    }
}
