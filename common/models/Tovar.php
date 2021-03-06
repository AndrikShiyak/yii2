<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tovar".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property int $count
 * @property string|null $urlImages
 * @property int $category_id
 * @property int $subcategory_id
 * @property int|null $discount_id
 *
 * @property Category $category
 * @property Discount $discount
 * @property Subcategory $subcategory
 */
class Tovar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tovar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price', 'count', 'category_id', 'subcategory_id'], 'required'],
            [['description', 'urlImages'], 'string'],
            [['price'], 'number'],
            [['count', 'category_id', 'subcategory_id', 'discount_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['discount_id'], 'exist', 'skipOnError' => true, 'targetClass' => Discount::className(), 'targetAttribute' => ['discount_id' => 'id']],
            [['subcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategory::className(), 'targetAttribute' => ['subcategory_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'count' => 'Count',
            'urlImages' => 'Url Images',
            'category_id' => 'Category ID',
            'subcategory_id' => 'Subcategory ID',
            'discount_id' => 'Discount ID',
        ];
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

    /**
     * Gets query for [[Discount]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscount()
    {
        return $this->hasOne(Discount::className(), ['id' => 'discount_id']);
    }

    /**
     * Gets query for [[Subcategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategory()
    {
        return $this->hasOne(Subcategory::className(), ['id' => 'subcategory_id']);
    }
}
