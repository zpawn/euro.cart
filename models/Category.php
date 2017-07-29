<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $description
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    public function getCategory () {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }
}
