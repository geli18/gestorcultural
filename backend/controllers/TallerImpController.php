<?php

namespace backend\controllers;

use Yii;
use kartik\mpdf\Pdf;
use backend\models\TallerImp;
use backend\models\search\AlumnoSearch;
use backend\models\search\TallerImpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\CuotaTallerImp;
use backend\models\Cuota;
use backend\models\Alumno;
use yii\helpers\Json;
use backend\models\PagoTallerCuota;
use backend\models\Inscripcion;
use backend\models\search\PagoTallerCuotaSearch;
use backend\models\search\CuotaTallerImpSearch;

/**
 * TallerImpController implements the CRUD actions for TallerImp model.
 */
class TallerImpController extends Controller
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
     * Lists all TallerImp models .
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TallerImpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TallerImp model.
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
     * Displays a single TallerImp model.
     * @param integer $id
     * @return mixed
     */
    public function actionDashboard($id)
    {
        
        $searchCuotaModel = new CuotaTallerImpSearch();
        $dataCuotaProvider = $searchCuotaModel->searchByTaller(Yii::$app->request->queryParams,$id);
        
        $pagoSearchModel = new PagoTallerCuotaSearch();
        $pagoDataProvider = $pagoSearchModel->searchTaller(Yii::$app->request->queryParams,$id);
        
        $alumnoSearchModel = new AlumnoSearch();
        $alumnoDataProvider = $alumnoSearchModel->searchTaller(Yii::$app->request->queryParams,$id);
        
        
        return $this->render('dashboard', [
            'model' => $this->findModel($id),
            'searchCuotaModel' => $searchCuotaModel,
            'dataCuotaProvider' => $dataCuotaProvider,
            'pagoSearchModel'=>$pagoSearchModel,
            'pagoDataProvider'=>$pagoDataProvider,
            'alumnoSearchModel'=>$alumnoSearchModel,
            'alumnoDataProvider'=>$alumnoDataProvider,
            
        ]);
    }

    /**
     * Creates a new TallerImp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TallerImp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Displays Cuotas of  Taller model.
     * @param integer $id
     * @return mixed
     */
    public function actionCuota($id)
    {
        
        $model = $this->findModel($id);
        
        
        $sModel = new CuotaTallerImp();
        $sModel->id_taller_imp = $id;
        
        if ($sModel->load(Yii::$app->request->post()) ) {
            
            
            if($sModel->save()){
                
                Yii::$app->getSession()->setFlash('success', [
                    'body'=>'Se ha creado una nueva cuota.',
                    'options'=>['class'=>'alert-danger']
                ]);
                
            }
         else {
            
            
            if($sModel->hasErrors()){
                
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>'Revise los datos',
                    'options'=>['class'=>'alert-danger']
                ]);
                
            }
            
            
            
        }
        }
        
        return $this->redirect(['dashboard', 'id' => $model->id]);
        
        
        
    }

    /**
     * Updates an existing TallerImp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    
    /**
     * Updates an existing TallerImpCuota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionCuotaIndex($id)
    {
       $model = $this->findModel($id);
        

            return $this->render('cuota', [
                'model' => $model,
            ]);
        
    }
    
    
    /**
     * Updates an existing TallerImpCuota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateCuota($id)
    {
        
        
        if (($model = CuotaTallerImp::findOne($id)) !== null   && $model->load(Yii::$app->request->post()) && $model->save() ) {
        
            
            Yii::$app->getSession()->setFlash($id, [
                'body'=>'Se ha actualizado el registro correctamente.',
                'options'=>['class'=>'alert-danger']
            ]);
            
            return $this->redirect(['cuota', 'id' => $model->id_taller_imp]);
            
            
        } else {
            
            
            Yii::$app->getSession()->setFlash($id, [
                'body'=>'Ocurrio un error al guardar la cuota.',
                'options'=>['class'=>'alert-danger']
            ]);
            
            return $this->redirect(['cuota', 'id' => $model->id_taller_imp]);
        }
        
        
   
        
    }
    
    
    
    /**
     * Prints new  instription 
     * @param Integer $id
     */
    public function actionImprimirComprobante($id){  
        
        //	Yii::$app->response->format = 'pdf';
        
       $model = Inscripcion::findOne($id);
       
       
       if ($model  === null) {
           throw new NotFoundHttpException('The requested page does not exist.');
       }
         
       $content = $this->renderPartial('reporte-inscripcion',['model'=>$model]);
        
        
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
            'options' => ['title' => 'Ficha de inscripcion'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Ficha de inscripcion'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render();
        
    }
    
    /**
     *
     * @param integer $id
     */
    public function actionConfirmarInscripcion($id){
        
        
        $model = Inscripcion::findOne($id);
        
        
        if ($model === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        return $this->render('confirmacion-inscripcion',['model'=>$model]);
        
    }
    
    
    /**
     *
     * @param integer $id
     */
    public function actionAlumnos($id){
        
        
        $model = $this->findModel($id);
        
        
        $alumnoSearchModel = new AlumnoSearch();
        $alumnoDataProvider = $alumnoSearchModel->searchTaller(Yii::$app->request->queryParams,$id);
        
        return $this->render('alumnos',
            ['model'=>$model,
                'alumnoSearchModel'=>$alumnoSearchModel,
                'alumnoDataProvider'=>$alumnoDataProvider,]);
        
    }
    
    
    /**
     *
     * @param integer $id
     */
    public function actionPagos($id){
        
        
        $model = $this->findModel($id);
        
        $pagoSearchModel = new PagoTallerCuotaSearch();
        $pagoDataProvider = $pagoSearchModel->searchTaller(Yii::$app->request->queryParams,$id);
        
        return $this->render('pagos',
            ['model'=>$model,
                'pagoSearchModel'=>$pagoSearchModel,
                'pagoDataProvider'=>$pagoDataProvider,]);
            
    }
    
    
    /**
     * Makes a pago
     * @param integer $id
     * @return string
     */ 
    public function actionPago($id){
        
        
        $modelTaller = $this->findModel($id);
        
        $pagoTallerCuota = new PagoTallerCuota();
        $pagoTallerCuota->id_taller_imp = $id;
        
        
        $alumnoSearchModel = new AlumnoSearch();
        $alumnoDataProvider = $alumnoSearchModel->searchTallerImp(Yii::$app->request->queryParams,$id);
        
        $pagoTallerCuota->fecha_operacion = date('Y-m-d H:i:s');
        
        if ($pagoTallerCuota->load(Yii::$app->request->post()) && $pagoTallerCuota->save() ) {
            
            
            Yii::$app->session->setFlash('alert', [
                'options' => ['class' => 'alert-success'],
                'body' => '<h4><i class="fa fa-check-circle-o fa-2x"></i> Pago realizado correctamente</h4>'
            ]);
            
            return $this->redirect(['confirma-pago', 'id' => $id, 'id_pago'=>$pagoTallerCuota->id]);
        }
        
        return $this->render('pago',
            ['model'=>$pagoTallerCuota,
                'modelTaller'=>$modelTaller,
                'alumnoSearchModel'=>$alumnoSearchModel,
                'alumnoDataProvider'=>$alumnoDataProvider,]);
            
    }
    
    
    /**
     * Prints particular pago cuota taller
     * @param integer $id
     */
    public function actionImprimirCole ($id){
        
        $model = PagoTallerCuota::findOne($id);
        
        if(!$model){
            
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        
        $content = $this->renderPartial('reporte-pago',['model'=>$model]);
        
        
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
            'options' => ['title' => 'Reporte de incripcion'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Reporte  de incripcion'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render();
        
        
        
    }
    
    
    public function actionImprimirAnual ($id){
        
        $model = Inscripcion::findOne($id);
        
        
        if(!$model){
            
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        
        $content = $this->renderPartial('reporte-anual',['model'=>$model]);
        
        
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
            'options' => ['title' => 'Reporte anual'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Reporte anual'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render();
        
        
        
    }
    /**
     * 
     * @param integer $id
     * @param integer $id_pago
     */
    public function actionConfirmaPago($id, $id_pago){
        
        
        $model = $this->findModel($id);
        
        $modelPago  = PagoTallerCuota::findOne($id_pago);
        
     
        
        return $this->render('confirma-pago',
            ['model'=>$model,
                'modelPago'=>$modelPago, ]);
        
    }
    
    
    /**
     * 
     * @param integer $id
     */
    public function actionInscripciones($id){
        
        $model = $this->findModel($id);
        
        $modelInscripcion = new Inscripcion();
        
        $alumnoSearchModel = new AlumnoSearch();
        $alumnoDataProvider = $alumnoSearchModel->searchInscripcion(Yii::$app->request->queryParams,$id);
        
        $pagoSearchModel = new PagoTallerCuotaSearch();
        $pagoDataProvider = $pagoSearchModel->searchInscripcion(Yii::$app->request->queryParams,$id);
        
        
        
        if ($modelInscripcion->load(Yii::$app->request->post())) {
            
            $modelInscripcion->fecha_operacion = date('Y-m-d H:i:s');
            
            $modelInscripcion->fecha_inscripcion = date('Y-m-d H:i:s');
            
            $modelInscripcion->save();
            
            return $this->redirect(['confirmar-inscripcion', 'id' => $modelInscripcion->id]);
        }
        
        return $this->render('inscripciones',
                                ['model'=>$model,
                                 'modelInscripcion'=>$modelInscripcion,
                                    'alumnoSearchModel'=>$alumnoSearchModel,
                                    'alumnoDataProvider'=>$alumnoDataProvider,
                                    'pagoSearchModel'=>$pagoSearchModel,
                                    'pagoDataProvider'=>$pagoDataProvider
                                    
                                ]);
        
        
        
    }
    
    
    /**
     * Creates a new PagoTallerCuota model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateInscripcion($id)
    {
        $model = new PagoTallerCuota();
        
        $modelTaller  =  $this->findModel($id);
        
        $alumnoSearchModel = new AlumnoSearch();
        $alumnoDataProvider = $alumnoSearchModel->searchInscripcion(Yii::$app->request->queryParams,$id);
        
       $model->fecha_pago  = date('Y-m-d'); 
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            
            $modelInscripcion =  new Inscripcion();
            
            $modelInscripcion->id_alumno  =  $model->id_alumno;
            
            $modelInscripcion->id_pago  =  $model->id;
            
            $modelInscripcion->id_taller_imp  =  $model->id_taller_imp;
           
            $modelInscripcion->fecha_operacion  = date('Y-m-d');
            
            $modelInscripcion->fecha_inscripcion  = $model->fecha_pago;
            
            if ($modelInscripcion->save() ){
                
                Yii::$app->session->setFlash('alert', [
                    'options' => ['class' => 'alert-success'],
                    'body' => '<h4><i class="fa fa-check-circle-o fa-2x"></i> Inscripción de alumno correcta</h4>'
                ]);
            }
            
            return $this->redirect(['dashboard', 'id' => $modelTaller->id]);
            
            
            
        } else {
            return $this->render('create-inscripcion', [
                'model' => $model,
                'alumnoSearchModel' => $alumnoSearchModel,
                'alumnoDataProvider' => $alumnoDataProvider,
                'modelTaller'=>$modelTaller,
                
                
            ]);
        }
    }
    
    
    
    
    /**
     * Gets all avaliable cuotas by taller implementation
     * @param integer $id
     * @param integer $id_cuota
     * @return string
     */
    public function actionGetCuotas($id,$id_cuota,$id_alumno)
    {
        
        $model = TallerImp::findOne($id);
        
        $modelCuota = Cuota::findOne($id_cuota);
        
        $modelAlumno = Alumno::findOne($id_alumno);
        
        
        if (!$model) {
       
            return '<label class="text text-danger">Primero seleccione taller. </label>';
        }
        
        if (!$modelAlumno) {
            
            return '<label class="text text-danger">Primero seleccione Alumno. </label>';
        }
        
        
        if ($id_cuota === '0'){
            
            $modelCuotas = CuotaTallerImp::findBySql('select * from tbl_cuota_taller_imp where id_taller_imp = '.$id )->all();
            
        }elseif($id_cuota == null) return '';
        else        
            $modelCuotas = CuotaTallerImp::findBySql('select * from tbl_cuota_taller_imp where id_taller_imp = '.$id .' and id_cuota = '. $id_cuota )->all();
        
        $cuotasHtml = '';
        
        $modelCuotasEstatus = [];
        
        foreach ($modelCuotas as $cuota){
            
           $pagoModel = PagoTallerCuota::findBySql('select * from tbl_pago_taller_cuota where id_cuota_taller_imp = '.$cuota->id. ' and id_alumno = ' . $id_alumno)->one();
            
           $cuota->estatus = ($pagoModel)?1:0; 
           
           $cuota->fecha_max_pago =  Yii::$app->formatter->asDate($cuota->fecha_max_pago,'dd/MMM/Y');
           
            $modelCuotasEstatus[] = $cuota;
        }
        
        
        return Json::encode($modelCuotasEstatus);
        
       /* foreach ($modelCuotas as $cuota){
            
            $cuotasHtml = $cuotasHtml .  '<div class="form-check">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="'.$cuota->id.'" /> '.
                                            $cuota->concepto_imp
                                          .'</label>
                                        </div>';
                                                    
        }
        
        $cuotasHtml = $cuotasHtml .  '<div class="form-check">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="-1" /> '.
                                            'No asociada al taller (Definir manualmente).'.'</div>';*/
                                            
        
        
        
       // return strlen($cuotasHtml) ? $cuotasHtml : 'No hay cuotas disponibles';
        
    }
    
    /**
     * Deletes an existing TallerImp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteCuota($id,$id_taller_imp)
    {
        
        
        if (($model = CuotaTallerImp::findOne($id)) !== null && $model->id_taller_imp == $id_taller_imp) {
            
             $model->delete();
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        return $this->redirect(['dashboard','id'=>$id_taller_imp]);
    }
    

    /**
     * Deletes an existing TallerImp model.
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
     * Finds the TallerImp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TallerImp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TallerImp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
