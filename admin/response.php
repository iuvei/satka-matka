
<?php
	//include connection file 
	session_start();
    include '../Config/ConnectionObjectOriented.php';
    include '../Config/DB.php';
    $db = new DB($conn);
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();
	$where = $sqlTot = $sqlRec = "";
    $sort = '';
    if(isset($_REQUEST['sort']) && $_REQUEST['sort'] !== ''){
        $sort = $_REQUEST['sort'];
        unset($_REQUEST['sort']);
        unset($_POST['sort']);
    }
    
	$params = $_REQUEST;
	// var_dump($params);die;

	//define index of column
	$columns = explode(",", $params['colums']);
	
	if(isset($params['join']) && $params['join'] != ''){
		$join .= $params['join'];
        unset($params['join']);
	}
    
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
	$cols = $params['colums'];
	$sql = "SELECT $cols FROM `$tbname` ";
	$sqlTot .= $sql;
	$sqlRec .= $sql;
	
	//concatenate join sql if value exist
	if(isset($join) && $join != '') {

		$sqlTot .= $join;
		$sqlRec .= $join;
	}
	//concatenate where sql if value exist
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}
	
	//concatenate where sql if value exist
	if(isset($sort) && $sort != ''){
		$params['order'][0]['dir'] = $sort;

	}
    
 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";
 	$where = "";
    // var_dump($sqlRec);
	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch employees data");
    $result = mysqli_query($conn, $sqlRec);
	//iterate on results row and create new index array of data
	while( $row =$result->fetch_assoc()) { 
	    
		foreach($row as $key => $value){
	        if($key == 'result'){
	            if($row[$key] == 'Red'){
	                $row[$key] = '<div class="point" style="background-color: rgb(255, 23, 68);"></div>';
	            }elseif($row[$key] == 'Green'){
	                $row[$key] = '<div class="point" style="background-color: rgb(0, 230, 118);"></div>';
	            }elseif($row[$key] == 'Violet'){
	                $row[$key] = '<div class="point" style="background-color: rgb(101, 31, 255);"></div>';
	            }elseif($row[$key] == 'Violet,Red'){
	                $row[$key] = '<p><span class="point" style="background-color: rgb(101, 31, 255);"></span><span class="point" style="background-color: rgb(255, 23, 68);"></span></p>';
	            }else{
	                $row[$key] = $row[$key];
	            }
	        }
	        if($key == 'my_number'){
	            if($row[$key] == null){
	                $row[$key] = $row['my_color'];
	                unset($row['my_color']);
	            }else{
	                unset($row['my_color']);
	            }
	        }
	        
	    }
	    $data[] = array_values($row);
	}	

	$json_data = array(
			"draw"            => intval( $params['draw'] ),   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format
?>
	