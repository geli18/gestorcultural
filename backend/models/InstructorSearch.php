<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Instructor;

/**
 * InstructorSearch represents the model behind the search form about `backend\models\Instructor`.
 */
class InstructorSearch extends Instructor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sexo', 'disponible', 'localidad'], 'integer'],
            [['nombre', 'fecha_nacimiento', 'direccion', 'numero_cedula', 'numero_registro', 'fecha_alta', 'fecha_baja', 'url_foto', 'url_fb', 'url_tw', 'url_cv'], 'safe'],
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
        $query = Instructor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'fecha_alta' => $this->fecha_alta,
            'fecha_baja' => $this->fecha_baja,
            'sexo' => $this->sexo,
            'disponible' => $this->disponible,
            'localidad' => $this->localidad,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'numero_cedula', $this->numero_cedula])
            ->andFilterWhere(['like', 'numero_registro', $this->numero_registro])
            ->andFilterWhere(['like', 'url_foto', $this->url_foto])
            ->andFilterWhere(['like', 'url_fb', $this->url_fb])
            ->andFilterWhere(['like', 'url_tw', $this->url_tw])
            ->andFilterWhere(['like', 'url_cv', $this->url_cv]);

        return $dataProvider;
    }
}
