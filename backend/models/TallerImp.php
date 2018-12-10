<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_taller_imp".
 *
 * @property int $id
 * @property int $id_curso_base
 * @property int $id_instructor
 * @property string $clave_unica_curso
 * @property string $nombre
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $descripcion
 * @property int $numero_max_personas
 * @property string $comentarios
 * @property string $url_img_publicitaria
 * @property string $lunes
 * @property string $martes
 * @property string $miercoles
 * @property string $jueves
 * @property string $viernes
 * @property string $sabado
 * @property string $domingo
 * @property int $duracion_hora
 * @property string $lunes_fin
 * @property string $martes_fin
 * @property string $miercoles_fin
 * @property string $jueves_fin
 * @property string $viernes_fin
 * @property string $sabado_fin
 * @property string $domingo_fin
 * @property int $estatus
 * @property int $duracion_mes
 * @property int $disponible
 * @property int $id_aula_lunes
 * @property int $id_aula_martes
 * @property int $id_aula_miercoles
 * @property int $id_aula_jueves
 * @property int $id_aula_viernes
 * @property int $id_aula_sabado
 * @property int $id_aula_domingo
 *
 * @property CuotaTallerImp[] $cuotaTallerImps
 * @property Inscripcion[] $inscripcions
 * @property PagoTallerCuota[] $pagoTallerCuotas
 * @property Aula $aulaDomingo
 * @property Aula $aulaJueves
 * @property Aula $aulaLunes
 * @property Aula $aulaMartes
 * @property Aula $aulaMiercoles
 * @property Aula $aulaSabado
 * @property Aula $aulaViernes
 * @property Instructor $instructor
 * @property Taller $cursoBase
 */
class TallerImp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_taller_imp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_curso_base', 'id_instructor', 'numero_max_personas', 'duracion_hora', 'estatus', 'duracion_mes', 'disponible', 'id_aula_lunes', 'id_aula_martes', 'id_aula_miercoles', 'id_aula_jueves', 'id_aula_viernes', 'id_aula_sabado', 'id_aula_domingo'], 'integer'],
            [['fecha_inicio', 'fecha_fin', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo', 'lunes_fin', 'martes_fin', 'miercoles_fin', 'jueves_fin', 'viernes_fin', 'sabado_fin', 'domingo_fin'], 'safe'],
            [['clave_unica_curso', 'nombre'], 'string', 'max' => 45],
            [['descripcion', 'comentarios', 'url_img_publicitaria'], 'string', 'max' => 300],
            [['id_aula_domingo'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['id_aula_domingo' => 'id']],
            [['id_aula_jueves'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['id_aula_jueves' => 'id']],
            [['id_aula_lunes'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['id_aula_lunes' => 'id']],
            [['id_aula_martes'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['id_aula_martes' => 'id']],
            [['id_aula_miercoles'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['id_aula_miercoles' => 'id']],
            [['id_aula_sabado'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['id_aula_sabado' => 'id']],
            [['id_aula_viernes'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['id_aula_viernes' => 'id']],
            [['id_instructor'], 'exist', 'skipOnError' => true, 'targetClass' => Instructor::className(), 'targetAttribute' => ['id_instructor' => 'id']],
            [['id_curso_base'], 'exist', 'skipOnError' => true, 'targetClass' => Taller::className(), 'targetAttribute' => ['id_curso_base' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_curso_base' => 'Id Curso Base',
            'id_instructor' => 'Id Instructor',
            'clave_unica_curso' => 'Clave Unica Curso',
            'nombre' => 'Nombre',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'descripcion' => 'Descripcion',
            'numero_max_personas' => 'Numero Max Personas',
            'comentarios' => 'Comentarios',
            'url_img_publicitaria' => 'Url Img Publicitaria',
            'lunes' => 'Lunes',
            'martes' => 'Martes',
            'miercoles' => 'Miercoles',
            'jueves' => 'Jueves',
            'viernes' => 'Viernes',
            'sabado' => 'Sabado',
            'domingo' => 'Domingo',
            'duracion_hora' => 'Duracion Hora',
            'lunes_fin' => 'Lunes Fin',
            'martes_fin' => 'Martes Fin',
            'miercoles_fin' => 'Miercoles Fin',
            'jueves_fin' => 'Jueves Fin',
            'viernes_fin' => 'Viernes Fin',
            'sabado_fin' => 'Sabado Fin',
            'domingo_fin' => 'Domingo Fin',
            'estatus' => 'Estatus',
            'duracion_mes' => 'Duracion Mes',
            'disponible' => 'Disponible',
            'id_aula_lunes' => 'Id Aula Lunes',
            'id_aula_martes' => 'Id Aula Martes',
            'id_aula_miercoles' => 'Id Aula Miercoles',
            'id_aula_jueves' => 'Id Aula Jueves',
            'id_aula_viernes' => 'Id Aula Viernes',
            'id_aula_sabado' => 'Id Aula Sabado',
            'id_aula_domingo' => 'Id Aula Domingo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuotaTallerImps()
    {
        return $this->hasMany(CuotaTallerImp::className(), ['id_taller_imp' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcions()
    {
        return $this->hasMany(Inscripcion::className(), ['id_taller_imp' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagoTallerCuotas()
    {
        return $this->hasMany(PagoTallerCuota::className(), ['id_taller_imp' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulaDomingo()
    {
        return $this->hasOne(Aula::className(), ['id' => 'id_aula_domingo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulaJueves()
    {
        return $this->hasOne(Aula::className(), ['id' => 'id_aula_jueves']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulaLunes()
    {
        return $this->hasOne(Aula::className(), ['id' => 'id_aula_lunes']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulaMartes()
    {
        return $this->hasOne(Aula::className(), ['id' => 'id_aula_martes']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulaMiercoles()
    {
        return $this->hasOne(Aula::className(), ['id' => 'id_aula_miercoles']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulaSabado()
    {
        return $this->hasOne(Aula::className(), ['id' => 'id_aula_sabado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulaViernes()
    {
        return $this->hasOne(Aula::className(), ['id' => 'id_aula_viernes']);
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
    public function getCursoBase()
    {
        return $this->hasOne(Taller::className(), ['id' => 'id_curso_base']);
    }
}
