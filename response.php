
<?php
	//include connectionection file 
	include_once("connection.php");
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		0 =>'id',
		1=> 'Project_No',
     		2 => 'RFQ',
		3=> 'Quotation_Status',
 		4=> 'Contract_Amount',
		5=> 'Contract_Signed_Date',
    	6=> 'Manufacturing',
 		7=> 'Collected_Amount',
    	8=> 'Contract_Amount',
		
			9=> 'Delivery_Due_Date',
		10=> 'Document'
	);



	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( Project_No LIKE '".$params['search']['value']."%' ";    
		$where .=" OR RFQ LIKE '".$params['search']['value']."%' ";

		$where .=" OR Quotation_Status LIKE '".$params['search']['value']."%' ";
				$where .=" OR Contract_Amount LIKE '".$params['search']['value']."%' ";
				$where .=" OR Contract_Signed_Date LIKE '".$params['search']['value']."%' ";
				$where .=" OR Manufacturing LIKE '".$params['search']['value']."%' ";
						$where .=" OR Collected_Amount LIKE '".$params['search']['value']."%' ";
								$where .=" OR Contract_Amount LIKE '".$params['search']['value']."%' ";
										$where .=" OR Delivery_Due_Date LIKE '".$params['search']['value']."%' ";
												$where .=" OR Document LIKE '".$params['search']['value']."%' )";
}

	// getting total number records without any search
	$sql = "SELECT * FROM `sales_record` ";
	$sqlTot .= $sql;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}


 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

	$queryTot = mysqli_query($connection, $sqlTot) or die("database error:". mysqli_error($connection));


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($connection, $sqlRec) or die("error to fetch employees data");

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
	