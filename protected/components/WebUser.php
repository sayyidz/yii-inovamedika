<?php

class WebUser extends CWebUser
{
    private $_role;

    public function getRole()
    {
        if ($this->_role === null) {
            $user = User::model()->findByPk(Yii::app()->user->id);
            $this->_role = $user ? $user->role : 'guest';
        }
        return $this->_role;
    }
}
