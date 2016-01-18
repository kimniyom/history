<?php

namespace app\controllers;

use Yii;
use app\models\Chronic;

class ChronicController extends \yii\web\Controller {

    public function actionIndex() {
        $model = new Chronic();

        $HOSPCODE = Yii::$app->request->post('HOSPCODE');
        $PID = Yii::$app->request->post('PID');

        $data['model'] = $model->Get_chronic($HOSPCODE, $PID);
        return $this->renderPartial('index', $data);
    }

}
