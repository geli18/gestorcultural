<?php

namespace backend\models;

use Yii;
use trntv\filekit\behaviors\UploadBehavior;

/**
 * This is the model class for table "tbl_taller".
 *
 * @property int $id
 * @property int $id_instructor
 * @property int $id_aula
 * @property string $nombre
 * @property string $descripcion
 * @property string $descripcion_temario
 * @property string $numero_personas
 * @property string $imagen_url
 * @property string $temario_url
 * @property string $fecha_creacion
 * @property int $creado_por
 * @property int $duracion_mes
 * @property int $duracion_hora
 * @property int $lunes
 * @property int $martes
 * @property int $miercoles
 * @property int $jueves
 * @property int $viernes
 * @property int $sabado
 * @property int $domingo
 * @property string $hora_inicio
 * @property int $disponible
 * @property int $id_categoria
 * @property string $base_url
 * @property string $path
 *
 * @property CuotaTaller[] $cuotaTallers
 * @property Aula $aula
 * @property Categoria $categoria
 * @property Instructor $instructor
 * @property TallerImp[] $tallerImps
 */
class Taller extends \yii\db\ActiveRecord
{
    
    /**
     * @var
     */
    public $imagen_url;
    
    
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'imagen_url' => [
                'class' => UploadBehavior::className(),
                'attribute' => 'imagen_url',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base'
            ]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_taller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_instructor', 'id_aula', 'creado_por', 'duracion_mes', 'duracion_hora', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo', 'disponible', 'id_categoria'], 'integer'],
            [['fecha_creacion', 'hora_inicio','imagen_url'], 'safe'],
            [['nombre', 'descripcion', 'descripcion_temario', 'numero_personas'], 'string', 'max' => 45],
            [[ 'temario_url', 'base_url', 'path'], 'string', 'max' => 300],
            [['id_aula'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['id_aula' => 'id']],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
            [['id_instructor'], 'exist', 'skipOnError' => true, 'targetClass' => Instructor::className(), 'targetAttribute' => ['id_instructor' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_instructor' => 'Id Instructor',
            'id_aula' => 'Id Aula',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'descripcion_temario' => 'Descripcion Temario',
            'numero_personas' => 'Numero Personas',
            'imagen_url' => 'Imagen Url',
            'temario_url' => 'Temario Url',
            'fecha_creacion' => 'Fecha Creacion',
            'creado_por' => 'Creado Por',
            'duracion_mes' => 'Duracion Mes',
            'duracion_hora' => 'Duracion Hora',
            'lunes' => 'Lunes',
            'martes' => 'Martes',
            'miercoles' => 'Miercoles',
            'jueves' => 'Jueves',
            'viernes' => 'Viernes',
            'sabado' => 'Sabado',
            'domingo' => 'Domingo',
            'hora_inicio' => 'Hora Inicio',
            'disponible' => 'Disponible',
            'id_categoria' => 'Id Categoria',
            'base_url' => 'Base Url',
            'path' => 'Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuotaTallers()
    {
        return $this->hasMany(CuotaTaller::className(), ['id_taller' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAula()
    {
        return $this->hasOne(Aula::className(), ['id' => 'id_aula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstructor()
    {
        return $this->hasOne(Instructor::className(), ['id' => 'id_instructor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallerImps()
    {
        return $this->hasMany(TallerImp::className(), ['id_curso_base' => 'id']);
    }
}
