<?php

use yii\db\Migration;

/**
 * Class m210127_014145_fix_invoice
 */
class m210127_014145_fix_invoice extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$this->alterColumn('invoice','status',"ENUM('pending','completed','draft') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210127_014145_fix_invoice cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210127_014145_fix_invoice cannot be reverted.\n";

        return false;
    }
    */
}
