<?php

namespace app\controllers\backend;

use Yii;
use app\models\GroupPcu;
use app\models\GroupPcuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * GroupPcuController implements the CRUD actions for GroupPcu model.
 */
class GroupPcuController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all GroupPcu models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GroupPcuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GroupPcu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {

        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GroupPcu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GroupPcu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GroupPcu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GroupPcu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GroupPcu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GroupPcu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GroupPcu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGet_in_group() {
        $input = \Yii::$app->request;
        $GroupId = $input->post('id');
        $model = new GroupPcu();
        $pcu = $model->get_pcu_ingroup($GroupId);

        return $this->renderPartial('pcu', ['pcu' => $pcu]);
    }

    public function actionGet_pcu_all() {
        $input = \Yii::$app->request;
        $GroupId = $input->post('id');
        $model = new GroupPcu();
        $pcu = $model->get_pcu_outgroup($GroupId);

        return $this->renderPartial('pcu_out_groups', [
                    'pcu' => $pcu,
                    'groupId' => $GroupId,
        ]);
    }

    public function actionAdd_pcu() {
        $input = \Yii::$app->request;
        $GroupId = $input->post('groupId');
        $hospcode = $input->post('hospcode');
        $columns = array(
            "hospcode" => $hospcode,
            "group_id" => $GroupId
        );
        \Yii::$app->db->createCommand()
                ->insert("group_pcu", $columns)
                ->execute();
        $json = array("hospcode" => $hospcode);
        echo json_encode($json);
    }

}
