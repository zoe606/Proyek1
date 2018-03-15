<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pelanggan;
use common\models\User;
use yii\helpers\VarDumper;
/**
 * PelangganSearch represents the model behind the search form of `backend\models\Pelanggan`.
 */
class PelangganSearch extends Pelanggan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'User_id'], 'integer'],
            [['Nama', 'Kontak', 'Alamat'], 'safe'],
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
		if (Yii::$app->user->identity->isAdmin) 
				$query = Pelanggan::find();
			else 
				$query = Pelanggan::find()->where('User_id=:user',[':user'=>Yii::$app->user->identity->id]);
		 
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
            'Kontak' => $this->Kontak,
            'User_id' => $this->User_id,
        ]);

        $query->andFilterWhere(['like', 'Nama', $this->Nama])
            ->andFilterWhere(['like', 'Alamat', $this->Alamat]);

        return $dataProvider;
    }
}
