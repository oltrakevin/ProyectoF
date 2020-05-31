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

    public function updateEmpresa($entity){
        try{
            $parameters=$entity->toArray();
            $update=[];
            foreach ($parameters as $key=>$valor){
                $update[] = "$key = :$key";
            }
            $sql=sprintf(
                'UPDATE %s SET %s WHERE cif="%s"',
                //'INSERT INTO users (nombre)value (%s)',
                $this->tabla,
                implode(',', $update),
                $entity->getCif()
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
     * @param $entity
     * @throws QueryBuilderException
     */
    public function deleteEmpresa($entity){
        try{
            //$parameters=$entity->toArray();
            $sql=sprintf(
                'DELETE FROM %s WHERE cif="%s"',
                $this->tabla, $entity->getCif()
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
    public function findByCif($cif){
        $sql="SELECT * FROM $this->tabla WHERE cif='$cif'";
        $pdoStatement=$this->connection->prepare($sql);
        if ($pdoStatement->execute()===false)
            throw new QueryBuilderException("No se ha podido ejecutar la query");
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity)[0];
    }
    public function findAllByCif($cif){
        $sql="SELECT * FROM $this->tabla WHERE cif='$cif'";
        $pdoStatement=$this->connection->prepare($sql);
        if ($pdoStatement->execute()===false)
            throw new QueryBuilderException("No se ha podido ejecutar la query");
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    public function findSearch($search):array{
        switch ($this->classEntity){
            case 'Contacto':
                if (empty($search)){
                    $sql="SELECT * FROM $this->tabla ORDER BY id DESC";

                }else {
                    $sql = "SELECT * FROM $this->tabla WHERE nombre LIKE '%$search%' OR localidad LIKE '%$search%' OR cp LIKE '%$search%' OR email LIKE '%$search%' ORDER BY id DESC";
                }
                break;
            case 'Empresa':
                if (empty($search)){
                    $sql="SELECT * FROM $this->tabla ORDER BY cif DESC";

                }else {
                    $sql = "SELECT * FROM $this->tabla WHERE nombre LIKE '%$search%' OR cif LIKE '%$search%' OR localidad LIKE '%$search%' OR cp LIKE '%$search%' OR email LIKE '%$search%' ORDER BY cif DESC";
                }
                break;
            case 'Plantilla':
                if (empty($search)){
                    $sql="SELECT * FROM $this->tabla ORDER BY id DESC";

                }else {
                    $sql = "SELECT * FROM $this->tabla WHERE nombre LIKE '%$search%' OR contenido LIKE '%$search%' ORDER BY id DESC";
                }
                break;
            case 'EmpresaCiclo':
                //$search es un array primer elemento Cif segundo elemento id
                $sql = "SELECT * FROM $this->tabla WHERE cif = '$search[0]' AND id = '$search[1]'";
                break;

            default:
                if (empty($search)){
                    $sql="SELECT * FROM $this->tabla";

                }else {
                    $sql = "SELECT * FROM $this->tabla WHERE nombre LIKE '%$search%' OR localidad LIKE '%$search%' OR cp LIKE '%$search%' OR email LIKE '%$search%'";
                }
                break;
        }
        $pdoStatement=$this->connection->prepare($sql);
        if($pdoStatement->execute()===false){
            throw new QueryBuilderException("No se ha podido ejecutar la Query");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);

    }

    public function getUser($user):array{
        $sql="SELECT * FROM $this->tabla WHERE email='$user' ";
        $pdoStatement=$this->connection->prepare($sql);
        if($pdoStatement->execute()===false){
            throw new QueryBuilderException("No se ha podido ejecutar la Query");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);

    }

    public function getUserExist($user):array{
        $sql="SELECT * FROM $this->tabla WHERE email='$user'";
        $pdoStatement=$this->connection->prepare($sql);
        if($pdoStatement->execute()===false){
            throw new QueryBuilderException("No se ha podido ejecutar la Query");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);

    }


    public function injectSQL($sql){
        try{
            $pdoStatement=$this->connection->prepare($sql);
            if($pdoStatement->execute()===false){
                throw new QueryBuilderException("No se ha podido inyectar la Query");
            }
        }catch(PDOException $exception){
            throw new QueryBuilderException('Error al inyectar ' . $sql);
        }
    }

    public function injectSQLObject($sql,$class) : array {
        try{
            $pdoStatement=$this->connection->prepare(trim(htmlspecialchars($sql)));
            if($pdoStatement->execute()===false){
                throw new QueryBuilderException("No se ha podido inyectar la Query");
            }
            return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        }catch(PDOException $exception){
            throw new QueryBuilderException('Error al inyectar ' . $sql);
        }
        return NULL;
    }

}

