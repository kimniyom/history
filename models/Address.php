<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $ADDRESSTYPE
 * @property string $HOUSE_ID
 * @property string $HOUSETYPE
 * @property string $ROOMNO
 * @property string $CONDO
 * @property string $HOUSENO
 * @property string $SOISUB
 * @property string $SOIMAIN
 * @property string $ROAD
 * @property string $VILLANAME
 * @property string $VILLAGE
 * @property string $TAMBON
 * @property string $AMPUR
 * @property string $CHANGWAT
 * @property string $TELEPHONE
 * @property string $MOBILE
 * @property string $D_UPDATE
 */
class Address extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['HOSPCODE', 'PID', 'ADDRESSTYPE'], 'required'],
            [['HOSPCODE'], 'string', 'max' => 9],
            [['PID', 'ADDRESSTYPE', 'HOUSE_ID', 'HOUSETYPE', 'ROOMNO', 'CONDO', 'HOUSENO', 'VILLAGE', 'TAMBON', 'AMPUR', 'CHANGWAT', 'TELEPHONE', 'MOBILE', 'D_UPDATE'], 'string', 'max' => 100],
            [['SOISUB', 'SOIMAIN', 'ROAD', 'VILLANAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'HOSPCODE' => 'Hospcode',
            'PID' => 'Pid',
            'ADDRESSTYPE' => 'Addresstype',
            'HOUSE_ID' => 'House  ID',
            'HOUSETYPE' => 'Housetype',
            'ROOMNO' => 'Roomno',
            'CONDO' => 'Condo',
            'HOUSENO' => 'Houseno',
            'SOISUB' => 'Soisub',
            'SOIMAIN' => 'Soimain',
            'ROAD' => 'Road',
            'VILLANAME' => 'Villaname',
            'VILLAGE' => 'Village',
            'TAMBON' => 'Tambon',
            'AMPUR' => 'Ampur',
            'CHANGWAT' => 'Changwat',
            'TELEPHONE' => 'Telephone',
            'MOBILE' => 'Mobile',
            'D_UPDATE' => 'D  Update',
        ];
    }

    public function Get_address_person($hospcode = null, $pid = null) {
        $sql = "SELECT a.HOUSENO,
                        a.ROAD,
                        c.changwatname,
                        am.ampurname,
                        t.tambonname,
                        v.villagename
                    FROM address a 
                    LEFT JOIN cchangwat_all c ON a.CHANGWAT = c.changwatcode
                    LEFT JOIN campur am ON a.CHANGWAT = am.changwatcode AND a.AMPUR = am.ampurcode
                    LEFT JOIN ctambon t ON a.CHANGWAT = t.changwatcode AND a.AMPUR = RIGHT(t.ampurcode,2) AND a.TAMBON = RIGHT(t.tamboncode,2)
                    LEFT JOIN cvillage v ON a.CHANGWAT = v.changwatcode AND a.AMPUR = RIGHT(v.ampurcode,2) AND a.TAMBON = RIGHT(v.tamboncode,2) AND a.VILLAGE = RIGHT(v.villagecode,2)
                    WHERE a.HOSPCODE = '$hospcode' AND a.PID = '$pid' ";

        $result = \Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

    public function Get_home($HID = null, $HOSPCODE = null) {
        $sql = "SELECT LATITUDE,LONGITUDE FROM home WHERE HID = '$HID' AND HOSPCODE = '$HOSPCODE' ";
        $result = \Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

}
