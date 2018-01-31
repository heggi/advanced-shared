<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php NavBar::begin([
        'options' => [
            'class' => 'navbar-inverse',
        ],
    ]); ?>

    <?= Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'activateParents' => true,
        'items' => [
            ['label' => 'Главная', 'url' => Url::home()],
            
            [
                'label' => 'Дополнительно',
                'items' => [
                    ['label' => 'Администраторы', 'url' => ['/admin/index']],
                ]
            ]
        ],
    ]) ?>

    <?= Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'activateParents' => true,
        'items' => [
            [
                'label' => Yii::$app->user->identity->name,
                'items' => [
                    ['label' => 'Сменить пароль', 'url' => ['/site/password']],
                    '<li class="divider"></li>',
                    [
                        'label' => 'Выход', 
                        'url' => ['/site/logout'], 
                        'linkOptions' => [
                            'data' => [
                                'method' => 'post'
                            ]
                        ]
                    ]
                ]
            ],
            
        ],
    ]) ?>

    <?php NavBar::end() ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
