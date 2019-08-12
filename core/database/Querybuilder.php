<?php



class Querybuilder {

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $query = $this->pdo->prepare("select * from {$table}");
        $query->execute();
        return $query->FetchAll(PDO::FETCH_OBJ);
    }

    public function selectWhere($table,$id)
    {
        $query = $this->pdo->prepare("select * from {$table} where id={$id}");
        $query->execute();
        return $query->FetchAll(PDO::FETCH_OBJ);
    }

    public function deleteWhere($table,$id)
    {
        $sql = "DELETE FROM {$table} where id={$id}";
        try 
        {
            $query = $this->pdo->prepare($sql);
            $query->execute();
        }
        catch(Exception $e)
        {
            echo 'whoops,something went wrong!delete';   
            die();
        }    
    }

    public function insert($table,$parameters)
    {
        $param = implode(',',array_keys($parameters));
        $values = ':'.implode(', :',array_keys($parameters));
        $sql = "insert into {$table} ({$param}) values ({$values})";
        try 
        {
            $query = $this->pdo->prepare($sql);
            $query->execute($parameters);
            $last_id = $this->pdo->lastInsertId();
            return $last_id;
        }
        catch(Exception $e)
        {
            echo 'whoops,something went wrong!';
            die();
        }    
    }

    public function update($table,$parameters,$id)
    {
        foreach ($parameters as $key => $value) {
            $sql = "update {$table} set {$key}=? where id={$id}";
            try 
            {
                $query = $this->pdo->prepare($sql);
                $query->execute(array($value));
            }
            catch(Exception $e)
            {
                echo 'whoops,something went wrong!';
                die();
            }    
        }
    }
}