<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Company;


/**
 * CompanySearch represents the model behind the search form about `common\models\Company`.
 */
class CompanySearch extends Company {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['name', 'licenses', 'industry', 'num_employees', 'address1', 'address2', 'city', 'province', 'postal_code', 'phone', 'fax', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Company::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'licenses', $this->licenses])
                ->andFilterWhere(['like', 'industry', $this->industry])
                ->andFilterWhere(['like', 'num_employees', $this->num_employees])
                ->andFilterWhere(['like', 'address1', $this->address1])
                ->andFilterWhere(['like', 'address2', $this->address2])
                ->andFilterWhere(['like', 'city', $this->city])
                ->andFilterWhere(['like', 'province', $this->province])
                ->andFilterWhere(['like', 'postal_code', $this->postal_code])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'fax', $this->fax]);

        return $dataProvider;
    }

    public function searchCompanyByContact($contactUserId) {
        $query = Company::find()
                ->select('company.*')
                ->innerJoin('contact', '`company`.`id` = `contact`.`company_id`')
                ->where(['contact.user_id' => $contactUserId]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        return $dataProvider;
    }

}
