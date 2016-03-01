<?php

namespace app\controllers;

use Yii;
use app\models\ChargeOpd;

class ChargeOpdController extends \yii\web\Controller {

    public function actionIndex() {
        $HOSPCODE = \Yii::$app->request->post('HOSPCODE');
        $PID = \Yii::$app->request->post('PID');
        $SEQ = \Yii::$app->request->post('SEQ');
        $result = ChargeOpd::find()->where(['HOSPCODE' => $HOSPCODE, 'PID' => $PID, 'SEQ' => $SEQ])->all();
        return $this->renderPartial('index', ['result' => $result]);
    }

}
