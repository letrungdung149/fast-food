<?php

use yii\db\Schema;
use yii\db\Migration;

class m210119_042311_invoice_food extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%invoice_food}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'invoice_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'food_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'quantity'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                ],
            $tableOptions
        );

        $this->createIndex('invoice_id', '{{%invoice_food}}','invoice_id',0);
        $this->createIndex('food_id', '{{%invoice_food}}','food_id',0);    
    }

    public function safeDown()
    {
        $this->dropIndex('invoice_id', '{{%invoice_food}}');
        $this->dropIndex('food_id', '{{%invoice_food}}');
        $this->dropTable('{{%invoice_food}}');
    }
}
