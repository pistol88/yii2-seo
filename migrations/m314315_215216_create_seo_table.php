<?php

use yii\db\Schema;

class m314315_215216_create_seo_table extends \yii\db\Migration
{
    public function up()
    {
        $this->createTable('{{%seo}}', [
            'id' => 'pk',
            'item_id' => 'int(11)',
            'modelName' => 'VARCHAR(150) NOT NULL',
            'h1' => 'VARCHAR(255) NULL',
            'title' => 'VARCHAR(255) NULL',
            'keywords' => 'VARCHAR(255) NULL',
            'description' => 'VARCHAR(522) NULL',
            'text' => 'TEXT NULL',
            'meta_index' => 'VARCHAR(255) NULL',
            'redirect_301' => 'VARCHAR(522) NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%seo}}');
    }
}
