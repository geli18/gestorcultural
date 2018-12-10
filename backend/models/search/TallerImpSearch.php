<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TallerImp;

/**
 * TallerImpSearch represents the model behind the search form about `backend\models\TallerImp`.
 */
class TallerImpSearch extends TallerImp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_curso_base', 'id_instructor', 'numero_max_personas', 'duracion_hora', 'estatus', 'duracion_mes', 'disponible', 'id_aula_lunes', 'id_aula_martes', 'id_aula_miercoles', 'id_aula_jueves', 'id_aula_viernes', 'id_aula_sabado', 'id_aula_domingo'], 'integer'],
            [['clave_unica_curso', 'nombre', 'fecha_inicio', 'fecha_fin', 'descripcion', 'comentarios', 'url_img_publicitaria', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo', 'lunes_fin', 'martes_fin', 'miercoles_fin', 'jueves_fin', 'viernes_fin', 'sabado_fin', 'domingo_fin'], 'safe'],
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
        $query = TallerImp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_curso_base' => $this->id_curso_base,
            'id_instructor' => $this->id_instructor,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'numero_max_personas' => $this->numero_max_personas,
            'lunes' => $this->lunes,
            'martes' => $this->martes,
            'miercoles' => $this->miercoles,
            'jueves' => $this->jueves,
            'viernes' => $this->viernes,
            'sabado' => $this->sabado,
            'domingo' => $this->domingo,
            'duracion_hora' => $this->duracion_hora,
            'lunes_fin' => $this->lunes_fin,
            'martes_fin' => $this->martes_fin,
            'miercoles_fin' => $this->miercoles_fin,
            'jueves_fin' => $this->jueves_fin,
            'viernes_fin' => $this->viernes_fin,
            'sabado_fin' => $this->sabado_fin,
            'domingo_fin' => $this->domingo_fin,
            'estatus' => $this->estatus,
            'duracion_mes' => $this->duracion_mes,
            'disponible' => $this->disponible,
            'id_aula_lunes' => $this->id_aula_lunes,
            'id_aula_martes' => $this->id_aula_martes,
            'id_aula_miercoles' => $this->id_aula_miercoles,
            'id_aula_jueves' => $this->id_aula_jueves,
            'id_aula_viernes' => $this->id_aula_viernes,
            'id_aula_sabado' => $this->id_aula_sabado,
            'id_aula_domingo' => $this->id_aula_domingo,
        ]);

        $query->andFilterWhere(['like', 'clave_unica_curso', $this->clave_unica_curso])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'comentarios', $this->comentarios])
            ->andFilterWhere(['like', 'url_img_publicitaria', $this->url_img_publicitaria]);

        return $dataProvider;
    }
    
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchByParent($params,$id)
    {
        $query = TallerImp::findBySql('select * from tbl_taller_imp where id_curso_base =  ' . $id);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id' => $this->id,
            'id_curso_base' => $this->id_curso_base,
            'id_instructor' => $this->id_instructor,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'numero_max_personas' => $this->numero_max_personas,
            'lunes' => $this->lunes,
            'martes' => $this->martes,
            'miercoles' => $this->miercoles,
            'jueves' => $this->jueves,
            'viernes' => $this->viernes,
            'sabado' => $this->sabado,
            'domingo' => $this->domingo,
            'duracion_hora' => $this->duracion_hora,
            'lunes_fin' => $this->lunes_fin,
            'martes_fin' => $this->martes_fin,
            'miercoles_fin' => $this->miercoles_fin,
            'jueves_fin' => $this->jueves_fin,
            'viernes_fin' => $this->viernes_fin,
            'sabado_fin' => $this->sabado_fin,
            'domingo_fin' => $this->domingo_fin,
            'estatus' => $this->estatus,
            'duracion_mes' => $this->duracion_mes,
            'disponible' => $this->disponible,
            'id_aula_lunes' => $this->id_aula_lunes,
            'id_aula_martes' => $this->id_aula_martes,
            'id_aula_miercoles' => $this->id_aula_miercoles,
            'id_aula_jueves' => $this->id_aula_jueves,
            'id_aula_viernes' => $this->id_aula_viernes,
            'id_aula_sabado' => $this->id_aula_sabado,
            'id_aula_domingo' => $this->id_aula_domingo,
        ]);
        
        $query->andFilterWhere(['like', 'clave_unica_curso', $this->clave_unica_curso])
        ->andFilterWhere(['like', 'nombre', $this->nombre])
        ->andFilterWhere(['like', 'descripcion', $this->descripcion])
        ->andFilterWhere(['like', 'comentarios', $this->comentarios])
        ->andFilterWhere(['like', 'url_img_publicitaria', $this->url_img_publicitaria]);
        
        return $dataProvider;
    }
}
