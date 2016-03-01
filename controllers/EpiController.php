<?php

namespace app\controllers;

use Yii;
use app\models\Epi;

class EpiController extends \yii\web\Controller {

    public function actionIndex() {
        $model = new Epi();
        $CID = \Yii::$app->request->post('CID');

        $result = $model->get_epi($CID);
        return $this->renderPartial('index', ['result' => $result]);
    }

}
