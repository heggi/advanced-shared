<?php

use yii\db\Migration;
use common\models\Admin;

/**
 * Class m180130_155150_add_admin_user
 */
class m180130_155150_add_admin_user extends Migration {

    public function up() {
        $admin = new Admin;
        $admin->id = 1;
        $admin->username = 'admin';
        $admin->password = 'IamAdmin';
        $admin->name = 'Администратор';

        if(!$admin->save()) {
            var_dump($admin->getErrors());
            return false;
        }
    }

    public function down() {
        Admin::delete(['id' => 1]);
    }
}
