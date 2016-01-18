<?php

namespace app\controllers;

use Yii;
use app\models\ProcedureOpd;

class ProcedureOpdController extends \yii\web\Controller {

    public function actionIndex() {

        $model = new ProcedureOpd();
        $HOSPCODE = \Yii::$app->request->post('HOSPCODE');
        $PID = \Yii::$app->request->post('PID');
        $SEQ = \Yii::$app->request->post('SEQ');
        $result = $model->Get_procedure($HOSPCODE, $PID, $SEQ);
        return $this->renderPartial('index', ['result' => $result]);
    }

}
