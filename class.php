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

function wyloguj(){
  session_start();
session_destroy();  
header("Location: index.php");
}
function zarejestruj($login,$password){
  $query = "INSERT INTO `klienci` (login, password) VALUES ('$login', '$password')";
        $result = mysql_query($query);
        if($result){
            echo $msg = "Konto zostało utworzone.";
        }
}

function pokaz_rezerwacje(){
  $sql = "SELECT R.id as rezID, K.login as klient, F.tytul as tytul, S.data as data, R.numer as miejsce FROM rezerwacje as R JOIN seans as S ON R.id_seans = S.id JOIN klienci as K ON R.id_klient = K.id JOIN filmy as F ON S.id_film = F.id";
$result = mysql_query($sql);

  echo "<table>
  <tr>
    <th>Tytul</th>
    <th>Klient</th>
    <th>Miejsce</th>
    <th>Data</th>
  </tr>";
    while($row = mysql_fetch_array($result)) {
        echo "<tr>
        <td>".$row['tytul']."</td>
        <td>".$row['klient']."</td>
        <td>".$row['miejsce']."</td>
        <td>".$row['data']."</td>
        <td><a href='?rezID=".$row['rezID']."'>[edytuj]</a></td>
        </tr>";
    }
    echo "</table>";
}

function pokaz_filmy(){
  $sql = "SELECT filmy.id as filmID, tytul, rezyser, gatunek.nazwa as gatunek FROM filmy JOIN gatunek ON filmy.gatunek = gatunek.id";
$result = mysql_query($sql);

  echo "<table>
  <tr>
    <th>Tytul</th>
    <th>Reżyser</th>
    <th>Gatunek</th>
    <th><a  class='opener btn'>Dodaj film</a></th>
  </tr>";
    while($row = mysql_fetch_array($result)) {
        echo "<tr>
        <td>".$row['tytul']."</td>
        <td>".$row['rezyser']."</td>
        <td>".$row['gatunek']."</td>
        <td><a href='?filmid=".$row['filmID']."'>[edytuj]</a></td>
        </tr>";
    }
    echo "</table>";
}

 
?>