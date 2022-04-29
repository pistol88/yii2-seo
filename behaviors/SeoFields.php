<?php
namespace pistol88\seo\behaviors;

use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;
use yii\helpers\ArrayHelper;
use pistol88\seo\models\Seo;

class SeoFields extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'updateFields',
            ActiveRecord::EVENT_AFTER_UPDATE => 'updateFields',
            ActiveRecord::EVENT_AFTER_DELETE => 'deleteFields',
        ];
    }

    public function updateFields($event)
    {
        $post = Yii::$app->request->post();
        
        if (($model = Seo::findOne(['item_id' => $this->owner->iId, 'modelName' => $this->owner->className() ])) === null) {
            $model = new Seo;
        }
        $post['Seo']['item_id'] = $this->owner->iId;
        
        $model->load($post);
        $model->save();
    }
    
    public function deleteFields($event)
    {
        if($this->owner->seo) {
            $this->owner->seo->delete();
        }
        
        return true;
    }
    
    public function getSeo()
    {
        if($model = Seo::find()->where(['item_id' => $this->owner->iId, 'modelName' => $this->owner->className()])->one()) {
            return $model;
        } else {
            return new Seo;
        }
    }
}
