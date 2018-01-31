<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Admin;

class PasswordForm extends Model {
    public $password;
    public $password_repeat;

    public function rules() {
        return [
            [['password', 'password_repeat'], 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать'],
        ];
    }

    public function attributeLabels() {
        return [
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
        ];
    }

    public function password($id = null) {
        if ($this->validate()) {
            if($id === null) {
                $user = Admin::findOne($id);
            } else {
                $user = Yii::$app->user->identity;
            }
            if($user === null) {
                return false;
            }
            $user->password = $this->password;
            return $user->save();
        } else {
            return false;
        }
    }
}
