<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Aula */

$this->title = 'Crear Aula';
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
