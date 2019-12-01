<?php
include 'logic.php';

if(isset($_POST['username']) && $_POST['username'] != ""
&& isset($_POST['total']) && $_POST['total'] != ""
){
    postSearch();
}
else{
    die("Solicitud no válida.");
}

function postSearch(){
    $conn = conectarseDB();

    $queryUserId = 'SELECT id FROM usuarios WHERE username =\''.$_POST['username'].'\'';
    $result = pg_query($queryUserId) or die('Query failed: ' . pg_last_error());
    $numRows = pg_num_rows($result);

    $jsondata = array();

    if($numRows > 0){
        $row = pg_fetch_row($result);
        $user_id = $row[0];
        
        $name = $_POST['name'];
        $forename = $_POST['forename'];
        $country = $_POST['nationality'];
        $sex = $_POST['sexId'];
        $ageMin = $_POST['ageMin'];
        $ageMax = $_POST['ageMax'];
        $total = $_POST['total'];

        if($name != "" || $forename != "" || $country != "" || $sex != "" || $ageMin != "" 
        || $ageMax != ""){
            $type = 'FILTRADO';

            $queryInsert = "INSERT INTO consultas (categoria, pais, sexo, nombre, apellido, edadmin, edadmax, total, usuario_id) 
            values ('".$type."',".getParams($name, $forename, $country, $sex, $ageMin, $ageMax).$total.", ".$user_id.")";
             
            echo $queryInsert;
        }
        else {
            $type = "TODOS";
            $queryInsert = "INSERT INTO consultas (categoria, pais, sexo, nombre, apellido, edadmin, edadmax, total, usuario_id) 
            values ('".$type."', null, null, null, null, null, null, ".$total.", ".$user_id.")";
            
            echo $queryInsert;
        }
        
        $result = pg_query($queryInsert) or die('Query failed: ' . pg_last_error());
        $numRows = pg_affected_rows($result);

        if($numRows > 0){
            $jsondata['success'] = true;
        }
        else{
            $jsondata['success'] = false;
        }
    }	
    
    pg_free_result($result);
    pg_close($conn);  
    
    echo json_encode($jsondata);
}

exit();

?>