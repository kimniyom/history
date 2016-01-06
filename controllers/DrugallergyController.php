<?php

namespace app\controllers;

use Yii;
use app\models\Drugallergy;

class DrugallergyController extends \yii\web\Controller {

    public function actionIndex() {
        $HOSPCODE = \Yii::$app->request->post('HOSPCODE');
        $PID = \Yii::$app->request->post('PID');
        $result = Drugallergy::find()->where(['HOSPCODE' => $HOSPCODE, 'PID' => $PID])->all();
        return $this->renderPartial('index', ['result' => $result]);
    }

}
