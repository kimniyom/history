<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "masuser".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $lname
 * @property string $card
 * @property string $hospcode
 * @property integer $flag
 * @property string $create_date
 */
class Masuser extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'masuser';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'password', 'name', 'lname', 'card', 'hospcode'], 'required'],
            [['flag'], 'integer'],
            [['create_date'], 'safe'],
            [['username', 'password'], 'string', 'max' => 50],
            [['name', 'lname'], 'string', 'max' => 100],
            [['card'], 'string', 'max' => 13],
            [['hospcode'], 'string', 'max' => 10],
            [['card'], 'string', 'length' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'name' => 'Name',
            'lname' => 'Lname',
            'card' => 'Card',
            'hospcode' => 'Hospcode',
            'flag' => 'Flag',
            'create_date' => 'Create Date',
        ];
    }

    public function Auth($username = null) {
        $db = new Query;
        $db->select("*")
                ->from("masuser")
                ->where("username = '$username' ")
                ->limit("1");

        $rows = $db->one();
        return $rows;
    }

}
