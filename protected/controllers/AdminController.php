<?php

class AdminController extends Controller
{
    public function filters()
    {
        return array('accessControl');
    }

    public function accessRules()
    {
        return array(
            array('allow',
            'actions' => array('index', 'view'),
            'users' => array('@'),
            'expression' => 'Yii::app()->user->role === "admin"',
            ),
        );
    }

    public function actionIndex()
    {
        echo "Halaman Admin: Kelola Pengguna dan Data";
    }

    public function actionAssignRole($id)
	{
		$auth = Yii::app()->authManager;
		$user = User::model()->findByPk($id);

		if (!$user) {
			throw new CHttpException(404, 'User tidak ditemukan.');
		}

		if (isset($_POST['role'])) {
			// Hapus semua role sebelumnya
			$auth->revoke('admin', $id);
			$auth->revoke('dokter', $id);
			$auth->revoke('pasien', $id);

			// Assign role baru
			$auth->assign($_POST['role'], $id);

			Yii::app()->user->setFlash('success', 'Role berhasil diperbarui.');
			$this->redirect(array('admin/user'));
		}

		$this->render('assignRole', array('user' => $user));
	}

    public function actionChangeRole($id)
{
    $user = User::model()->findByPk($id);

    if (!$user) {
        throw new CHttpException(404, 'User tidak ditemukan.');
    }

    if (isset($_POST['role'])) {
        $user->role = $_POST['role'];
        
        if ($user->save()) {
            Yii::app()->user->setFlash('success', 'Role berhasil diubah.');
            $this->redirect(array('admin/changeRole?id=4'));
        } else {
            Yii::app()->user->setFlash('error', 'Gagal mengubah role.');
        }
    }

    $this->render('changeRole', array('user' => $user));
    }

}
