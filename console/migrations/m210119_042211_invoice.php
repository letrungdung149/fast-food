<?php

use yii\db\Schema;
use yii\db\Migration;

class m210119_042211_invoice extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%invoice}}',
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
    $this->insert('{{%invoice}}',['id'=>'1','fullname'=>'nui le le dũng','address'=>'Hoàng Liêt - Hoàng Mai','phone'=>'395621948','total'=>'ass','token'=>'asas','status'=>'pending','created_at'=>'1','notify'=>'1']);

    }

    public function safeDown()
    {
        $this->dropTable('{{%invoice}}');
    }
}
