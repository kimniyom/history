<?php

namespace app\controllers;

use Yii;
use app\models\ProcedureOpd;
use app\models\ProcedureIpd;

class ProcedureController extends \yii\web\Controller {

    public function actionIndex() {

        $model = new ProcedureOpd();
        $ipd_model = new ProcedureIpd();
        $HOSPCODE = \Yii::$app->request->post('HOSPCODE');
        $PID = \Yii::$app->request->post('PID');
        $SEQ = \Yii::$app->request->post('SEQ');

        $data['proced_opd'] = $model->Get_procedure($HOSPCODE, $PID, $SEQ);
        $data['proced_ipd'] = $ipd_model->Get_procedure_ipd($HOSPCODE, $PID, $SEQ);
        return $this->renderPartial('view', $data);
    }

}
