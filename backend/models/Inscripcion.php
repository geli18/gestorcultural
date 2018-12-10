<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_inscripcion".
 *
 * @property int $id
 * @property int $id_alumno
 * @property int $id_taller_imp
 * @property int $id_pago
 * @property string $fecha_inscripcion
 * @property string $folio_inscripcion
 * @property string $fecha_operacion
 *
 * @property Alumno $alumno
 * @property PagoTallerCuota $pago
 * @property TallerImp $tallerImp
 */
class Inscripcion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_inscripcion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_alumno', 'id_taller_imp', 'id_pago'], 'integer'],
            [['fecha_inscripcion', 'fecha_operacion'], 'safe'],
            [['folio_inscripcion'], 'string', 'max' => 15],
            [['id_pago'], 'unique'],
            [['id_alumno'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::className(), 'targetAttribute' => ['id_alumno' => 'id']],
            [['id_pago'], 'exist', 'skipOnError' => true, 'targetClass' => PagoTallerCuota::className(), 'targetAttribute' => ['id_pago' => 'id']],
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
            'id_alumno' => 'Id Alumno',
            'id_taller_imp' => 'Id Taller Imp',
            'id_pago' => 'Id Pago',
            'fecha_inscripcion' => 'Fecha Inscripcion',
            'folio_inscripcion' => 'Folio Inscripcion',
            'fecha_operacion' => 'Fecha Operacion',
        ];
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
    public function getPago()
    {
        return $this->hasOne(PagoTallerCuota::className(), ['id' => 'id_pago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallerImp()
    {
        return $this->hasOne(TallerImp::className(), ['id' => 'id_taller_imp']);
    }
}
