<?php
namespace backend\controllers;

use Yii;
use backend\models\Alumno;
use backend\models\search\AlumnoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use trntv\filekit\actions\UploadAction;
use trntv\filekit\actions\DeleteAction;
use Intervention\Image\ImageManagerStatic;

/**
 * AlumnoController implements the CRUD actions for Alumno model.
 */

$array=array();
class AlumnoController extends Controller
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
                        $img = ImageManagerStatic::make($file->read());
                        $file->put($img->encode());
                }
                ],
                'avatar-delete' => [
                    'class' => DeleteAction::className()
                ]
                ];
    }

    /**
     * Lists all Alumno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlumnoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alumno model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
// aqui se crea el controlador para pdf

    public function actionGenPdf($id)
    {
        $pdf_content= $this->renderPartial('view-pdf', [
            'model' => $this->findModel($id),
            
        ]);
        $mpdf = new \mPDF();
        $mpdf -> Writehtml($pdf_content);
        $mpdf->Output();
        exit;
    }
    
    
    /**
     * Creates a new Alumno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Alumno();
        
        $model->fecha_alta = date('Y-m-d');
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('alert', [
                'options' => ['class' => 'alert-success'],
                'body' => '<h4><i class="fa fa-check-circle-o fa-2x"></i>Alumno creado correctamente</h4><p>
                            </p>'
            ]);
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->fecha_ingreso = date('Y-m-d');
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Alumno model.
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
     * Deletes an existing Alumno model.
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
    public function actionImprimirComprobante($id){
        
        //	Yii::$app->response->format = 'pdf';
        
        $model = Alumno::findOne($id);
        
        
        if ($model  === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        $content = $this->renderPartial('ficha-alumno',['model'=>$model]);
        
        
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE,
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
                'SetHeader'=>['Ficha de inscripción'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render();
        
    }

    
    /**
     * Prints new  instription
     * @param Integer $id
     */
    public function actionImprimirCredencial($id){
        
        //	Yii::$app->response->format = 'pdf';
        
        $model = Alumno::findOne($id);
        
        
        if ($model  === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        $content = $this->renderPartial('credencial-alumno',['model'=>$model]);
        
        
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
            'options' => ['title' => 'Credencial del alumno'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Credencial del alumno'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render();
        
    }
    
    /**
     * Finds the Alumno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Alumno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Alumno::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
