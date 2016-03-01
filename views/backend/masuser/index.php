<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MasuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้ใช้งาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masuser-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <hr id="hr"/>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style=" position: absolute; right: 15px; bottom: 50px;">
        <?= Html::a('<i class="fa fa-plus fa-2x"></i>', ['create'], ['class' => 'btn btn-success btn-flag', 'id' => 'btn-circle']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            'password',
            'name',
            'lname',
            // 'card',
            // 'hospcode',
            // 'flag',
            // 'create_date',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => $this->title,
        ],
    ]);
    ?>

</div>
