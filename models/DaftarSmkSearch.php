<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DaftarSmk;

/**
 * DaftarSmkSearch represents the model behind the search form of `app\models\DaftarSmk`.
 */
class DaftarSmkSearch extends DaftarSmk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['npsn', 'nama_sekolah', 'no_telpn', 'akreditasi', 'created_at', 'updated_at'], 'safe'],
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
        $query = DaftarSmk::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'npsn', $this->npsn])
            ->andFilterWhere(['like', 'nama_sekolah', $this->nama_sekolah])
            ->andFilterWhere(['like', 'no_telpn', $this->no_telpn])
            ->andFilterWhere(['like', 'akreditasi', $this->akreditasi]);

        return $dataProvider;
    }
}
