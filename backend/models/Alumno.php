<?php

namespace backend\models;

use Yii;
use trntv\filekit\behaviors\UploadBehavior;

/**
 * This is the model class for table "tbl_alumno".
 *
 * @property int $id
 * @property string $numero_registro
 * @property string $nombre
 * @property string $fecha_nacimiento
 * @property string $fecha_alta
 * @property int $sexo
 * @property string $direccion
 * @property string $nacionalidad
 * @property string $estado
 * @property string $codigo_postal
 * @property string $fecha_baja
 * @property string $correo_electronico
 * @property string $telefono_movil
 * @property string $telefono_casa
 * @property string $nombre_padre
 * @property int $edad_padre
 * @property string $ocupacion_padre
 * @property int $tel_padre
 * @property string $nombre_madre
 * @property int $edad_madre
 * @property string $ocupacion_madre
 * @property int $tel_madre
 * @property string $fecha_ingreso
 * @property string $lugar_nacimiento
 * @property int $tel_emergencia
 * @property string $escuela_procedencia
 * @property string $alergia_enfermedad
 * @property string $tipo_sangineo
 * @property string $afiliacion_seguro
 * @property string $curp
 * @property string $taller_inscribe
 * @property string $imagen_url
 * @property string $base_url
 * @property string $path
 *
 * @property Inscripcion[] $inscripcions
 * @property PagoTallerCuota[] $pagoTallerCuotas
 */
class Alumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
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
                'baseUrlAttribute' => 'base_url'
            ]
        ];
    }
    
    public static function tableName()
    {
        return 'tbl_alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_nacimiento', 'fecha_alta', 'fecha_ingreso', 'imagen_url'], 'safe'],
            [['sexo', 'edad_padre', 'tel_padre', 'edad_madre', 'tel_madre', 'tel_emergencia'], 'integer'],
            [['numero_registro', 'nombre', 'tipo_sangineo'], 'string', 'max' => 100],
            [['direccion', 'correo_electronico', 'base_url', 'path'], 'string', 'max' => 300],
            [['nacionalidad', 'estado', 'codigo_postal', 'fecha_baja', 'telefono_movil', 'telefono_casa'], 'string', 'max' => 45],
            [['nombre_padre', 'ocupacion_padre', 'nombre_madre', 'ocupacion_madre', 'lugar_nacimiento', 'escuela_procedencia', 'alergia_enfermedad', 'afiliacion_seguro'], 'string', 'max' => 200],
            [['curp'], 'string', 'max' => 20],
            [['taller_inscribe'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numero_registro' => 'Numero Registro',
            'nombre' => 'Nombre',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'fecha_alta' => 'Fecha Alta',
            'sexo' => 'Sexo',
            'direccion' => 'Direccion',
            'nacionalidad' => 'Nacionalidad',
            'estado' => 'Estado',
            'codigo_postal' => 'Codigo Postal',
            'fecha_baja' => 'Fecha Baja',
            'correo_electronico' => 'Correo Electronico',
            'telefono_movil' => 'Telefono Movil',
            'telefono_casa' => 'Telefono Casa',
            'nombre_padre' => 'Nombre Padre',
            'edad_padre' => 'Edad Padre',
            'ocupacion_padre' => 'Ocupacion Padre',
            'tel_padre' => 'Tel Padre',
            'nombre_madre' => 'Nombre Madre',
            'edad_madre' => 'Edad Madre',
            'ocupacion_madre' => 'Ocupacion Madre',
            'tel_madre' => 'Tel Madre',
            'fecha_ingreso' => 'Fecha Ingreso',
            'lugar_nacimiento' => 'Lugar Nacimiento',
            'tel_emergencia' => 'Tel Emergencia',
            'escuela_procedencia' => 'Escuela Procedencia',
            'alergia_enfermedad' => 'Alergia Enfermedad',
            'tipo_sangineo' => 'Tipo Sangineo',
            'afiliacion_seguro' => 'Afiliacion Seguro',
            'curp' => 'Curp',
            'taller_inscribe' => 'Taller Inscribe',
            'imagen_url' => 'Imagen Url',
            'base_url' => 'Base Url',
            'path' => 'Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcions()
    {
        return $this->hasMany(Inscripcion::className(), ['id_alumno' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagoTallerCuotas()
    {
        return $this->hasMany(PagoTallerCuota::className(), ['id_alumno' => 'id']);
    }
}
