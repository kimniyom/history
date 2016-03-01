<?php

namespace app\controllers;

use Yii;
use app\models\DrugOpd;
use app\models\DrugIpd;

class DrugController extends \yii\web\Controller {

    public function actionIndex() {
        $HOSPCODE = \Yii::$app->request->post('HOSPCODE');
        $PID = \Yii::$app->request->post('PID');
        $SEQ = \Yii::$app->request->post('SEQ');
        $DrugIpd = new DrugIpd();
        $DrugOpd = new DrugOpd();
        $data['drug_opd'] = $DrugIpd->Get_drug_ipd($HOSPCODE, $PID, $SEQ);
        $data['drug_ipd'] = $DrugOpd->Get_drug_opd($HOSPCODE, $PID, $SEQ);
        return $this->renderPartial('view', $data);
    }

}
