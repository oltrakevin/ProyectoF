<?php
require_once __DIR__ . '/../exceptions/QueryBuilderException.php';

class QueryBuilder{
    /**
     * @var PDO
     */
    private $connection;
    /**
     * @var string
     */
    private $tabla;
    /**
     * @var string
     */
    private $classEntity;

    public function __construct(PDO $connection,string $tabla, string $classEntity){
        $this->connection=$connection;
        $this->tabla=$tabla;
        $this->classEntity=$classEntity;
    }
    /**
     * @return array
     * @throws QueryBuilderException
     */
    public function findAll():array{
        $sql="SELECT * FROM $this->tabla";
        $pdoStatement=$this->connection->prepare($sql);
        if($pdoStatement->execute()===false){
            throw new QueryBuilderException("No se ha podido ejecutar la Query");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);

    }
    /**
     * @param $entity
     * @throws QueryException
     */
    public function save($entity){
        try{
            $parameters=$entity->toArray();
            $sql=sprintf(
                'INSERT INTO %s (%s) VALUES (%s)',
            $this->tabla,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
            );

            $pdoStatement=$this->connection->prepare($sql);
            $pdoStatement->execute($parameters);
        }catch(PDOException $exception){
            throw new QueryBuilderException('Error al insertar ' . $sql);
        }
    }

    /**
     * @param $entity
     * @throws QueryBuilderException
     */
    public function update($entity){
        try{
            $parameters=$entity->toArray();
            $update=[];
            foreach ($parameters as $key=>$valor){
                $update[] = "$key = :$key";
            }
            $sql=sprintf(
              'UPDATE %s SET %s WHERE id=%s',
            //'INSERT INTO users (nombre)value (%s)',
                $this->tabla,
                implode(',', $update),
                $entity->getId()
            );
            $pdoStatement=$this->connection->prepare($sql);
            $pdoStatement->execute($parameters);
        }catch(PDOException $exception){
            throw new QueryBuilderException('Error al modificar ' . $sql);
        }
    }

    /**
     * @param $entity
     * @throws QueryBuilderException
     */
    public function delete($entity){
        try{
            //$parameters=$entity->toArray();
            $sql=sprintf(
                'DELETE FROM %s WHERE id=%s',
                $this->tabla, $entity->getId()
            );
            $pdoStatement=$this->connection->prepare($sql);
            $pdoStatement->execute(/*$parameters*/);
        }catch(PDOException $exception){
            throw new QueryBuilderException('Error al borrar ' . $sql);
        }
    }

    /**
     * @param $id
     * @return array
     * @throws QueryBuilderException
     */


    public function findById($id){
        $sql="SELECT * FROM $this->tabla WHERE id=$id";
        $pdoStatement=$this->connection->prepare($sql);
        if ($pdoStatement->execute()===false)
            throw new QueryBuilderException("No se ha podido ejecutar la query");
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity)[0];
    }

    public function findSearch($search):array{
        if (empty($search)){
            $sql="SELECT * FROM $this->tabla";
        }else {
            $sql = "SELECT * FROM $this->tabla WHERE nombre LIKE '%$search%' OR contacto LIKE '%$search%' OR telefono1 LIKE '%$search%' OR telefono2 LIKE '%$search%' OR email LIKE '%$search%'";
        }
        $pdoStatement=$this->connection->prepare($sql);
        if($pdoStatement->execute()===false){
            throw new QueryBuilderException("No se ha podido ejecutar la Query");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);

    }

    public function getUser($user,$password):array{
        $sql="SELECT * FROM $this->tabla WHERE email='$user' AND password='$password'";
        $pdoStatement=$this->connection->prepare($sql);
        if($pdoStatement->execute()===false){
            throw new QueryBuilderException("No se ha podido ejecutar la Query");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);

    }


}

