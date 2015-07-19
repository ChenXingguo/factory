<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form about `common\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'company_id', 'production_cost', 'shipping_f2dc'], 'integer'],
            [['lang', 'product_name', 'product_code', 'product_category', 'description', 'pkg_length', 'pkg_width', 'pkg_height', 'length_unit', 'pkg_weight', 'weight_unit', 'created_at', 'updated_at'], 'safe'],
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
        $query = Product::find();

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
            'product_id' => $this->product_id,
            'company_id' => $this->company_id,
            'production_cost' => $this->production_cost,
            'shipping_f2dc' => $this->shipping_f2dc,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'lang', $this->lang])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'product_code', $this->product_code])
            ->andFilterWhere(['like', 'product_category', $this->product_category])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'pkg_length', $this->pkg_length])
            ->andFilterWhere(['like', 'pkg_width', $this->pkg_width])
            ->andFilterWhere(['like', 'pkg_height', $this->pkg_height])
            ->andFilterWhere(['like', 'length_unit', $this->length_unit])
            ->andFilterWhere(['like', 'pkg_weight', $this->pkg_weight])
            ->andFilterWhere(['like', 'weight_unit', $this->weight_unit]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchByCompanyId($companyId)
    {
        $query = Product::findAll(['company_id' => $companyId]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }
}
