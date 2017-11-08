<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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

    /**
     * @inheritdoc
     */
    public function actions()
    {
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function  actionSay($message="Hello"){
        //cari dalam folder view, cari folder site -> views/site/say.php
        //return $this->render('say', compact('message'));
        return $this->render('say', ["message" => $message]);
    }

    public function actionTest(){
        $aNumeric = ["Nama","ali", "abu", "bakar"];

        /*echo "<pre>";
        print_r($aNumeric);
        //echo $aNumeric[2];
        echo "</pre>";*/

        echo "<ol style='list-style-type: lower-roman;'>";

        foreach ($aNumeric as $index => $name) {
            if($index > 0){
                //echo "<li>".$title.":".$name."</li>";
                echo "<li> $title : $name </li>";
            }
            else{
                $title = $name;
            }
        }

        echo "</ol>";
    }

    public function actionBelajarArray(){
        $aAli = [
                    "nama" => 'ali',
                    "umur" => 12,
                    "ic" => "123"
                ];

        $aAbu = [
                    "nama" => 'abu',
                    "umur" => 13,
                    "ic" => "1234"
                ];

        $aAmir = [
                    "nama" => 'amir',
                    "umur" => 12,
                    "ic" => "9111111"
                ];

        $aStuds = [ $aAbu, $aAli, $aAmir];

        /*echo "<pre>";
        print_r($aStud);
        echo "</pre>";
        die();*/

        echo "<ol>";
        foreach ($aStuds as $index => $aStud) {
            # code...
            echo "<li>$index";
                echo "<ul>";
                foreach ($aStud as $label => $value) {
                    echo "<li>$label : $value</li>";
                }
                echo "</ul>";
            echo "</li>";
        }
        echo "</ol>";
    }


 public function actionBelajarRequest(){

     // $noic=   $_POST['noic'];
     // $noic=   $_GET['noic'];

     $req=  Yii::$app->request;
     $req->get('noic');
     $req->post('noic');

     Yii::$app->request->get('noic');
     Yii::$app->request->post('noic','90');

      if($req->isPost){

      }


   $port=   $req->url;


   print_r($port);



 }


  public function actionBelajarResponse(){

        $Response=Yii::$app->response;

        $Response->format=\yii\web\Response::FORMAT_XML;
        $Response->data=['message'=>'hello world'];

  }


  public function actionBelajarSessions(){

       // $this->test1();


    $_SESSION['test']='test';
     $session=Yii::$app->session;

     $test=  $session->get('test');

    print_r( $test);
    echo "<br>";

    $session->set('test','test2');


      $test=  $session->get('test');

      print_r( $test);
      echo "<br>";

      $session->remove('test');

        $test=  $session->get('test');

      print_r( $test);
      echo "<br>";

      $session['testarray']=['number'=>'123',
                            'staff_id'=>2];

              $test=  $session->get('testarray');

              print_r( $test);
              echo "<br>";               

  }


public function test1(){

        echo 'test';

  }


    public function actionTest3(){

        $this->test1();
        $message='test';
        $d['hello']='yets';

       // return $this->renderPartial('/sample/index', ['message' => $message,'test'=>'test2']);


        $this->redirect(['test/index']);
  }



}
