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
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'string'],
            [['name', 'surname', 'login', 'password', 'email'], 'required'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 50],
            [['login', 'email'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчетсво',
            'login' => 'Логин',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['user_id' => 'id']);
    }
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {


        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
       return self::find()->where(['login'=>$username])->one();

    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return ;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
