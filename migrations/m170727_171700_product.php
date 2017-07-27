<?php

use yii\db\Migration;

class m170727_171700_product extends Migration {

    // Use up()/down() to run migration code without a transaction.
    public function up () {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey()->unsigned(),
            'parent_id' => $this->integer(11)->unsigned()->notNull()->defaultValue(0),
            'name' => $this->string(255)->notNull(),
            'description' => $this->string(255)->defaultValue('')
        ]);

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey()->unsigned(),
            'category_id' => $this->integer(11)->unsigned()->notNull()->defaultValue(0),
            'name' => $this->string(255)->notNull(),
            'content' => $this->text()->null(),
            'price' => $this->float()->notNull()->defaultValue(0),
            'description' => $this->text()->null()
        ], $tableOptions);

        $this->addForeignKey('FK-category__product', '{{%product}}', 'category_id', '{{%category}}', 'id');
    }

    public function down () {
        $this->dropForeignKey('FK-category__product', '{{%product}}');
        $this->dropTable('{{%product}}');
        $this->dropTable('{{%category}}');
    }
}
