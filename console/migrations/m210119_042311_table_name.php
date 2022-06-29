<?php

use yii\db\Schema;
use yii\db\Migration;

class m210119_042311_table_name extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%table_name}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'room_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'name'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'type'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'price'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'description'=> Schema::TYPE_TEXT.' NOT NULL',
                'image'=> Schema::TYPE_TEXT.' NOT NULL',
                ],
            $tableOptions
        );

        $this->createIndex('room_id', '{{%table_name}}','room_id',0);    
    }

    public function safeDown()
    {
        $this->dropIndex('room_id', '{{%table_name}}');
        $this->dropTable('{{%table_name}}');
    }
}
