<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CuotaTallerImp;

/**
 * CuotaTallerImpSearch represents the model behind the search form about `backend\models\CuotaTallerImp`.
 */
class CuotaTallerImpSearch extends CuotaTallerImp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_taller_imp', 'id_cuota', 'obligatoria', 'tipo_periodo', 'estatus'], 'integer'],
            [['comentario', 'fecha_max_pago', 'concepto_imp'], 'safe'],
            [['monto'], 'number'],
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
        $query = CuotaTallerImp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_taller_imp' => $this->id_taller_imp,
            'id_cuota' => $this->id_cuota,
            'obligatoria' => $this->obligatoria,
            'fecha_max_pago' => $this->fecha_max_pago,
            'tipo_periodo' => $this->tipo_periodo,
            'monto' => $this->monto,
            'estatus' => $this->estatus,
        ]);

        $query->andFilterWhere(['like', 'comentario', $this->comentario])
            ->andFilterWhere(['like', 'concepto_imp', $this->concepto_imp]);

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
        $query = CuotaTallerImp::findBySql('select * from tbl_cuota_taller_imp where id_taller_imp = ' .$id);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id' => $this->id,
            'id_taller_imp' => $this->id_taller_imp,
            'id_cuota' => $this->id_cuota,
            'obligatoria' => $this->obligatoria,
            'fecha_max_pago' => $this->fecha_max_pago,
            'tipo_periodo' => $this->tipo_periodo,
            'monto' => $this->monto,
            'estatus' => $this->estatus,
        ]);
        
        $query->andFilterWhere(['like', 'comentario', $this->comentario])
        ->andFilterWhere(['like', 'concepto_imp', $this->concepto_imp]);
        
        return $dataProvider;
    }
}
