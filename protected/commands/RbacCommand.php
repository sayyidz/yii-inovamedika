<?php

class RbacCommand extends CConsoleCommand
{
    public function actionCheckRoles()
    {
        $roles = Yii::app()->authManager->getAuthItems(2); // 2 = Role
        print_r($roles);
    }

}
