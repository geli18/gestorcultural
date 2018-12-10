<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_cuota_taller_imp".
 *
 * @property integer $id
 * @property integer $id_taller_imp
 * @property integer $id_cuota
 * @property integer $obligatoria
 * @property string $comentario
 * @property string $fecha_max_pago
 * @property integer $tipo_periodo
 * @property string $concepto_imp
 * @property double $monto
 * @property integer $estatus
 *
 * @property Cuota $idCuota
 * @property TallerImp $idTallerImp
 * @property PagoTallerCuota[] $pagoTallerCuotas
 */
class CuotaTallerImp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_cuota_taller_imp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_taller_imp', 'id_cuota', 'obligatoria', 'tipo_periodo', 'estatus'], 'integer'],
            [['fecha_max_pago'], 'safe'],
            [['monto'], 'number'],
            [['comentario', 'concepto_imp'], 'string', 'max' => 200],
            [['id_cuota'], 'exist', 'skipOnError' => true, 'targetClass' => Cuota::className(), 'targetAttribute' => ['id_cuota' => 'id']],
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
            'id_cuota' => 'Id Cuota',
            'obligatoria' => 'Obligatoria',
            'comentario' => 'Comentario',
            'fecha_max_pago' => 'Fecha Max Pago',
            'tipo_periodo' => 'Tipo Periodo',
            'concepto_imp' => 'Concepto Imp',
            'monto' => 'Monto',
            'estatus' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCuota()
    {
        return $this->hasOne(Cuota::className(), ['id' => 'id_cuota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTallerImp()
    {
        return $this->hasOne(TallerImp::className(), ['id' => 'id_taller_imp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagoTallerCuotas()
    {
        return $this->hasMany(PagoTallerCuota::className(), ['id_cuota_taller_imp' => 'id']);
    }
}
