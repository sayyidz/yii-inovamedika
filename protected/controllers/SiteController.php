<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		$pegawai = Pegawai::model()->findAll();
        $this->render('index', array('pegawai' => $pegawai));
		
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionLogin()
	{
		if (!Yii::app()->user->isGuest) {
            $this->redirect(array('site/index'));
        }

        $model = new LoginForm();

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()) {
                $role = Yii::app()->user->role;

				if ($role === 'admin') {
					$this->redirect(array('site/index'));
				} elseif ($role === 'dokter') {
					$this->redirect(array('dokter/dokter'));
				} else {
					$this->redirect(array('site/index'));
				}
            }
        }

        $this->render('login', array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionRegister()
    {
        $model = new RegisterForm;

    if (isset($_POST['RegisterForm'])) {
        $model->attributes = $_POST['RegisterForm'];

        if ($model->validate()) {
            $user = new User;
            $user->nama = $model->name;
            $user->email = $model->email;
            $user->password = $model->password;
            $user->gender = $model->gender;
            $user->tanggal_lahir = $model->tanggal_lahir;

            if ($user->save()) {
				// Yii::app()->authManager->assign('pasien', $user->id);
                Yii::app()->user->setFlash('success', 'Registrasi berhasil! Silakan login.');
                $this->redirect(array('site/login'));
            } else {
                // Debug jika save gagal
                print_r($user->getErrors());
                exit;
            }
        } else {
            // Debug jika validate gagal
            print_r($model->getErrors());
            exit;
        }
    }

    $this->render('register', array('model' => $model));
	}
}