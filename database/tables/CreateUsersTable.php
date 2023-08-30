<?php 

use SQL\ConnectDB;
use SQL\SchemaBuilder;

class CreateUsersTable extends ConnectDB {
    public function up() {
        $schemaBuilder = new SchemaBuilder(ConnectDB::$conn); 
        $schemaBuilder->table('users_authentications')
            ->primaryKey()->autoIncrement()->notNullable()
            ->string('name')->nullable()
            ->string('phone', 100)->nullable()
            ->string('email', 255)->unique()->nullable()
            ->string('email_verify_token', 100)->nullable()
            ->datetime('email_verified_at')->nullable()
            ->string('password')->notNullable()
            ->string('password_reset_token', 100)->nullable()
            ->string('profile_photo_path', 1000)->nullable()
            ->string('account_role', 20)->default('Admin')
            ->integer('access_enabled')->default(1) 
            ->build();
    }

    public function down() {
        ConnectDB::$conn->exec("DROP TABLE IF EXISTS users");
    }
}