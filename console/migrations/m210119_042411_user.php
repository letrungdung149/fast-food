<?php

use yii\db\Schema;
use yii\db\Migration;

class m210119_042411_user extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%user}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'username'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'auth_key'=> Schema::TYPE_STRING.'(32) NOT NULL',
                'password_hash'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'password_reset_token'=> Schema::TYPE_STRING.'(255)',
                'email'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'status'=> Schema::TYPE_SMALLINT.'(6) NOT NULL DEFAULT "10"',
                'created_at'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'updated_at'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'verification_token'=> Schema::TYPE_STRING.'(255)',
                ],
            $tableOptions
        );

        $this->createIndex('username', '{{%user}}','username',1);
        $this->createIndex('email', '{{%user}}','email',1);
        $this->createIndex('password_reset_token', '{{%user}}','password_reset_token',1);    $this->insert('{{%user}}',['id'=>'1','username'=>'nui','auth_key'=>'SXsqyVpN8HoelHQisnhcvOFPVLM1lp8F','password_hash'=>'$2y$13$G3Y1UkVhU0jn6LBhJsICG.UWuAtdSTflpwlJtxriHIU7cnzVFgUum','password_reset_token'=>'','email'=>'sadas@gmail.com','status'=>'9','created_at'=>'1610961982','updated_at'=>'1610961982','verification_token'=>'NH5HPK5Kidcw1tqxzzMPfPGMe7jjDZCI_1610961982']);

    }

    public function safeDown()
    {
        $this->dropIndex('username', '{{%user}}');
        $this->dropIndex('email', '{{%user}}');
        $this->dropIndex('password_reset_token', '{{%user}}');
        $this->dropTable('{{%user}}');
    }
}
