<?php

namespace app\controllers;

use Yii;
use app\models\ChargeOpd;
use app\models\ChargeIpd;

class ExpensesController extends \yii\web\Controller {

    public function actionIndex() {
        $OPD = new ChargeOpd();
        $IPD = new ChargeIpd();

        $HOSPCODE = \Yii::$app->request->post('HOSPCODE');
        $PID = \Yii::$app->request->post('PID');
        $SEQ = \Yii::$app->request->post('SEQ');

        $data['opd'] = $OPD->get_charg_opd($HOSPCODE, $PID, $SEQ);
        $data['ipd'] = $IPD->get_charg_ipd($HOSPCODE, $PID, $SEQ);
        return $this->renderPartial('view', $data);
    }

}
