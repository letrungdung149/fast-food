<?php

use yii\db\Schema;
use yii\db\Migration;

class m210119_042112_Relations extends Migration
{
    public function safeUp()
    {
                    $this->addForeignKey('fk_food_menu_id', '{{%food}}', 'menu_id', 'menu', 'id');
                }

    public function safeDown()
    {

               $this->dropForeignKey('fk_food_menu_id', '{{%food}}');
            
    }
}
