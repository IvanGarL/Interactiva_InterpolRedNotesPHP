<?php
include 'logic.php';

$conn = conectarseDB();

$queryUserId = 'SELECT id, passwd FROM usuarios WHERE username =\''.$_POST['user'].'\'';
$result = pg_query($queryUserId) or die('Query failed: ' . pg_last_error());
$numRows = pg_num_rows($result);

$data = array();

    if($numRows > 0){
        $row = pg_fetch_row($result);
        $user_id = $row[0];
        $psswd = $row[1];
        
        $i = 0;

        if(md5($_POST['password']) == $psswd){
            $queryUserUpdate = 'UPDATE usuarios SET ';  

            if(isset($_POST['username']) && $_POST['username'] != ""){
                $queryUserUpdate .= "username = '".$_POST['username']."'";
                
                session_start();
                $_SESSION['usuarioex'] = $_POST['username'];
                $i++;
            }

            if(isset($_POST['email']) && $_POST['email'] != "" && $i > 0){
                $queryUserUpdate .= ", email = '".$_POST['email']."'";
            }
            else{
                $queryUserUpdate .= "email = '".$_POST['email']."'";
                $i++;
            }

            if(isset($_POST['new_password']) && $_POST['new_password'] != ""  && $i > 0){
                $queryUserUpdate .= ", passwd = '".md5($_POST['new_password'])."'";
            }
            else{
                $queryUserUpdate .= "passwd = '".md5($_POST['new_password'])."'";
                $i++;
            }

            $queryUserUpdate.=' WHERE id =\''.$user_id.'\'';

            $result = pg_query($queryUserUpdate) or die('Query failed: ' . pg_last_error());
        }
        else{
            echo  '<span class="badge badge-danger"><i class="fa fa-times "></i>No se pudo</span>';
        }
    }
    else{
        echo  '<span class="badge badge-danger"><i class="fa fa-times "></i>No se pudo</span>';
    }

    pg_free_result($result);
    pg_close($conn);  

    header("Location: ./updateAccount.php");

?>