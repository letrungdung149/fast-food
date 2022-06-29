<?php

use yii\db\Schema;
use yii\db\Migration;

class m210119_042311_menu extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%menu}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'name'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'order_food'=> Schema::TYPE_STRING.'(255) NOT NULL',
                ],
            $tableOptions
        );
    $this->insert('{{%menu}}',['id'=>'1','name'=>'2','order_food'=>'2']);

    }

    public function safeDown()
    {
        $this->dropTable('{{%menu}}');
    }
}
