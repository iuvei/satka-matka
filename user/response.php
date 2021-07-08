
<?php
	//include connection file 
	session_start();
    include '../Config/ConnectionObjectOriented.php';
    include '../Config/DB.php';
    $db = new DB($conn);
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();
	$where = $sqlTot = $sqlRec = "";

	$params = $_REQUEST;
	// var_dump($params);die;

	//define index of column
	$columns = explode(",", $params['colums']);
    if(isset($params['where']) && $params['where'] != ''){
		$where .= $params['where'];
        unset($params['where']);
	}
	
	// check search value exist
	if( !empty($params['search']['value']) ) { 
		$where = "";
		$where .= " WHERE (";
		$i=0;
	  while( $i < count($columns) ){
	  	$where .= $columns[$i]." LIKE '%".$params['search']['value']."%' ";
	  	if($i < count($columns)-1 ){
	  		$where .= " OR ";
	  	}
        $i++;
	  } 
	  $where .= " )";
	}
	// var_dump($where);die;

	// getting total number records without any search
	$tbname = $params['tbname'];
	$sql = "SELECT * FROM `$tbname` ";
	$sqlTot .= $sql;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}
	if(isset($params['sort']) && $params['sort'] != ''){
		$sqlRec .= $params['sort'];

	}


 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";
 	$where = "";
    
	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch employees data");

	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_row($queryRecords) ) { 
		$data[] = $row;
	}	

	$json_data = array(
			"draw"            => intval( $params['draw'] ),   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format
?>
	