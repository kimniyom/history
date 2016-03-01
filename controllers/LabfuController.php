<?php

namespace app\controllers;

use Yii;
use app\models\Labfu;

class LabfuController extends \yii\web\Controller {

    public function actionIndex() {
        $HOSPCODE = \Yii::$app->request->post('HOSPCODE');
        $PID = \Yii::$app->request->post('PID');
        $SEQ = \Yii::$app->request->post('SEQ');

        $data['lab'] = Labfu::find()->where(['HOSPCODE' => $HOSPCODE, 'PID' => $PID, 'SEQ' => $SEQ])->all();
        return $this->renderPartial('index', $data);
    }

}
