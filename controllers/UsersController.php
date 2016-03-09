<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Masuser;
use yii\helpers\Url;
use app\models\LogOpen;

class UsersController extends Controller
{
	public $layout = "admin-lte";
    public function actionIndex()
    {
    	$Model = new Masuser();
    	$Log = new LogOpen();
    	$userId = Yii::$app->session['userId'];

    	$data['log'] = $Log->Getlog($userId);
    	$data['user'] = $Model->Getuser($userId);
    	
        return $this->render('index',$data);
    }

    public function actionUpdate(){
    	$post = Yii::$app->request;
    	$id = $post->post('id');
    	$columns = array(
			"prename" => $post->post('prename'),
			"name" => $post->post('name'),
			"lname" => $post->post('lname'),
			"card" => $post->post('card'),
			"username" => $post->post('username'),
			"hospcode" => $post->post('hospcode'),
			"tel" => $post->post('tel'),
			"email" => $post->post('email')
          );

    	Yii::$app->db->createCommand()
    		->update("masuser",$columns,"id = '$id' ")
    		->execute();
    }

    public function actionRepassword(){
    	$post = Yii::$app->request;
    	$id = $post->post('id');

    	$columns = array(
    		"password" => $post->post('newpassword')
    	);
    	Yii::$app->db->createCommand()
    		->update("masuser",$columns,"id = '$id' ")
    		->execute();
    }
}
