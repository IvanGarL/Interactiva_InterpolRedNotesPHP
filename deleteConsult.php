<?php
include_once 'logic.php';

if(isset($_POST['id']) && $_POST['id'] != ""){
    deleteSearch();
}
else{
    die("Solicitud no válida.");
}

function deleteSearch(){
    $conn = conectarseDB();

    $queryDelete = 'DELETE FROM consultas WHERE id =\''.$_POST['id'].'\'';
    $result = pg_query($queryDelete) or die('Query failed: ' . pg_last_error());
    $numRows = pg_affected_rows($result);

    $jsondata = array();

    if($numRows > 0){
        $jsondata['success'] = true;
    }
    else{
        $jsondata['success'] = false;
    }	
    
    pg_free_result($result);
    pg_close($conn);  
    
    echo json_encode($jsondata);
}

exit();

?>
