<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $photo
 * @property string $name
 * @property int $price
 * @property int $count
 * @property string $country
 * @property int $category_id
 * @property string $color
 * @property string $date
 *
 * @property Cart[] $carts
 * @property Category $category
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'name', 'price', 'country', 'category_id', 'color'], 'required'],
            [['price', 'count', 'category_id'], 'integer'],
            [['date'], 'safe'],
            [['photo'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'message'=>'Допускаются только файлы png и jpg'],
            [['name'], 'string', 'max' => 250],
            [['country', 'color'], 'string', 'max' => 150],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Изображение',
            'name' => 'Наименование',
            'price' => 'Цена, руб',
            'count' => 'В наличии, шт',
            'country' => 'Страна происхождения',
            'category_id' => 'Категория',
            'color' => 'Цвет',
            'date' => 'Поступило в продажу',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['article_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }



}
