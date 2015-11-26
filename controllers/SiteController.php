<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Session;

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
        $request = \Yii::$app->request;
        $username = $request->post('username');
        $password = $request->post('password');
        if ($username == 'admin' && $password == 'admin') {
            \Yii::$app->session['username'] = $username;
            \Yii::$app->session['hosname'] = "สสจ.ตาก";
            \Yii::$app->session['user'] = true;
            $flag = "1";
        } else {
            $flag = "0";
        }

        echo $flag;
        /*
          if (!\Yii::$app->user->isGuest) {
          return $this->goHome();
          }

          $model = new LoginForm();
          if ($model->load(Yii::$app->request->post()) && $model->login()) {
          return $this->goBack();
          }
          return $this->render('login', [
          'model' => $model,
          ]);
         * 
         */
    }

    public function actionLogout() {
        \Yii::$app->user->logout();
        $session = \Yii::$app->session;
        $session->destroy();
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
