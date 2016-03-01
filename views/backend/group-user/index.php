<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use app\models\GroupPcu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Group Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]);    ?>

    <p>
        <?= Html::a('Create Group User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'group_name',
            'detail',
            ['class' => '\kartik\grid\DataColumn',
                //'attribute' => 'status',
                'label' => 'สถานบริการในกลุ่มนี้',
                'mergeHeader' => true,
                'hAlign' => 'center',
                //'width' => '10%',
                'format' => 'raw',
                'value' => function ($model) {
                    $groupPcu = new GroupPcu();
                    $btn = "<button type=\"button\" class=\"btn btn-default btn-sm\" onclick=\"get_pcu_in_privilage('$model->id ','$model->group_name ')\">"
                            . "ดูสถานบริการ <span class=\"badge\">" . $groupPcu->count_pcu($model->id) . "</span>"
                            . "</button>";
                    return $btn;
                }],
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => $this->title,
        ],
    ]);
    ?>

</div>


<!--- 
    ######### Dialog Get PCU ###########
-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="pop_get_pcu">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="group_name">Modal title</h4>
            </div>
            <div class="modal-body" style="overflow-y: auto; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
                <div id="showpcu_in_group"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    function get_pcu_in_privilage(groupId, groupName) {
        $("#group_name").text(groupName);
        $("#pop_get_pcu").modal();
        $("#showpcu_in_group").html("<center>Loading ... </center>");
        var url = "<?php echo Yii::$app->urlManager->createUrl(['backend/group-pcu/get_in_group']) ?>";
        var data = {id: groupId};

        $.post(url, data, function (success) {
            $("#showpcu_in_group").html(success);
        });

    }
</script>
