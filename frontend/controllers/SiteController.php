<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\Pelanggan;
use common\components\AuthHandler;
use \yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends Controller
{

	public $successUrl = ''; //bikin variabel successUrl

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
			'auth' => [
						'class' => 'yii\authclient\AuthAction',
						//'successCallback' => [$this, 'onAuthSuccess'],
						'successCallback' => [$this, 'successCallback'],
					],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

		/*public function onAuthSuccess($client)
	 {
			 (new AuthHandler($client))->handle();
	 }*/

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
  {
    $model = new SignupForm();
		$plg=new Pelanggan();

	// Tambahkan ini aje.. session yang kita buat sebelumnya, MULAI
	$session = Yii::$app->session;
	if (!empty($session['attributes'])){
			$model->username = $session['attributes']['first_name'];
			$model->email = $session['attributes']['email'];
	}
    // SELESAI
        if ($model->load(Yii::$app->request->post())) {
			$pos=Yii::$app->request->post();
            if ($user = $model->signup()) {

				$plg->Nama=$pos['Pelanggan']['Nama'];
				$plg->Alamat=$pos['Pelanggan']['Alamat'];
				$plg->Kontak=$pos['Pelanggan']['Kontak'];
				$plg->User_id=$user->id;
				$plg->save();
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }

            }
        }
		return $this->render('signup', [
            'model' => $model,'plg'=>$plg
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

	public function successCallback($client) {
  // get user data from client
  $attributes = $client->getUserAttributes();
	#die(print_r($attributes));
  // do some thing with user data. for example with $userAttributes['email']

	$user = \common\models\User::find()
        ->where([
            'email'=>$attributes['email'],
        ])
        ->one();
    if(!empty($user)){
        Yii::$app->user->login($user);
    }
    else{
				//Yii::$app->session->setFlash('danger','Email tidak terdaftar!!!');
        //Simpen disession attribute user dari Google
        $session = Yii::$app->session;
        $session['attributes']=$attributes;
        // redirect ke form signup, dengan mengset nilai variabell global successUrl
        $this->successUrl = Yii::$app->response->redirect(Url::to(['signup']));
		}
	}
}
