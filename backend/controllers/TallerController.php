<?php

namespace backend\controllers;

use Yii;
use backend\models\Taller;
use backend\models\search\TallerSearch;
use backend\models\search\CuotaTallerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use trntv\filekit\actions\UploadAction;
use trntv\filekit\actions\DeleteAction;
use Intervention\Image\ImageManagerStatic;
use backend\models\CuotaTaller;
use backend\models\TallerImp;
use backend\models\CuotaTallerImp;
use backend\models\search\TallerImpSearch;
use kartik\mpdf\Pdf;

/**
 * TallerController implements the CRUD actions for Taller model.
 */
class TallerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    
    

    /**
     * (non-PHPdoc)
     * @see \yii\base\Controller::actions()
     */
    public function actions()
    {
    	return [
    			'avatar-upload' => [
    					'class' => UploadAction::className(),
    					'deleteRoute' => 'avatar-delete',
    					'on afterSave' => function ($event) {
    						/* @var $file \League\Flysystem\File */
    						$file = $event->file;
    						$img = ImageManagerStatic::make($file->read())->resize(1024, 768);
    						$file->put($img->encode());
    					}
    			],
    			'avatar-delete' => [
    					'class' => DeleteAction::className()
    			]
    			];
    }

    /**
     * Lists all Taller models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TallerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Taller model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    
    /**
     * Displays a single Taller model.
     * @param integer $id
     * @return mixed
     */
    public function actionDashboard($id)
    {
        
        
        $searchModel = new TallerImpSearch();
        $dataProvider = $searchModel->searchByParent(Yii::$app->request->queryParams,$id);
        
        
        
        $searchCuotaModel = new CuotaTallerSearch();
        $dataCuotaProvider = $searchCuotaModel->searchByTaller(Yii::$app->request->queryParams,$id);
        
        $sModel = new CuotaTaller();
        $sModel->id_taller = $id;
        
        if ($sModel->load(Yii::$app->request->post()) && $sModel->save()) {
            
            Yii::$app->getSession()->setFlash('success', [
                'body'=>'Se ha creado una nueva cuota.',
                'options'=>['class'=>'alert-danger']
            ]);
            
            return $this->redirect(['dashboard', 'id' => $model->id]);
        }
        
        
        
        
        return $this->render('dashboard', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchCuotaModel' => $searchCuotaModel,
            'dataCuotaProvider' => $dataCuotaProvider,
        ]);
        
        
        
    }
    
    
    
    /**
     * Generates Taller implementation.
     * @param integer $id
     * @return mixed
     */
    public function actionImplement($id)
    {
        
        $model = $this->findModel($id);
        
        
        $sModel = new TallerImp();
        
        
        
        if ($sModel->load(Yii::$app->request->post())) {
            
            
            if ($sModel->save()) { 

                
                foreach ($model->cuotaTallers as $cuota){
                    
                    $cuotaImp = new CuotaTallerImp();
                    
                    $cuotaImp->id_taller_imp = $sModel->id;
                    $cuotaImp->id_cuota = $cuota->id_cuota;
                    $cuotaImp->concepto_imp = isset($cuota->nombre)?$cuota->nombre:isset($cuota->cuota->concepto_impresion)?$cuota->cuota->concepto_impresion:'';
                    $cuotaImp->obligatoria = $cuota->obligatoria;
                    $cuotaImp->tipo_periodo = $cuota->tipo_periodo;
                    $cuotaImp->monto = $cuota->monto;
                    $cuotaImp->comentario = $cuota->comentario;
                    $cuotaImp->save(false);
                    
                }
                
                return $this->redirect(['taller-imp/dashboard', 'id' => $sModel->id]); 
            
            }            
                else   return $this->render('implementation', ['model' => $sModel,  ]);
            
        }else{
        
        
        $sModel->id_curso_base = $id;
        
        $sModel->id_instructor = $model->id_instructor;
        
        $sModel->nombre = $model->nombre;
        
        
        //Calcular
        $sModel->fecha_inicio = date('Y-m-d');
        
        //$sModel->fecha_fin = date('Y-m-d');
        
        $sModel->descripcion = $model->descripcion;
        
        $sModel->numero_max_personas = $model->numero_personas;
        
        
        if($model->aula){
            $sModel->id_aula_lunes = $model->id_aula;
            $sModel->id_aula_martes = $model->id_aula;
            $sModel->id_aula_miercoles = $model->id_aula;
            $sModel->id_aula_jueves = $model->id_aula;
            $sModel->id_aula_viernes = $model->id_aula;
            $sModel->id_aula_sabado = $model->id_aula;
            $sModel->id_aula_domingo = $model->id_aula;
        }
        
        if($model->lunes){
            
            $sModel->lunes = $model->hora_inicio;
            //$sModel->lunes_fin = 12;
        }
        
        if($model->martes){
            
            $sModel->martes = $model->hora_inicio;
          //  $sModel->martes_fin = 12;
        }
        
        
        if($model->miercoles){
            
            $sModel->miercoles = $model->hora_inicio;
           // $sModel->miercoles_fin = 12;
        }
        
        if($model->jueves){
            
            $sModel->jueves = $model->hora_inicio;
           // $sModel->jueves_fin = 12;
        }
        
        
        if($model->viernes){
            
            $sModel->viernes = $model->hora_inicio;
            //$sModel->viernes_fin = 12;
        }
        
        if($model->sabado){
            
            $sModel->sabado = $model->hora_inicio;
            //$sModel->sabado_fin = 12;
        }
        
        if($model->domingo){
            
            $sModel->domingo = $model->hora_inicio;
            //$sModel->domingo_fin = 12;
        }
        
        
        
        }
        
        return $this->render('implementation', [
            'model' => $sModel,
        ]);
    }
    
    
    /**
     * Displays Cuotas of  Taller model.
     * @param integer $id
     * @return mixed
     */
    public function actionCuota($id)
    {
    	
    	$model = $this->findModel($id);
    	$searchModel = new CuotaTallerSearch();
    	
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	
    	$sModel = new CuotaTaller();
    	$sModel->id_taller = $id;
    	
    	if ($sModel->load(Yii::$app->request->post()) && $sModel->save()) {
    	    
    	    Yii::$app->getSession()->setFlash('success', [
    	        'body'=>'Se ha creado una nueva cuota.',
    	        'options'=>['class'=>'alert-danger']
    	    ]);
    	    
    	    
    	} else {
    	
    	    
    	    if($sModel->hasErrors()){
    	        
       	        Yii::$app->getSession()->setFlash('alert', [
    	            'body'=>'El producto seleccionado no es valido',
    	            'options'=>['class'=>'alert-danger']
    	        ]);
    	        
    	    }
    	    
    	  
    	
    	}
    	
    	
    	return $this->redirect(['dashboard', 'id' => $model->id]);
    	
    	
   
    }

    /**
     * Creates a new Taller model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Taller();
        
        $model->disponible = 1;
        
        $model->fecha_creacion = date('Y-m-d');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            Yii::$app->session->setFlash('alert', [
                'options' => ['class' => 'alert-success'],
                'body' => '<h4><i class="fa fa-check-circle-o fa-2x"></i>Taller creado correctamente</h4><p>
                                Complete la información del taller y posteriormente podra impartirlo las veces que necesite.
                            </p>'
            ]);
            
            return $this->redirect(['dashboard', 'id' => $model->id]);
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Taller model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

      
         
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['dashboard', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Taller model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    
    /**
     * Prints new  instription
     * @param Integer $id
     */
    public function actionImprimirInfo($id){
        
        //	Yii::$app->response->format = 'pdf';
        
        $model = Taller::findOne($id);
        
        
        if ($model  === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        $content = $this->renderPartial('detalle-taller',['model'=>$model]);
        
        
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            
            
            
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            //'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}
    							#menu{
								      font:5px;
								    }',
            // set mPDF properties on the fly
            'options' => ['title' => 'Ficha de inscripción'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Detalle del taller'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render();
        
    }
    /**
     * Finds the Taller model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Taller the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Taller::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
//