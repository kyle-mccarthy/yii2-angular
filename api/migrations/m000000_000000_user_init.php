<?php

use yii\db\Schema;
use yii\db\Migration;

class m000000_000000_user_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', array(
            'id' => Schema::TYPE_PK,
            'first_name' => Schema::TYPE_STRING,
            'last_name' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING,
            'password' => Schema::TYPE_STRING,
            'activation_code' => Schema::TYPE_STRING,
            'reset_code' => Schema::TYPE_STRING,
            'status_id' => Schema::TYPE_INTEGER,
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ), $tableOptions);

        $this->createIndex('email', '{{%user}}', ['email', 'status_id']);
        $this->createIndex('auth_key', '{{%user}}', ['auth_key']);

    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
