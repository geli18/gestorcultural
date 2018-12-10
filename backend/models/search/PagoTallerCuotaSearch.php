<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PagoTallerCuota;
use backend\models\TallerImp;




/**
 * PagoTallerCuotaSearch represents the model behind the search form about `backend\models\PagoTallerCuota`.
 */
class PagoTallerCuotaSearch extends PagoTallerCuota
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_taller_imp', 'id_cuota', 'id_alumno','id_instructor'], 'integer'],
            [['monto', 'concepto', 'fecha_pago', 'metodo_pago', 'comentario'], 'safe'],
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
        $query = PagoTallerCuota::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) )) {
            return $dataProvider;
        }
        
     
        
        

        $query->andFilterWhere([
            'id' => $this->id,
           // 'id_taller_imp' => $this->id_taller_imp,
            //'id_cuota' => $this->id_cuota,
            'id_alumno' => $this->id_alumno,
        ]);

        
        if(isset($this->fecha_pago) && $this->fecha_pago!=''){
            $date_explode = explode("a", $this->fecha_pago);
            $date1 = trim($date_explode[0]);
            $date2= trim($date_explode[1]);
            $query->andFilterWhere(['between', 'fecha_pago', $date1,$date2]);
        }
        
        
        /**
         * Find taller imp   in instructores
         */
        
        $instructorTalleres = [];
        
        if (isset($this->id_instructor)){
            
            $talleres =  TallerImp::find()->andFilterWhere(['in','id_instructor',$this->id_instructor])->all();
            
            foreach ($talleres as $taller){
                
                $instructorTalleres[]  =  $taller->id;
            }
            
        }
        
        if (isset($this->id_taller_imp) && $this->id_taller_imp ){
            $instructorTalleres  = [];
            $instructorTalleres[]  =  $this->id_taller_imp;
        }
        
        $query->andFilterWhere(['in', 'id_cuota',$this->id_cuota]);
        $query->andFilterWhere(['in', 'id_taller_imp',$instructorTalleres]);
        
        $query->andFilterWhere(['like', 'monto', $this->monto])
            ->andFilterWhere(['like', 'concepto', $this->concepto])
            ->andFilterWhere(['like', 'metodo_pago', $this->metodo_pago])
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
    public function searchInscripcion($params,$id_taller)
    {
        $query = PagoTallerCuota::findBySql('select * from tbl_Pago_taller_cuota where id not in (select id_pago from tbl_inscripcion)');
        
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
            'id_alumno' => $this->id_alumno,
        ]);
        
 
        
        $query->andFilterWhere(['like', 'monto', $this->monto])
        ->andFilterWhere(['like', 'concepto', $this->concepto])
        ->andFilterWhere(['like', 'metodo_pago', $this->metodo_pago])
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
    public function searchTaller($params,$id_taller)
    {
        $query = PagoTallerCuota::findBySql('select * from tbl_Pago_taller_cuota where id_taller_imp = '. $id_taller);
        
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
            'id_alumno' => $this->id_alumno,
            'fecha_pago' => $this->fecha_pago,
        ]);
        
        $query->andFilterWhere(['like', 'monto', $this->monto])
        ->andFilterWhere(['like', 'concepto', $this->concepto])
        ->andFilterWhere(['like', 'metodo_pago', $this->metodo_pago])
        ->andFilterWhere(['like', 'comentario', $this->comentario]);
        
        return $dataProvider;
    }
}
