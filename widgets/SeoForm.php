<?php
namespace pistol88\seo\widgets;

use pistol88\seo\models\Seo;
use yii\helpers\Html;
use yii\helpers\Url;
use Yii;

class SeoForm extends \yii\base\Widget
{
    public $model = null;
    public $modelName = null;
    public $form = null;
    public $title = 'SEO';
    
    public function init()
    {
        if(empty($this->modelName)) {
            $this->modelName = $this->model->className();
        }
        
        \pistol88\seo\assets\FormAsset::register($this->getView());
        
        parent::init();
    }

    public function run()
    {
        if (!$this->model->isNewRecord) {
            if (($this->model = Seo::findOne(['item_id' => $this->model->id, 'modelName' => $this->modelName])) === null) {
                $this->model = new Seo;
            }
        } else {
            $this->model = new Seo;
        }

        $content = [];

        $content[] = $this->form->field($this->model, 'modelName')->hiddenInput(['value' => $this->modelName])->label(false);
        
        $content[] = $this->form->field($this->model, 'title')->textInput(['maxlength' => true]);
        $content[] = $this->form->field($this->model, 'description')->textInput(['maxlength' => true]);
        $content[] = $this->form->field($this->model, 'keywords')->textInput(['maxlength' => true]);
        $content[] = $this->form->field($this->model, 'h1')->textInput(['maxlength' => true]);
        $content[] = $this->form->field($this->model, 'text')->textarea(['rows' => 6]);
        $content[] = $this->form->field($this->model, 'meta_index')->textInput(['maxlength' => true]);
        $content[] = $this->form->field($this->model, 'redirect_301')->textInput(['maxlength' => true]);
        
        $title = Html::a($this->title, '#seo-body', ['class' => 'toggle']);
        $heading = Html::tag('div', $title, ['class' => 'panel-heading']);
        $body = Html::tag('div', implode('', $content), ['class' => 'panel-body', 'id' => 'seo-body', 'style' => 'display:none;']);
        
        $view = Html::tag('div', $heading . $body, ['class' => 'panel panel-default pistol88-seo']);
        
        return $view;
    }
}
