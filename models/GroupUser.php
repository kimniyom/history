<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_user".
 *
 * @property integer $id
 * @property string $group_name
 * @property string $detail
 */
class GroupUser extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'group_user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['group_name', 'detail'], 'required'],
            [['group_name', 'detail'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'group_name' => 'ชื่อกลุ่มผู้ใช้งาน',
            'detail' => 'รายละเอียด',
        ];
    }

    public function Get_group_outselect($userId = null) {
        $sql = "SELECT user_id,group_id  FROM privilege WHERE user_id = '$userId' ";
        $group = \Yii::$app->db->createCommand($sql)->queryAll();
        $groupUser = array();
        foreach ($group as $rs):
            $groupUser[] = "'" . $rs['group_id'] . "'";
        endforeach;
        $inGroup = implode(",", $groupUser);

        if (!empty($inGroup)) {
            $group = $inGroup;
        } else {
            $group = "''";
        }
        $sql2 = "SELECT *  FROM group_user WHERE id NOT IN ($group) ORDER BY id ASC";
        $pcuOutgroup = \Yii::$app->db->createCommand($sql2)->queryAll();

        return $pcuOutgroup;
    }

    public function Get_privilege_user($userId = null) {
        $sql = "SELECT p.*,g.group_name FROM privilege p INNER JOIN group_user g ON p.group_id = g.id WHERE p.user_id = '$userId' ";
        $group = \Yii::$app->db->createCommand($sql)->queryAll();
        return $group;
    }

}
