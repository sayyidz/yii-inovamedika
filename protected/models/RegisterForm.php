<?php

class RegisterForm extends CFormModel
{
    public $name;
    public $email;
    public $password;
    public $confirmPassword;
    public $gender;
    public $tanggal_lahir;

    public function rules()
    {
        return array(
            array('name, email, password, confirmPassword, gender, tanggal_lahir', 'required'),
            array('email', 'email'),
            array('email', 'unique', 'className' => 'User', 'attributeName' => 'email', 'message' => 'Email sudah digunakan.'),
            array('password', 'length', 'min' => 6, 'message' => 'Password minimal 6 karakter.'),
            array('confirmPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Konfirmasi password tidak cocok.'),
            array('gender', 'in', 'range' => array('Laki-laki', 'Perempuan'), 'message' => 'Pilih gender yang valid.'),
            array('tanggal_lahir', 'date', 'format' => 'yyyy-MM-dd'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Nama Lengkap',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Konfirmasi Password',
            'gender' => 'Jenis Kelamin',
            'tanggal_lahir' => 'Tanggal Lahir',
        );
    }
}
