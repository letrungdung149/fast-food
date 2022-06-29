<?php

use yii\db\Schema;
use yii\db\Migration;

class m210119_042311_room extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%room}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'name'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'type'=> Schema::TYPE_STRING.'(255) NOT NULL',
                ],
            $tableOptions
        );
    
    }

    public function safeDown()
    {
        $this->dropTable('{{%room}}');
    }
}
