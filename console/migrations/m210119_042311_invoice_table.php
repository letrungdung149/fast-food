<?php

use yii\db\Schema;
use yii\db\Migration;

class m210119_042311_invoice_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%invoice_table}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'invoice_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'table_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'price'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'fromTime'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'toTime'=> Schema::TYPE_STRING.'(255) NOT NULL',
                ],
            $tableOptions
        );

        $this->createIndex('invoice_id', '{{%invoice_table}}','invoice_id',0);
        $this->createIndex('table_id', '{{%invoice_table}}','table_id',0);    
    }

    public function safeDown()
    {
        $this->dropIndex('invoice_id', '{{%invoice_table}}');
        $this->dropIndex('table_id', '{{%invoice_table}}');
        $this->dropTable('{{%invoice_table}}');
    }
}
