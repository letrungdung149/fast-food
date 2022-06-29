<?php

use yii\db\Schema;
use yii\db\Migration;

class m210119_022811_invoce extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%invoce}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'fullname'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'address'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'phone'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'total'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'token'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'status'=> "enum('pending','completed')".' NOT NULL',
                'created_at'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'notify'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                ],
            $tableOptions
        );
    
    }

    public function safeDown()
    {
        $this->dropTable('{{%invoce}}');
    }
}
