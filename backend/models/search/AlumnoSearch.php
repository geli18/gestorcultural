<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Alumno;
use backend\models\Inscripcion;

/**
 * AlumnoSearch represents the model behind the search form about `backend\models\Alumno`.
 */
class AlumnoSearch extends Alumno
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sexo', 'edad_padre', 'tel_padre', 'edad_madre', 'tel_madre', 'tel_emergencia'], 'integer'],
            [['numero_registro', 'nombre', 'fecha_nacimiento', 'fecha_alta', 'direccion', 'nacionalidad', 'estado', 'codigo_postal', 'fecha_baja', 'correo_electronico', 'telefono_movil', 'telefono_casa', 'nombre_padre', 'ocupacion_padre', 'nombre_madre', 'ocupacion_madre', 'fecha_ingreso', 'lugar_nacimiento', 'escuela_procedencia', 'alergia_enfermedad', 'tipo_sangineo', 'afiliacion_seguro', 'curp', 'taller_inscribe'], 'safe'],
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
        $query = Alumno::find();

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
            'sexo' => $this->sexo,
            'edad_padre' => $this->edad_padre,
            'tel_padre' => $this->tel_padre,
            'edad_madre' => $this->edad_madre,
            'tel_madre' => $this->tel_madre,
            'fecha_ingreso' => $this->fecha_ingreso,
            'tel_emergencia' => $this->tel_emergencia,
        ]);

        $query->andFilterWhere(['like', 'numero_registro', $this->numero_registro])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'nacionalidad', $this->nacionalidad])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'codigo_postal', $this->codigo_postal])
            ->andFilterWhere(['like', 'fecha_baja', $this->fecha_baja])
            ->andFilterWhere(['like', 'correo_electronico', $this->correo_electronico])
            ->andFilterWhere(['like', 'telefono_movil', $this->telefono_movil])
            ->andFilterWhere(['like', 'telefono_casa', $this->telefono_casa])
            ->andFilterWhere(['like', 'nombre_padre', $this->nombre_padre])
            ->andFilterWhere(['like', 'ocupacion_padre', $this->ocupacion_padre])
            ->andFilterWhere(['like', 'nombre_madre', $this->nombre_madre])
            ->andFilterWhere(['like', 'ocupacion_madre', $this->ocupacion_madre])
            ->andFilterWhere(['like', 'lugar_nacimiento', $this->lugar_nacimiento])
            ->andFilterWhere(['like', 'escuela_procedencia', $this->escuela_procedencia])
            ->andFilterWhere(['like', 'alergia_enfermedad', $this->alergia_enfermedad])
            ->andFilterWhere(['like', 'tipo_sangineo', $this->tipo_sangineo])
            ->andFilterWhere(['like', 'afiliacion_seguro', $this->afiliacion_seguro])
            ->andFilterWhere(['like', 'curp', $this->curp])
            ->andFilterWhere(['like', 'taller_inscribe', $this->taller_inscribe]);

        return $dataProvider;
    }
    
    
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchInscripcion($params,$id_taller)
    {
        $query = Alumno::findBySql('select * from tbl_alumno where id not in (select id_alumno from tbl_inscripcion where id_taller_imp = '.$id_taller.'  )');
        
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
            'sexo' => $this->sexo,
            'edad_padre' => $this->edad_padre,
            'tel_padre' => $this->tel_padre,
            'edad_madre' => $this->edad_madre,
            'tel_madre' => $this->tel_madre,
            'fecha_ingreso' => $this->fecha_ingreso,
            'tel_emergencia' => $this->tel_emergencia,
        ]);
        
        $query->andFilterWhere(['like', 'numero_registro', $this->numero_registro])
        ->andFilterWhere(['like', 'nombre', $this->nombre])
        ->andFilterWhere(['like', 'direccion', $this->direccion])
        ->andFilterWhere(['like', 'nacionalidad', $this->nacionalidad])
        ->andFilterWhere(['like', 'estado', $this->estado])
        ->andFilterWhere(['like', 'codigo_postal', $this->codigo_postal])
        ->andFilterWhere(['like', 'fecha_baja', $this->fecha_baja])
        ->andFilterWhere(['like', 'correo_electronico', $this->correo_electronico])
        ->andFilterWhere(['like', 'telefono_movil', $this->telefono_movil])
        ->andFilterWhere(['like', 'telefono_casa', $this->telefono_casa])
        ->andFilterWhere(['like', 'nombre_padre', $this->nombre_padre])
        ->andFilterWhere(['like', 'ocupacion_padre', $this->ocupacion_padre])
        ->andFilterWhere(['like', 'nombre_madre', $this->nombre_madre])
        ->andFilterWhere(['like', 'ocupacion_madre', $this->ocupacion_madre])
        ->andFilterWhere(['like', 'lugar_nacimiento', $this->lugar_nacimiento])
        ->andFilterWhere(['like', 'escuela_procedencia', $this->escuela_procedencia])
        ->andFilterWhere(['like', 'alergia_enfermedad', $this->alergia_enfermedad])
        ->andFilterWhere(['like', 'tipo_sangineo', $this->tipo_sangineo])
        ->andFilterWhere(['like', 'afiliacion_seguro', $this->afiliacion_seguro])
        ->andFilterWhere(['like', 'curp', $this->curp])
        ->andFilterWhere(['like', 'taller_inscribe', $this->taller_inscribe]);
        
        return $dataProvider;
    }
    
    
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchTaller($params,$id_taller)
    {
        $query = Inscripcion::findBySql('select * from tbl_inscripcion where id_taller_imp = '.$id_taller);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id' => $this->id,
          
        ]);
        
        //$query->andFilterWhere(['like', 'numero_registro', $this->numero_registro]);
        
        return $dataProvider;
    }
    
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchTallerImp($params,$id_taller)
    {
        $query = Alumno::findBySql('select * from  tbl_alumno where id in (select id_alumno from tbl_inscripcion where id_taller_imp = '.$id_taller.')' );
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id' => $this->id,
            
        ]);
        
        //$query->andFilterWhere(['like', 'numero_registro', $this->numero_registro]);
        
        return $dataProvider;
    }
    
    
}
