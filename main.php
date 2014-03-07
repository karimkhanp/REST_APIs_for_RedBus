<?php
	if(isset($_GET['getbranch']))
	{
		$getbranch = $_GET['getbranch'];
		if($getbranch == 'true')
		{
			getbranch($getbranch);
		}
	}
	function getbranch($getbranch)
	{
		$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT sno,division, branch,branchofficename,branchofficecode,status from tbl_branceoffice");
		while ($row = @mysqli_fetch_array($result))
		{
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1);  
	}
	//echo $_GET['location'];
	
?>
