<?php
namespace App\Factory;

class ConnectionFactory
{
    private $host = "127.0.0.1";
    private $databaseName = "testdb";
    private $user = 'dbuser';
    private $password = 'dbpass';

    public static function getConnection()
    {
        try {
            $dsn = "mysql:host={$host};dbname={$databaseName};charset=utf8";
            $connection = new \PDO($dsn, $user, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;

        } catch (\PDOException $e) {
            // just for log
            print $e->getMessage();
        }
    }
}
