<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $count
 * @property string $status
 * @property int $user_id
 * @property string $date
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'count', 'user_id'], 'required'],
            [['price', 'count', 'user_id'], 'integer'],
            [['status'], 'string'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['reason'], 'string', 'max'=>250]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'price' => 'Цена',
            'count' => 'Количество',
            'status' => 'Статус заказа',
            'user_id' => 'User ID',
            'date' => 'Дата оформления',
            'reason'=>'Пояснение'
        ];
    }
}
