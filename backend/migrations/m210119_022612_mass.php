<?php

use yii\db\Schema;
use yii\db\Migration;

class m210119_022612_mass extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
$connection=Yii::$app->db;
$transaction=$connection->beginTransaction();
try{
 $this->createTable('{{%food}}',
        [
                'id'=> Schema::TYPE_PK.'',
                'name'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'menu_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'price'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'image'=> Schema::TYPE_TEXT.' NOT NULL',
                'description'=> Schema::TYPE_TEXT.' NOT NULL',
                ], $tableOptions);

                          $this->createIndex('menu_id', '{{%food}}','menu_id',0);
                           $this->addForeignKey('fk_food_menu_id', '{{%food}}', 'menu_id', 'menu', 'id');
            $transaction->commit();
} catch (Exception $e) {
echo 'Catch Exception '.$e->getMessage().' and rollBack this';
    $transaction->rollBack();
}
    }

    public function safeDown()
    {
$connection=Yii::$app->db;
$transaction=$connection->beginTransaction();
try{
                        $this->dropForeignKey('fk_food_menu_id', '{{%food}}');
                $this->dropTable('{{%food}}');
$transaction->commit();
} catch (Exception $e) {
echo 'Catch Exception '.$e->getMessage().' and rollBack this';
$transaction->rollBack();
}
    }
}
