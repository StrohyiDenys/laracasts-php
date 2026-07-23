<?php
class Database{
    private $connection;
    private $statement;
    public function __construct($config, $username ='root', $password='')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]); //Объект класса ПДО
    }
    public function Query($query, $params = []) //returns an executed query (return type: PDOStatement)
    {
        $this->statement = $this->connection->prepare($query); //Объект класса ПДОстейтмент
        $this->statement->execute($params);
        return $this;
    }
    public function find(){
        if (isset($this->statement)){
            return $this->statement->fetch();
        }
        else return null;
    }
    public function findOrAbort(){
        if (!isset($this->statement)){
            return null;
        }
        $result = $this->find();
        if (!$result){
            abort(Response::NOT_FOUND);
        }
        return $result;
    }
    public function findAll(){
    if (isset($this->statement)){
        return $this->statement->fetchAll();
    }
    else return null;
    }

}