<?php

function autenticar($login, $clave){
    //TODO: complete auth with JWT
    return true;
}

function conectarseDB() {
	$conx = pg_connect("host=localhost port=5432  user=postgres dbname=interpol password=admin")
		or die ( 'No se puede conectar al servidor.' ); 
	return $conx;
}

function getParams($name, $forename, $country, $sex, $ageMin, $ageMax){

	$query = "";
	//1
	if($country != ""){
		$query.= ("'".$country."', ");
	}
	else{
		$query.= ("null, ");
	}

	//2.
	if($sex != ""){
		$query.= ("'".$sex."', ");
	}
	else{
		$query.= ("null, ");
	}

	//3.
	if($name != ""){
		$query.= ("'".$name."', ");
	}
	else{
		$query.= ("null, ");
	}

	//4.
	if($forename != ""){
		$query.= ("'".$forename."', ");
	}
	else{
		$query.= ("null, ");
	}

	//5.
	if($ageMin != ""){
		$query.= ($ageMin.", ");
	}
	else{
		$query.= ("null, ");
	}

	//6.
	if($ageMax != ""){
		$query.= ($ageMax.", ");
	}
	else{
		$query.= ("null, ");
	}

	return $query;
}

function getUserData(){
	$conn = conectarseDB();

    $queryUser = 'SELECT * FROM usuarios WHERE username =\''.$_SESSION['usuarioex'].'\'';
    $result = pg_query($queryUser) or die('Query failed: ' . pg_last_error());
	$numRows = pg_num_rows($result);

	$data = array();
	
    if($numRows > 0){
        $row = pg_fetch_row($result);
		$data['username'] = $row[1];
		$data['email'] = $row[2];
	}

	pg_free_result($result);
	pg_close($conn);  
	
	return $data;
}

function printQuerysTable($username){

	$dbconn =  conectarseDB();

	$queryUserId = 'SELECT id FROM usuarios WHERE username =\''.$username.'\'';
	$result = pg_query($queryUserId) or die('Query failed: ' . pg_last_error());
	$numRows = pg_num_rows($result);

    if($numRows > 0){
        $row = pg_fetch_row($result);
		$user_id = $row[0];
		
		$query = 'SELECT * FROM consultas WHERE usuario_id ='.$user_id;
		
		$result = pg_query($query) or die('Query failed: ' . pg_last_error());
		
		$numRows = pg_num_rows($result);
		$i = 0;
		
		echo '<div class="col-md-12" style="margin-top:14px">'.
			'<table class="table table-striped">'.
			'<thead class="thead-dark">
				<tr>
				<th>ID</th>
				<th>Categoría</th>
				<th>Pais</th>
				<th>Sexo</th>
				<th>Nombre</th>
				<th>Intervalo edad</th>
				<th>No. resultados</th>
				<th> Eliminar</th>
				</tr>
			</thead>'.
			'<tbody>';

		while($i < $numRows)
		{
			$row = pg_fetch_row($result);
			$table_row = '<tr>'.
							'<td>'.$row[0].'</td>'.
							'<td>'.$row[1].'</td>';
			
			if($row[2] != ""){
				$table_row.= '<td>'.$row[2].'</td>';
			}
			else{
				$table_row.= '<td> N/A </td>';
			}

			if($row[3] != ""){
				$table_row.= '<td>'.$row[3].'</td>';
			}
			else{
				$table_row.= '<td> N/A </td>';
			}

			if($row[4] != "" || $row[5] != ""){
				$table_row.= '<td>'.$row[4].' '.$row[5].'</td>';
			}
			else{
				$table_row.= '<td> N/A </td>';
			}

			if($row[6] != "" || $row[7] != ""){
				$table_row.= '<td>'.$row[6].' - '.$row[7].'</td>';
			}
			else{
				$table_row.= '<td> N/A </td>';
			}
			if($row[8] != ""){
				$table_row.= '<td>'.$row[8].'</td>';
			}
			else{
				$table_row.= '<td> N/A </td>';
			}
				
			$table_row.=	'<td><button class="btn btn-danger mb-2 upmargined" onclick="setDeletionId('.$row[0].')" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash-alt"></i></button>'.
						'</tr>';
						
			echo $table_row;
			$i++;
		}
		echo '</tbody>'.
			'</table>'.
			'</div>';
	}
	else{
		echo 'No se pudo :(';
	}


	pg_free_result($result);
	pg_close($dbconn);
}


?>
