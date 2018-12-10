<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_pago_taller_cuota".
 *
 * @property int $id
 * @property int $id_taller_imp
 * @property int $id_cuota_taller_imp
 * @property int $id_cuota
 * @property double $monto
 * @property int $id_alumno
 * @property string $concepto
 * @property string $fecha_pago
 * @property string $metodo_pago
 * @property string $comentario
 * @property int $id_instructor
 * @property string $fecha_operacion
 *
 * @property Inscripcion $inscripcion
 * @property Alumno $alumno
 * @property Cuota $cuota
 * @property CuotaTallerImp $cuotaTallerImp
 * @property TallerImp $tallerImp
 */
class PagoTallerCuota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_pago_taller_cuota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_taller_imp', 'id_cuota_taller_imp', 'id_cuota', 'id_alumno', 'id_instructor'], 'integer'],
            [['monto'], 'number'],
            [['monto','concepto','id_alumno','id_taller_imp'], 'required'],
            [['fecha_pago', 'fecha_operacion'], 'safe'],
            [['concepto', 'metodo_pago', 'comentario'], 'string', 'max' => 45],
            [['id_alumno'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::className(), 'targetAttribute' => ['id_alumno' => 'id']],
            [['id_cuota'], 'exist', 'skipOnError' => true, 'targetClass' => Cuota::className(), 'targetAttribute' => ['id_cuota' => 'id']],
            [['id_cuota_taller_imp'], 'exist', 'skipOnError' => true, 'targetClass' => CuotaTallerImp::className(), 'targetAttribute' => ['id_cuota_taller_imp' => 'id']],
            [['id_taller_imp'], 'exist', 'skipOnError' => true, 'targetClass' => TallerImp::className(), 'targetAttribute' => ['id_taller_imp' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_taller_imp' => 'Id Taller Imp',
            'id_cuota_taller_imp' => 'Id Cuota Taller Imp',
            'id_cuota' => 'Id Cuota',
            'monto' => 'Monto',
            'id_alumno' => 'Id Alumno',
            'concepto' => 'Concepto',
            'fecha_pago' => 'Fecha Pago',
            'metodo_pago' => 'Metodo Pago',
            'comentario' => 'Comentario',
            'id_instructor' => 'Id Instructor',
            'fecha_operacion' => 'Fecha Operacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcion()
    {
        return $this->hasOne(Inscripcion::className(), ['id_pago' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['id' => 'id_alumno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuota()
    {
        return $this->hasOne(Cuota::className(), ['id' => 'id_cuota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuotaTallerImp()
    {
        return $this->hasOne(CuotaTallerImp::className(), ['id' => 'id_cuota_taller_imp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallerImp()
    {
        return $this->hasOne(TallerImp::className(), ['id' => 'id_taller_imp']);
    }
}
