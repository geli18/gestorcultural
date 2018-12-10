<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */

$this->title = 'Nuevo  Instructor';
$this->params['breadcrumbs'][] = ['label' => 'Instructores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instructor-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
