<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Admin */

$this->title = 'Добавление администратора';
$this->params['breadcrumbs'][] = ['label' => 'Администраторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
