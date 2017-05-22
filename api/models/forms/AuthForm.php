<?php namespace app\models\forms;

use app\models\base\User;
use yii\base\Model;

class AuthForm extends Model {
    public $email;
    public $password;
    public $token;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['email'], 'email']
        ];
    }

    public static function create($post)
    {
        $model = new AuthForm();
        $model->attributes = $post;
        return $model;
    }

    public function login()
    {
        $model = User::find(['email' => $this->email])->one();
        if ($model !== null) {
            if ($model->validatePassword($this->password)) {
                $this->token = $model->getJWT();
                return true;
            }
            $this->addError('password', 'The email or password combination is invalid.');
        }
        return false;
    }
}