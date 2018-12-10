<?php
namespace backend\models\constants;

class Constantes
{

      const TALLER_ESTATUS_NO_DISPONIBLE = 0;
      const TALLER_ESTATUS_POR_IMPARTIR = 1;
      const TALLER_ESTATUS_IMPARTIENDO = 2;
      const TALLER_ESTATUS_FINALIZADO = 3;
    
    public static $TALLER_ESTATUS_DESC= [Constantes::TALLER_ESTATUS_NO_DISPONIBLE => 'No disponible',
        Constantes::TALLER_ESTATUS_POR_IMPARTIR => 'Por imartir',
        Constantes::TALLER_ESTATUS_IMPARTIENDO => 'Impartiendo',
        Constantes::TALLER_ESTATUS_FINALIZADO => 'Finalizado'
    ];
    
    /**
     * 
     */
    public static function getTallerEstatusDesc($id){
        return isset(Constantes::$TALLER_ESTATUS_DESC[$id])?Constantes::$TALLER_ESTATUS_DESC[$id]:'Desconocido';
    }
    
    
}
    
