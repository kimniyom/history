<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Json;
use app\models\Google_map;
use yii\helpers\Url;

class SearchController extends Controller {

    public $layout = "admin-lte";

    public function actionIndex() {
        return $this->render('index');
    }

    //คนหาคนตาม CID ชื่อ นามสกุล ดึงมาทั้งจังหวัด
    public function actionSearch_patient() {
        $model = new \app\models\SearchModel();
        $request = \Yii::$app->request;
        $cid = $request->post('cid');
        $name = $request->post('name');
        $surname = $request->post('lname');

        $result = $model->PatientSearch($cid, $name, $surname);
        return $this->renderPartial('patient', [
                    "result" => $result,
        ]);
    }

    //ข้อมูลประวัติการรับบริการ
    public function actionGet_service() {
        $cid = \Yii::$app->request->post('cid');
        $model = new \app\models\SearchModel();

        $result = $model->GetService($cid);
        return $this->renderPartial('service', [
                    "result" => $result,
        ]);
    }

    //ข้อมูลเบื้องต้น
    public function actionGet_detail_person() {
        $Map = new Google_map();
        $Map->SetCenter("16.940225, 99.074165");
        //$link = Url::toRoute('search/kml_ampur_all', true);
        $Map->SetArea('');
        $Map->Zoom("10");
        $Map->Maptype(""); //Type ROADMAP,SATELLITE ,HYBRID ,TERRAIN
        $Marker = $Map->SetMarker("1", "16.940225", "99.074165", "kimniyom", '');
        $Map->Marker($Marker);
        $map_person = $Map->Render();

        $cid = \Yii::$app->request->post('cid');
        $model = new \app\models\SearchModel();
        $address_model = new \app\models\Address();
        $result = $model->GetPersonInfo($cid);
        $address = $address_model->Get_address_person($result['HOSPCODE'], $result['PID']);
        //find()->where(['HOSPCODE' => $result['HOSPCODE'], 'PID' => $result['PID']])->one();
        //echo $map;
        return $this->renderPartial('detail_person', [
                    "model" => $result,
                    "address" => $address,
                    "map" => $map_person,
        ]);
    }
    
    //ข้อมูลได้รับการวินิจฉัย
    public function actionGet_diag() {
        $hospCode = \Yii::$app->request->post('hospcode');
        $pid = \Yii::$app->request->post('pid');
        $seq = \Yii::$app->request->post('seq');

        $model = new \app\models\SearchModel();

        $result = $model->GetDiag($hospCode, $pid, $seq);
        return $this->renderPartial('diagnosis', [
                    "result" => $result,
        ]);
    }

    //ข้อมูลการรับบริการในคิวนั้น
    public function actionGet_service_detail() {
        $hospCode = \Yii::$app->request->post('hospcode');
        $cid = \Yii::$app->request->post('cid');
        $seq = \Yii::$app->request->post('seq');

        $model = new \app\models\SearchModel();

        $result = $model->GetServiceDetail($hospCode, $cid, $seq);
        return $this->renderPartial('service_detail', [
                    "model" => $result,
        ]);
    }

}
