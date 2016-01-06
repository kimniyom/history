<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drugallergy".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $DATERECORD
 * @property string $DRUGALLERGY
 * @property string $DNAME
 * @property string $TYPEDX
 * @property string $ALEVEL
 * @property string $SYMPTOM
 * @property string $INFORMANT
 * @property string $INFORMHOSP
 * @property string $D_UPDATE
 */
class Drugallergy extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'drugallergy';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['HOSPCODE', 'PID', 'DRUGALLERGY'], 'required'],
            [['HOSPCODE'], 'string', 'max' => 9],
            [['PID', 'DATERECORD', 'DRUGALLERGY', 'TYPEDX', 'ALEVEL', 'SYMPTOM', 'INFORMANT', 'INFORMHOSP', 'D_UPDATE'], 'string', 'max' => 100],
            [['DNAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'HOSPCODE' => 'Hospcode',
            'PID' => 'Pid',
            'DATERECORD' => 'Daterecord',
            'DRUGALLERGY' => 'Drugallergy',
            'DNAME' => 'Dname',
            'TYPEDX' => 'Typedx',
            'ALEVEL' => 'Alevel',
            'SYMPTOM' => 'Symptom',
            'INFORMANT' => 'Informant',
            'INFORMHOSP' => 'Informhosp',
            'D_UPDATE' => 'D  Update',
        ];
    }

    public function Type_dx($type = null) {
        if ($type == '1') {
            $typedx = "certain";
        } else if ($type == '2') {
            $typedx = "probable";
        } else if ($type == '3') {
            $typedx = "possible";
        } else if ($type == '4') {
            $typedx = "unlikely";
        } else {
            $typedx = "unclassified";
        }

        return $typedx;
    }

}
