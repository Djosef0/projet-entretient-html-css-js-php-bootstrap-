<?php 
// connection ala base 

function returnConn(){
    $server="localhost";
    $user="root";
    $pass="";
    $database="gest";
    $conn=mysqli_connect($server,$user,$pass,$database);
    return $conn;
}
// fonction d' inseretion 
function insert($table_name,array $fields,array $values){
    $sql = "INSERT INTO ".$table_name;
    $fields_str = '(';
    foreach($fields as $field){
        $fields_str.=$field.',';
    }
    $fields_str = rtrim($fields_str,',');
    $fields_str .= ')';
    $sql .= ' '.$fields_str;
   
    $sql .= ' VALUES ';
    $values_str = '(';

    foreach($values as $value){
        $values_str.="'" . $value."',";
    }
    $values_str=rtrim($values_str,',');
    $values_str .= ')';
    $sql .= ' '.$values_str;
    return $sql;
}
//fonction affiche tous les elements
function affiche_pour_tester($conn){
$query="select * from entre";
$result=mysqli_query($conn,$query);
return $result;
}
// fonction affiche le tableau 
 function liste($table_name,array $colname,$conn){
   $sql="SELECT * FROM ".$table_name;
   $result=mysqli_query($conn,$sql);
  
if($result>0){

   $fields_str="<table>";
   $fields_str.="<?php ";
   for($i=0;$i<$result;$i++){
    for($j=0;$j<$result;$j++){
   $fields_str.="<tr>";
   $fields_str.="<td>";
   $fields_str="<?php ";
   $fields_str.="echo ";
   $fields_str.="'".$colname."'";
   $fields_str=" ?>";
   $fields_str.="</td>";
   $fields_str.="</tr>";
                }    
           }
$fields_str.="</table>";
}
 }
 
 

 
 // fonction update 
 function update($table, $id, array $values){
    $set = '';
    $x = 1;

    foreach($values as $value => $value) {
        $set .= "{$values} = \"{$value}\"";
        if($x < count($values)) {
            $set .= ',';
        }
        $x++;
    }

    $query = "UPDATE {$table} SET {$set} WHERE id = {$id}";
return $query;
 }


?>