<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Session;
use app\models\Masuser;
use app\models\Privilege;

class SiteController extends Controller {

    public $layout = "admin-lte";

    /*
      public function behaviors() {
      return [
      'access' => [
      'class' => AccessControl::className(),
      'only' => ['logout'],
      'rules' => [
      [
      'actions' => ['logout'],
      'allow' => true,
      'roles' => ['@'],
      ],
      ],
      ],
      'verbs' => [
      'class' => VerbFilter::className(),
      'actions' => [
      'logout' => ['post'],
      ],
      ],
      ];
      }

      public function actions() {
      return [
      'error' => [
      'class' => 'yii\web\ErrorAction',
      ],
      'captcha' => [
      'class' => 'yii\captcha\CaptchaAction',
      'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      ],
      ];
      }
     *
     * 
     */

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLogin() {
        $Model = new Masuser();

        $request = \Yii::$app->request;
        $username = $request->post('username');
        $passwordInput = $request->post('password');

        $Auth = $Model->Auth($username);
        if (!empty($Auth)) {
            if ($Auth['password'] == $passwordInput) {
                \Yii::$app->session['username'] = $username;
                \Yii::$app->session['userId'] = $Auth['id'];
                \Yii::$app->session['user'] = true;

                //Set Privilege In Session
                $Privilege = new Privilege();
                $Privilege->getPrivilege($Auth['id']);

                $flag = "1";
            } else {
                $flag = "0";
            }
        } else {
            $flag = "0";
        }
    }

    public function actionLogout() {
        \Yii::$app->user->logout();
        $session = \Yii::$app->session;
        $session->destroy();
        $this->redirect(['site/index'],302);
        //\Yii::$app->uns
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    public function actionAbout() {
        return $this->render('about');
    }

}
