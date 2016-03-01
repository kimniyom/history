<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Masuser;

/**
 * MasuserSearch represents the model behind the search form about `app\models\Masuser`.
 */
class MasuserSearch extends Masuser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'flag'], 'integer'],
            [['username', 'password', 'name', 'lname', 'card', 'hospcode', 'create_date'], 'safe'],
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
        $query = Masuser::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'flag' => $this->flag,
            'create_date' => $this->create_date,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'card', $this->card])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode]);

        return $dataProvider;
    }
}
