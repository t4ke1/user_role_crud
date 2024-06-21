<?php

namespace App\Migration;


class Migration {
    static public function createTableUsers(): string
    {
        return "CREATE TABLE users (
    id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(20) unique,
    created_at timestamp default CURRENT_TIMESTAMP,
    updated_at timestamp default CURRENT_TIMESTAMP
    )";
    }
    static public function createTableAvailableRoles(): string
    {
        return "CREATE TABLE available_role ( 
    id int AUTO_INCREMENT PRIMARY KEY,
    role varchar(35) unique,
    created_at timestamp default CURRENT_TIMESTAMP,
    updated_at timestamp default CURRENT_TIMESTAMP)";
    }

    static public function createTableUserRole(): string
    {
        return "CREATE TABLE user_role (
    user_id int, FOREIGN KEY (user_id) REFERENCES users(id),
    role_id int, FOREIGN KEY (role_id) REFERENCES available_role(id),
    created_at timestamp default CURRENT_TIMESTAMP,
    updated_at timestamp default CURRENT_TIMESTAMP
    )";
    }
}
