<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appointment".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $AN
 * @property string $SEQ
 * @property string $DATE_SERV
 * @property string $CLINIC
 * @property string $APDATE
 * @property string $APTYPE
 * @property string $APDIAG
 * @property string $PROVIDER
 * @property string $D_UPDATE
 */
class Appointment extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'appointment';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['HOSPCODE', 'PID', 'SEQ'], 'required'],
            [['HOSPCODE'], 'string', 'max' => 9],
            [['PID', 'AN', 'SEQ', 'DATE_SERV', 'CLINIC', 'APDATE', 'APTYPE', 'APDIAG', 'PROVIDER', 'D_UPDATE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'HOSPCODE' => 'Hospcode',
            'PID' => 'Pid',
            'AN' => 'An',
            'SEQ' => 'Seq',
            'DATE_SERV' => 'Date  Serv',
            'CLINIC' => 'Clinic',
            'APDATE' => 'Apdate',
            'APTYPE' => 'Aptype',
            'APDIAG' => 'Apdiag',
            'PROVIDER' => 'Provider',
            'D_UPDATE' => 'D  Update',
        ];
    }

    public function get_appoint($HOSPCODE = null, $PID = null, $SEQ = NULL) {
        $sql = "SELECT APDATE,ma.APTYPE_NAME_ENG AS APTYPE,APDIAG,DIAG_THAI_NAME AS DIAGNAME,
                mc.CLINIC_NAME AS CLINIC,CONCAT(PRENAME,NAME,' ',LNAME) AS PROVIDER
                FROM appointment a 
                LEFT JOIN mas_appoint ma ON ma.APTYPE_CODE = a.APTYPE 
                LEFT JOIN mas_diag md ON md.DIAGCODE = a.APDIAG 
                LEFT JOIN mas_clinic mc ON mc.CLINIC = SUBSTRING(a.CLINIC,2,2) 
                LEFT JOIN provider pv ON pv.HOSPCODE = a.HOSPCODE AND pv.PROVIDER = a.PROVIDER
                WHERE a.HOSPCODE = '$HOSPCODE' AND a.PID = '$PID' AND a.SEQ = '$SEQ' ";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function get_appoint_all($HOSPCODE = null, $PID = nullL) {
        $sql = "SELECT APDATE,ma.APTYPE_NAME_ENG AS APTYPE,APDIAG,DIAG_THAI_NAME AS DIAGNAME,
                mc.CLINIC_NAME AS CLINIC,CONCAT(PRENAME,NAME,' ',LNAME) AS PROVIDER
                FROM appointment a 
                LEFT JOIN mas_appoint ma ON ma.APTYPE_CODE = a.APTYPE 
                LEFT JOIN mas_diag md ON md.DIAGCODE = a.APDIAG 
                LEFT JOIN mas_clinic mc ON mc.CLINIC = SUBSTRING(a.CLINIC,2,2) 
                LEFT JOIN provider pv ON pv.HOSPCODE = a.HOSPCODE AND pv.PROVIDER = a.PROVIDER
                WHERE a.HOSPCODE = '$HOSPCODE' AND a.PID = '$PID'  ORDER BY a.APDATE DESC";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

}
