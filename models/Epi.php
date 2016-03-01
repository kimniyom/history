<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "epi".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $SEQ
 * @property string $DATE_SERV
 * @property string $VACCINETYPE
 * @property string $VACCINEPLACE
 * @property string $PROVIDER
 * @property string $D_UPDATE
 */
class Epi extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'epi';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['HOSPCODE', 'PID', 'DATE_SERV', 'VACCINETYPE'], 'required'],
            [['HOSPCODE'], 'string', 'max' => 9],
            [['PID', 'SEQ', 'DATE_SERV', 'VACCINETYPE', 'VACCINEPLACE', 'PROVIDER', 'D_UPDATE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'HOSPCODE' => 'Hospcode',
            'PID' => 'Pid',
            'SEQ' => 'Seq',
            'DATE_SERV' => 'Date  Serv',
            'VACCINETYPE' => 'Vaccinetype',
            'VACCINEPLACE' => 'Vaccineplace',
            'PROVIDER' => 'Provider',
            'D_UPDATE' => 'D  Update',
        ];
    }

    public function get_epi($cid) {
        $sql = "SELECT o.off_name AS VACCINEPLACE,DATE_SERV,VCC_ENG_NAME,YEAR(FROM_DAYS(DATEDIFF(DATE_SERV, p.birth))) AS SERVICE_AGE,CONCAT(pv.PRENAME,pv.NAME,' ',pv.LNAME) AS PROVIDER 
            FROM epi e
                INNER JOIN person p ON p.HOSPCODE = e.HOSPCODE AND p.PID = e.PID
                LEFT JOIN mas_vcc vcc ON vcc.VCCCODE = e.VACCINETYPE
                LEFT JOIN provider pv ON pv.HOSPCODE = e.HOSPCODE AND pv.PROVIDER = e.PROVIDER
                LEFT JOIN co_office o ON o.off_id = e.VACCINEPLACE
                WHERE p.CID = '$cid' AND p.CID != ''";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

}
