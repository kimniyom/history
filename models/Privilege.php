<?php

namespace app\models;

use Yii;
use yii\db\Query;
use app\models\GroupPcu;

/**
 * This is the model class for table "privilege".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $group_id
 * @property string $create_date
 *
 * @property Masuser $user
 */
class Privilege extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'privilege';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'group_id'], 'integer'],
            [['create_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'group_id' => 'รหัสกลุ่ม',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(Masuser::className(), ['id' => 'user_id']);
    }

    public function getPrivilege($userId = null) {
        $db = new Query;
        $db->select("group_id")
                ->from("privilege")
                ->where("user_id = '$userId' ");
        $groupUser = $db->all();
        $GroupUserArr = array();
        foreach ($groupUser as $Guser):
            $GroupUserArr[] = "'" . $Guser['group_id'] . "'";
        endforeach;
        $GroupUser = implode(",", $GroupUserArr);

        if (!empty($GroupUser)) {
            $GroupUserVal = $GroupUser;
        } else {
            $GroupUserVal = "''";
        }

        if (!empty($GroupUserVal)) {

            $Privilege = GroupPcu::find()->where('group_id IN(' . $GroupUserVal . ')')->all();
            $PcuArr = array();
            foreach ($Privilege as $rs):
                $PcuArr[] = $rs['hospcode'];
            endforeach;
        } else {
            $PcuArr = null;
        }

        Yii::$app->session['privilege'] = $PcuArr;
    }

}
