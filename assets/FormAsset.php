<?php

namespace liemuar\seo\assets;

use yii\web\AssetBundle;

class FormAsset extends AssetBundle {

    public $depends = [
        'yii\web\JqueryAsset',
    ];
    
    public $js = [
        'js/scripts.js',
    ];

    public $css = [
        'css/styles.css',
    ];
    
    public function init()
    {
        $this->sourcePath = dirname(__DIR__).'/web';
        parent::init();
    }

}
