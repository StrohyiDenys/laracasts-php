<?php
//Файлы, содежащие только класс называют с большой буквы
class Database{
    private $connection;
    public function __construct($config, $username ='root', $password='')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]); //Объект класса ПДО
    }
    public function Query($query, $params = []) //returns an executed query (return type: PDOStatement)
    {
        $statement = $this->connection->prepare($query); //Объект класса ПДОстейтмент
        $statement->execute($params);
        return $statement;
    }
}