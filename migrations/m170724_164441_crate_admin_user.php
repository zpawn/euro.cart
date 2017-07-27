<?php

use yii\db\Migration;

class m170724_164441_crate_admin_user extends Migration
{
    public function up () {
        Yii::$app->db->createCommand()->insert('{{%user}}', [
            'email' => 'admin@eurocart.com',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'created_at' => time(),
            'updated_at' => time()
        ])->execute();
        echo "==> created admin user\n";
    }

    public function down () {
        echo "m170328_121639_create_admin_user cannot be reverted.\n";
    }
}
