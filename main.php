<?php
	if(isset($_GET['getbranch']))
	{
		$getbranch = $_GET['getbranch'];
		if($getbranch == 'true')
		{
			getbranch($getbranch);
		}
	}

	if(isset($_GET['getcity']))
	{
		$getcity = $_GET['getcity'];
		if($getcity == 'true')
		{
			getcity($getcity);
		}
	}

	if(isset($_GET['getsourcetodest']))
	{
		$getsourcetodest = $_GET['getsourcetodest'];
		if($getsourcetodest == 'true')
		{
			getsourcetodest($getsourcetodest);
		}
	}

	if(isset($_GET['getAvailRout']))
	{
		$getAvailRout = $_GET['getAvailRout'];
		if($getAvailRout == 'true')
		{
			getAvailRout($getAvailRout);
		}
	}

	if(isset($_GET['getBoardingPoint']))
	{
		$getBoardingPoint = $_GET['getBoardingPoint'];
		$city = $_GET['city'];
		if($getBoardingPoint == 'true')
		{
			getBoardingPoint($getBoardingPoint,$city);
		}
	}

	if(isset($_GET['getDropingPoint']))
	{
		$getDropingPoint = $_GET['getDropingPoint'];
		$city = $_GET['city'];
		if($getDropingPoint == 'true')
		{
			getDropingPoint($getDropingPoint,$city);
		}
	}

	if(isset($_GET['book_ticket']))
	{
		$book_ticket = mysql_real_escape_string($_GET['book_ticket']);
		//echo $book_ticket;
		$userid = mysql_real_escape_string($_GET['userid']);
		$from = mysql_real_escape_string($_GET['from']);
		$to = mysql_real_escape_string($_GET['to']);
		$seats = mysql_real_escape_string($_GET['seats']);
		$date = mysql_real_escape_string($_GET['date']);
		$email = mysql_real_escape_string($_GET['email']);
		$pnr = getPnr();
		echo "You pnr num is : $pnr <br>";
		echo "Check you mail and save it for future use";
		if($book_ticket == 'true')
		{
			DoTentativeBooking($userid,$book_ticket,$from,$to,$date,$pnr,$seats,$email);

		}

	}

	function DoTentativeBooking($userid,$book_ticket,$from,$to,$date,$pnr,$seats,$email)
	{
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$insertQuery1 = "INSERT INTO tbl_user(`user_id`,`book_ticket`,`from`,`to`,`date`,`user_pnr`,`seat`,`email`) VALUES ('".$userid."','".$book_ticket."','".$from."','".$to."','".$date."','".$pnr."','".$seats."','".$email."')";
			if (!mysqli_query($con,$insertQuery1))
		  		{
		  		//	die('Error: ' . mysqli_error($con));
					echo "error";
				}		
			return;
	
	}
	
	function getPnr()
	{
		$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}
		$pnr = mt_rand(1111111111, 99999999999);				
		$result = mysqli_query($con,"SELECT user_pnr from tbl_user where user_pnr = '".$pnr."'");
		if(mysqli_num_rows($result)>0)
			getPnr();
		else
			return $pnr;
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
		$result = mysqli_query($con,"SELECT sno,division, branch,branchofficename,branchofficecode,status from tbl_demo");
		while ($row = @mysqli_fetch_array($result))
		{
			array_push($result1,$row);
		}
		echo $result1 = json_encode($result1);  
		
	}

	function getcity($getcity)
	{
		$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT sno,city,status from tbl_demo");
		while ($row = @mysqli_fetch_array($result))
		{
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true);  
	}

	function getsourcetodest($getsourcetodest)
	{

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT * from tbl_newbusroute");
		while ($row = @mysqli_fetch_array($result))
		{	
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true);  
	}

	function getAvailRout($getAvailRout)
	{

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT sno,source,routename from tbl_newbusroute where status = 'active'");
		while ($row = @mysqli_fetch_array($result))
		{	
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true);  
	}

	function getBoardingPoint($getBoardingPoint,$city)
	{

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		//echo $city;
		$result = mysqli_query($con,"SELECT * from tbl_service_boarding where station_name = '".$city."'");
		while ($row = @mysqli_fetch_array($result))
		{	
			array_push($result1,$row);
			//echo "hi";
		}
		echo  $result1 = json_encode($result1,true);  
	}

	function getDropingPoint($getDropingPoint,$city)
	{

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT * from tbl_service_droping where station_name = '".$city."'");
		while ($row = @mysqli_fetch_array($result))
		{	
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true);  
	}
	//echo $_GET['location'];
	
?>
