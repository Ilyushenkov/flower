<?php

namespace app\models;

use Yii;
use yii\db\conditions\LikeCondition;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $status
 * @property string $name
 * @property string $surname
 * @property string|null $patronymic
 * @property string $login
 * @property string $password
 * @property string $email
 *
 * @property Cart[] $carts
 */
class RegForm extends User
{

    public $password_confirm;
    public $agree;

    public function rules()
    {
        return [
            [['status'], 'string'],
            [['name', 'surname', 'patronymic', 'login', 'password', 'password_confirm', 'email', 'agree'], 'required', 'message'=>'Поле обязательно длл заполнения'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 50],
            [['name', 'surname', 'patronymic'], 'match', 'pattern' => '/^[А-ЯЁа-яё\s-]+$/u', 'message'=>'Используйте кириллические буквы, пробел тире'],
            [['login'], 'match', 'pattern' => '/^[A-Za-z-]+$/', 'message'=>'Используйте латинские буквы и тире'],
            [['login'], 'unique', 'message'=>'Такой логин уже занят'],
            [['password_confirm'], 'compare', 'compareAttribute' => 'password', 'message'=>'Пароли должны совпадать'],
            [['login', 'email'], 'string', 'max' => 100],
            [['password'], 'string', 'min' => 6, 'message'=>'Используйте не менее 6 символов'],
            [['agree'], 'compare', 'compareValue' => true, 'message'=>'Подтвердите согласие'],
            [['email'], 'email', 'message'=>'Адрес электронной почты некорректен']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Введите ваше имя',
            'surname' => 'Введите вашу фамилию',
            'patronymic' => 'Введите ваше отчество',
            'login' => 'Введите логин',
            'password' => 'Введите пароль',
            'password_confirm'=>'Повторите пароль',
            'email' => 'Email',
            'agree' => 'Даю согласие на обработку персональных данных'
        ];
    }
}
