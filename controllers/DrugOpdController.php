<?php

namespace app\controllers;

use Yii;
use app\models\DrugOpd;

class DrugOpdController extends \yii\web\Controller {

    public function actionIndex() {
        $HOSPCODE = \Yii::$app->request->post('HOSPCODE');
        $PID = \Yii::$app->request->post('PID');
        $SEQ = \Yii::$app->request->post('SEQ');
        $result = DrugOpd::find()->where(['HOSPCODE' => $HOSPCODE, 'PID' => $PID, 'SEQ' => $SEQ])->all();
        return $this->renderPartial('index', ['result' => $result]);
    }

}
