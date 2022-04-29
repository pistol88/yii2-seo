<?php
namespace liemuar\seo\models;

use Yii;

/**
 * This is the model class for table "seo_fields".
 *
 * @property integer $id
 * @property integer $item_id
 * @property string $modelName
 * @property string $h1
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $seo_text
 * @property string $meta_index
 * @property string $redirect_301
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%seo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id'], 'integer'],
            [['text'], 'string'],
            [['modelName'], 'string', 'max' => 150],
            [['h1', 'title', 'keywords', 'meta_index'], 'string', 'max' => 255],
            [['description', 'redirect_301'], 'string', 'max' => 522]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'modelName' => 'Model Name',
            'h1' => 'H1',
            'title' => 'Seo Title',
            'keywords' => 'Seo Keywords',
            'description' => 'Seo Description',
            'text' => 'Seo Text',
            'meta_index' => 'Meta Index',
            'redirect_301' => 'Redirect 301',
        ];
    }
}
