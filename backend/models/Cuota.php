<?php

namespace backend\models;

use backend\models\CuotaTaller;
use backend\models\CuotaTallerImp;
use backend\models\PagoTallerCuota;
use Yii;

/**
 * This is the model class for table "tbl_cuota".
 *
 * @property int $id
 * @property int $creado_por
 * @property string $concepto
 * @property string $descripcion
 * @property string $concepto_impresion
 * @property double $monto
 * @property string $fecha_creacion
 * @property int $disponible
 *
 * @property CuotaTaller[] $cuotaTallers
 * @property CuotaTallerImp[] $cuotaTallerImps
 * @property PagoTallerCuota[] $pagoTallerCuotas
 */
class Cuota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_cuota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['creado_por'], 'integer'],
            [['monto'], 'number'],
            [['fecha_creacion'], 'safe'],
            [['concepto'], 'string', 'max' => 45],
            [['descripcion', 'concepto_impresion'], 'string', 'max' => 200],
            [['disponible'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'creado_por' => 'Creado Por',
            'concepto' => 'Concepto',
            'descripcion' => 'Descripcion',
            'concepto_impresion' => 'Concepto Impresion',
            'monto' => 'Monto',
            'fecha_creacion' => 'Fecha Creacion',
            'disponible' => 'Disponible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuotaTallers()
    {
        return $this->hasMany(CuotaTaller::className(), ['id_cuota' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuotaTallerImps()
    {
        return $this->hasMany(CuotaTallerImp::className(), ['id_cuota' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagoTallerCuotas()
    {
        return $this->hasMany(PagoTallerCuota::className(), ['id_cuota' => 'id']);
    }
}
