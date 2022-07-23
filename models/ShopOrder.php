<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_order".
 *
 * @property int $id
 * @property string $status
 * @property int $user_id
 * @property int $cart_id
 * @property string|null $reason
 * @property string $date
 *
 * @property Cart $cart
 */
class ShopOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'string'],
            [['user_id', 'cart_id'], 'required'],
            [['user_id', 'cart_id'], 'integer'],
            [['date'], 'safe'],
            [['reason'], 'string', 'max' => 250],
            [['cart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::className(), 'targetAttribute' => ['cart_id' => 'id']],
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
            'user_id' => 'User ID',
            'cart_id' => 'Cart ID',
            'reason' => 'Reason',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::className(), ['id' => 'cart_id']);
    }
}
