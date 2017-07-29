<?php

use yii\db\Migration;

class m170729_070217_create_admin_user extends Migration {

    public function up () {

        Yii::$app->db->createCommand()->insert('{{%user}}', [
            'email' => 'admin@eurocart.com',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'created_at' => time(),
            'updated_at' => time()
        ])->execute();
    }

    public function down () {
        echo "m170328_121639_create_admin_user cannot be reverted.\n";
    }
}
