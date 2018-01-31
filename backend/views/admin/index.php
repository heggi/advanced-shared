<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Администраторы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Добавить администратора', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'username',
                'content' => function($data) {
                    return Html::a($data->username, ['view', 'id' => $data->id]);
                },
            ],
            'name',
            'email:email',
            [
                'attribute' => 'status',
                'content' => function($data) {
                    return $data->statusString;
                }
            ],
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {password} {delete}',
                'visibleButtons' => [
                    'update' => true,
                    'view' => false,
                    'delete' => function ($model, $key, $index) {
                        return $model->id !== Yii::$app->user->identity->id;
                    },
                    'password' => true,
                ],
                'buttons' => [
                    'password' => function($url, $model, $key) {
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-lock"]);
                        return Html::a($icon, ['password', 'id' => $model->id], [
                            'title' => 'Сменить пароль',
                            'aria-label' => 'Сменить пароль',
                            'data-pjax' => '0',
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
