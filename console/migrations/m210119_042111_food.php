<?php

use yii\db\Schema;
use yii\db\Migration;

class m210119_042111_food extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%food}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'name'=> Schema::TYPE_STRING.'(255)',
                'menu_id'=> Schema::TYPE_INTEGER.'(11)',
                'price'=> Schema::TYPE_INTEGER.'(11)',
                'image'=> Schema::TYPE_TEXT.'',
                'description'=> Schema::TYPE_TEXT.'',
                ],
            $tableOptions
        );

        $this->createIndex('menu_id', '{{%food}}','menu_id',0);    
    }

    public function safeDown()
    {
        $this->dropIndex('menu_id', '{{%food}}');
        $this->dropTable('{{%food}}');
    }
}
