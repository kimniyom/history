<?php

namespace app\controllers\backend;

use Yii;
use app\models\GroupUser;
use app\models\GroupUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\GroupPcu;

/**
 * GroupUserController implements the CRUD actions for GroupUser model.
 */
class GroupUserController extends Controller {

    public $layout = "backend";

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
     * Lists all GroupUser models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GroupUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GroupUser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = new GroupPcu();
        $pcu = $model->get_pcu_ingroup($id);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'pcu' => $pcu,
        ]);
    }

    /**
     * Creates a new GroupUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GroupUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GroupUser model.
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
     * Deletes an existing GroupUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GroupUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GroupUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GroupUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGet_group() {
        $input = Yii::$app->request;
        $userId = $input->post('userId');

        $Model = new GroupUser();
        $GroupUser = $Model->Get_group_outselect($userId);

        return $this->renderPartial('group_user', [
                    'groupUser' => $GroupUser,
                    'userId' => $userId,
        ]);
    }

    public function actionPrivilege_user() {
        $input = Yii::$app->request;
        $userId = $input->post('userId');

        $Model = new GroupUser();
        $privilege = $Model->Get_privilege_user($userId);

        return $this->renderPartial('privilege_user', [
                    'privilege' => $privilege,
        ]);
    }

    public function actionAdd_privilege() {
        $input = Yii::$app->request;
        $userId = $input->post('userId');
        $groupId = $input->post('groupId');
        $columns = array(
            "user_id" => $userId,
            "group_id" => $groupId
        );

        Yii::$app->db->createCommand()
                ->insert("privilege", $columns)
                ->execute();
    }

    public function actionDelete_privilege() {
        $input = Yii::$app->request;
        $Id = $input->post('id');
        Yii::$app->db->createCommand()
                ->delete("privilege", "id = '$Id' ")
                ->execute();
    }

}
