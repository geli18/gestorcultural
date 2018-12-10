<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_aula".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property int $numero_max_personas
 * @property int $disponible
 *
 * @property Taller[] $tallers
 * @property TallerImp[] $tallerImps
 * @property TallerImp[] $tallerImps0
 * @property TallerImp[] $tallerImps1
 * @property TallerImp[] $tallerImps2
 * @property TallerImp[] $tallerImps3
 * @property TallerImp[] $tallerImps4
 * @property TallerImp[] $tallerImps5
 */
class Aula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_aula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero_max_personas', 'disponible'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'numero_max_personas' => 'Numero Max Personas',
            'disponible' => 'Disponible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallers()
    {
        return $this->hasMany(Taller::className(), ['id_aula' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallerImps()
    {
        return $this->hasMany(TallerImp::className(), ['id_aula_domingo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallerImps0()
    {
        return $this->hasMany(TallerImp::className(), ['id_aula_jueves' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallerImps1()
    {
        return $this->hasMany(TallerImp::className(), ['id_aula_lunes' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallerImps2()
    {
        return $this->hasMany(TallerImp::className(), ['id_aula_martes' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallerImps3()
    {
        return $this->hasMany(TallerImp::className(), ['id_aula_miercoles' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallerImps4()
    {
        return $this->hasMany(TallerImp::className(), ['id_aula_sabado' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallerImps5()
    {
        return $this->hasMany(TallerImp::className(), ['id_aula_viernes' => 'id']);
    }
}
