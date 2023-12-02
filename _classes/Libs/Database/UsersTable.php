<?php

namespace Libs\Database;

use PDOException;

class UsersTable
{
    private $db;

    public function __construct(MYSQL $mysql)
    {
        $this->db = $mysql->connect();
    }

    public function getAll()
    {
        try {
            $statement = $this->db->query(
                "SELECT users.*, roles.name AS role
                FROM users 
                LEFT JOIN roles
                ON users.role_id = roles.id"
            );
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function uploadPhoto($id, $photo)
    {
        $statement = $this->db->prepare(
            "UPDATE users 
            SET
            photo=:photo
            WHERE 
            id=:id"
        );

        $statement->execute([
            "id" => $id,
            "photo" => $photo,
        ]);

        return $statement->rowCount();
    }

    public function findByEmailAndPassword($email, $password)
    {
        try {
            $statement = $this->db->prepare(
                "SELECT * FROM users 
                WHERE 
                email=:email 
                AND 
                password=:password"
            );

            $statement->execute([
                "email" => $email,
                "password" => $password,
            ]);

            $user = $statement->fetch();
            return $user ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert($data)
    {
        try {

            $statement = $this->db->prepare(
                "INSERT INTO users 
                (name,email,phone,address,password,created_at) 
                VALUES 
                (:name,:email,:phone,:address,:password,NOW())"
            );

            $statement->execute($data);

            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function destroy($id)
    {
        try {
            $statement = $this->db->prepare("DELETE FROM users WHERE id=:id");
            $statement->execute(['id' => $id]);

            return $statement->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function suspend($id)
    {
        try {
            $statement = $this->db->prepare("UPDATE users SET suspended=1 WHERE id=:id");
            $statement->execute(['id' => $id]);

            return $statement->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function unsuspend($id)
    {
        try {
            $statement = $this->db->prepare("UPDATE users SET suspended=0 WHERE id=:id");
            $statement->execute(['id' => $id]);

            return $statement->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
