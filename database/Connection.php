<?php


class Connection {

    public static function make($config){
        try{
            $connection=new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password']
            );
        }catch (PDOException $PDOException){
            die ($PDOException->getMessage());

        }
        return $connection;

    }



}