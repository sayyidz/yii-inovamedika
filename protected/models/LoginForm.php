<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $email;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('email, password', 'required'),
            array('email', 'email'),
            array('rememberMe', 'boolean'),
            array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'email' => 'Email',
            'password' => 'Password',
            'rememberMe' => 'Ingat Saya',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 * @param string $attribute the name of the attribute to be validated.
	 * @param array $params additional parameters passed with rule when being executed.
	 */
	public function authenticate($attribute,$params)
	{
		if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->email, $this->password);
            if (!$this->_identity->authenticate()) {
                $this->addError('password', 'Email atau password salah.');
            }
        }
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->email, $this->password);
            $this->_identity->authenticate();
        }

        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            // Menentukan durasi sesi, default 30 hari jika Remember Me aktif
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 hari atau sesi biasa

            Yii::app()->user->login($this->_identity, $duration);

            // Ambil role pengguna dari sesi
            $role = Yii::app()->user->role;

            // Redirect sesuai role
            if ($role === 'pasien') {
                Yii::app()->controller->redirect(array('/site/index'));
            } elseif ($role === 'dokter') {
                Yii::app()->controller->redirect(array('/dokter/dokter'));
            }

            return true;
        } else {
            return false;
        }
	}
}
