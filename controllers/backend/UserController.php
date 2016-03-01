<?php

namespace app\controllers;

use Yii;
use app\models\Appointment;

class UserController extends \yii\web\Controller {

    public function actionView() {
        $model = new Appointment();
        $HOSPCODE = \Yii::$app->request->post('HOSPCODE');
        $PID = \Yii::$app->request->post('PID');
        $SEQ = \Yii::$app->request->post('SEQ');

        $appoint = $model->get_appoint($HOSPCODE, $PID, $SEQ);
        $appoint_all = $model->get_appoint_all($HOSPCODE, $PID);
        return $this->renderPartial('view', [
                    'appoint' => $appoint,
                    'appoint_all' => $appoint_all,
                        ]
        );
    }

    public function actionIndex() {
        $model = new Appointment();
        $HOSPCODE = \Yii::$app->request->post('HOSPCODE');
        $PID = \Yii::$app->request->post('PID');
        $SEQ = \Yii::$app->request->post('SEQ');
        $result = $model->get_appoint($HOSPCODE, $PID, $SEQ);
        return $this->renderPartial('index', ['result' => $result]);
    }

    public function actionAll() {
        $model = new Appointment();
        $HOSPCODE = \Yii::$app->request->post('HOSPCODE');
        $PID = \Yii::$app->request->post('PID');

        $result = $model->get_appoint_all($HOSPCODE, $PID);
        return $this->renderPartial('all', ['result' => $result]);
    }

}
