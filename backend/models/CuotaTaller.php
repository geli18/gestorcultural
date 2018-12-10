<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_cuota_taller".
 *
 * @property int $id
 * @property int $id_cuota
 * @property int $id_taller
 * @property string $nombre
 * @property int $obligatoria
 * @property string $comentario
 * @property int $tipo_periodo
 * @property string $fecha_max_pago
 * @property double $monto
 * @property string $concepto_imp
 *
 * @property Cuota $cuota
 * @property Taller $taller
 */
class CuotaTaller extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_cuota_taller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cuota', 'id_taller'], 'integer'],
            [['fecha_max_pago'], 'safe'],
            [['monto'], 'number'],
            [['nombre'], 'string', 'max' => 150],
            [['obligatoria', 'tipo_periodo'], 'string', 'max' => 4],
            [['comentario'], 'string', 'max' => 300],
            [['concepto_imp'], 'string', 'max' => 45],
            [['id_cuota'], 'exist', 'skipOnError' => true, 'targetClass' => Cuota::className(), 'targetAttribute' => ['id_cuota' => 'id']],
            [['id_taller'], 'exist', 'skipOnError' => true, 'targetClass' => Taller::className(), 'targetAttribute' => ['id_taller' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cuota' => 'Id Cuota',
            'id_taller' => 'Id Taller',
            'nombre' => 'Nombre',
            'obligatoria' => 'Obligatoria',
            'comentario' => 'Comentario',
            'tipo_periodo' => 'Tipo Periodo',
            'fecha_max_pago' => 'Fecha Max Pago',
            'monto' => 'Monto',
            'concepto_imp' => 'Concepto Imp',
        ];
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
    public function getTaller()
    {
        return $this->hasOne(Taller::className(), ['id' => 'id_taller']);
    }
}
