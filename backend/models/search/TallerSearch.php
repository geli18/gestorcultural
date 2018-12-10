<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Taller;

/**
 * TallerSearch represents the model behind the search form about `backend\models\Taller`.
 */
class TallerSearch extends Taller
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_instructor', 'creado_por', 'duracion_mes'], 'integer'],
            [['nombre', 'descripcion', 'descripcion_temario', 'numero_personas', 'imagen_url', 'temario_url', 'fecha_creacion', 'disponible'], 'safe'],
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
        $query = Taller::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_instructor' => $this->id_instructor,
            'fecha_creacion' => $this->fecha_creacion,
            'creado_por' => $this->creado_por,
            'duracion_mes' => $this->duracion_mes,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'descripcion_temario', $this->descripcion_temario])
            ->andFilterWhere(['like', 'numero_personas', $this->numero_personas])
            ->andFilterWhere(['like', 'imagen_url', $this->imagen_url])
            ->andFilterWhere(['like', 'temario_url', $this->temario_url])
            ->andFilterWhere(['like', 'disponible', $this->disponible]);

        return $dataProvider;
    }
}
