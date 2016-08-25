<?php 

class Database {

    var $host="localhost:666";
    var $username="root";    
    Var $password="root";
    var $database="srb_db";
    var $fr_query;
    var $row= array() ;


public function connect() 
{
    $conn= mysql_connect($this->host,$this->username,$this->password);
    if(! $conn )
    {
    die('Could not connect: ' . mysql_error());
    }
}

public function db() 
{
    $conn_db = mysql_select_db($this->database);
    if(! $conn_db )
    {
        echo 'Could Not Connect the Database';
    }
}

public function insert($sql)
{
 $run = mysql_query($sql) ;

}

public function fetchRow($fr) 
{
        $run = mysql_query($fr) ;
        $row = mysql_fetch_array($run);
        $movie = $row['tytul']." ". $row['id'];
        return $movie;
}
function fetchAll($fr_query) 
{
       $run = mysql_query($fr_query);

       $data = array() ; 
       while($row = mysql_fetch_array($run)){
       $data[] = $row ; 
       } 
       return $data;   
}
}
?>