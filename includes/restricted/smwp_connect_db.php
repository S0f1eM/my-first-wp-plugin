<?php  
try
{
   $connection = new PDO('mysqlhost; dbname=''; charset='', '', '!'); 
   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}  

catch(PDOException $e)

{
 if ($verbose) {
       echo 'Erreur : '.$e->getMessage();

}
  
}

?>

