<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CuotaTaller;

/**
 * CuotaTallerSearch represents the model behind the search form about `backend\models\CuotaTaller`.
 */
class CuotaTallerSearch extends CuotaTaller
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_cuota', 'id_taller', 'obligatoria', 'tipo_periodo'], 'integer'],
            [['nombre', 'comentario'], 'safe'],
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
        $query = CuotaTaller::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_cuota' => $this->id_cuota,
            'id_taller' => $this->id_taller,
            'obligatoria' => $this->obligatoria,
            'tipo_periodo' => $this->tipo_periodo,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'comentario', $this->comentario]);

        return $dataProvider;
    }
    
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchByTaller($params,$id)
    {
        $query = CuotaTaller::findBySql('select * from tbl_cuota_taller where id_taller = ' .$id);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id' => $this->id,
            'id_cuota' => $this->id_cuota,
            'id_taller' => $this->id_taller,
            'obligatoria' => $this->obligatoria,
            'tipo_periodo' => $this->tipo_periodo,
        ]);
        
        $query->andFilterWhere(['like', 'nombre', $this->nombre])
        ->andFilterWhere(['like', 'comentario', $this->comentario]);
        
        return $dataProvider;
    }
}
