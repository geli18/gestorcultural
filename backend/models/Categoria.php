<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_categoria".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property int $disponible
 *
 * @property Taller[] $tallers
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['disponible'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 400],
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
            'disponible' => 'Disponible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallers()
    {
        return $this->hasMany(Taller::className(), ['id_categoria' => 'id']);
    }
}
