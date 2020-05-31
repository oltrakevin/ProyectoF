<?php


class Connection {

    public static function make($config){
        try{
            $connection=new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8")
            );
        }catch (PDOException $PDOException){
            die ($PDOException->getMessage());

        }
        return $connection;

    }



}