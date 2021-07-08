
<?php
	//include connection file 
	session_start();
    include '../Config/ConnectionObjectOriented.php';
    include '../Config/DB.php';
    $db = new DB($conn);
	function createSlug2($str, $delimiter = '-'){

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    
    }  
    
    $location = "../img/articles/";
    
	// initilize all variable
    $params = $columns = $totalRecords = $data = array();
	$sort = $join = $where = $sqlTot = $sqlRec = "";

	$params = $_REQUEST;
// 	var_dump($params);die;
   
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
	if(isset($params['sort']) && $params['sort'] != ''){
    	$sort .= $params['sort'];
        unset($params['sort']);
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
	$cols = $params['colums'];
	$tbname = $params['tbname'];
	$sql = "SELECT $cols FROM `$tbname` ";
	$sqlTot .= $sql;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($join) && $join != '') {

		$sqlTot .= $join;
		$sqlRec .= $join;
	}
	
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}
	
	if(isset($sort) && $sort != '') {

		$sqlTot .= $sort;
		$sqlRec .= $sort;
	}

	


//  	$sqlRec .=  " ORDER BY id desc  LIMIT ".$params['start']." ,".$params['length']." ";
 $sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";
    // var_dump($sqlRec);die;
	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch employees data");


	//iterate on results row and create new index array of data
// 	foreach($row as $key => $value){
	    
// 	    if($key == "video" || $key == "image"){
// 	        $value = "<a target='_blank' href='".$location.$value."'>".$value."</a> ";
// 	    }
// 	    $data[$key] = $value;
// 	}
	while( $row = mysqli_fetch_row($queryRecords) ) {
	    
	    
	    $row[2] = "<a target='_blank' href='".$location.$row[2]."'>".$row[2]."</a> ";
	    
		$data[] = $row;
	}
	
if(isset($params['external_link']) && $params['external_link'] !== ''){
    for($i=0;$i<count($data);$i++){
        $external_link = $params['external_link'];
        if($external_link == 'delete'){
            $data[$i][count($columns)] = "<a onclick=\"return confirm('Delete this record?')\" href=\"../controller/DeleteController.php?id=".$data[$i][0]."&table_name=".$tbname."\">Delete</a>";
        }elseif($external_link == 'update'){
            $data[$i][count($columns)] = "<a  href=\"./edit_article.php?id=".$data[$i][0]."&table_name=".$tbname."\">Update</a>";
        }elseif($external_link == 'all'){
            $data[$i][count($columns)] = "<a onclick=\"return confirm('Delete this record?')\" href=\"../controller/DeleteController.php?id=".$data[$i][0]."&table_name=".$tbname."\">Delete</a>";
            $data[$i][count($columns)+1] = "<a href=\"./edit_article.php?id=".$data[$i][0]."&table_name=".$tbname."\">Update</a>";
        }
    }
    
   
}
// var_dump(count($columns));die;
// for($i=0;$i<count($data);$i++){
// 	   // $super_category_name = $data[$i][4];
//     //     $slug = "/".$data[$i][0]."/".createSlug2($super_category_name)."/".createSlug2($data[$i][1]);
// 	    $data[$i][count($columns)]= "<a onclick=\"return confirm('Delete this record?')\" href=\"../controller/DeleteController.php?id=".$data[$i][0]."&table_name=articles\">Delete</a>";
// 	   // $data[$i][6]= "<a  href=article-detail.php?id=".$data[$i][0].">Edit</a>";
// 	}



	$json_data = array(
			"draw"            => intval( $params['draw'] ),   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format
?>
	