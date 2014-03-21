<?php

	if(isset($_GET['getcity']))
	{
		$getcity = $_GET['getcity'];
		$operatorid = $_GET['operatorid'];
		if($getcity == 'true')
		{
			getcity($getcity,$operatorid);
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
		$source = $_GET['source'];
		$destination = $_GET['destination'];
		$doj = $_GET['doj'];
		if($getAvailRout == 'true')
		{
			getAvailRout($getAvailRout,$source,$destination,$doj);
		}
	}

	if(isset($_GET['getBoardingPoint']))
	{
		$getBoardingPoint = $_GET['getBoardingPoint'];
		$station = $_GET['station'];

		if($getBoardingPoint == 'true')
		{
			getBoardingPoint($getBoardingPoint,$station);
		}
	}

	if(isset($_GET['getDropingPoint']))
	{
		$getDropingPoint = $_GET['getDropingPoint'];		
		$station_name = $_GET['station_name'];
		if($getDropingPoint == 'true')
		{
			getDropingPoint($getDropingPoint,$station_name);
		}
	}

	//Tentative booking using various user input. This returns pnr(as per API doc), which can be used to do confirmation.
	if(isset($_GET['tentative_booking']))
	{
		$book_ticket = mysql_real_escape_string($_GET['tentative_booking']);
		//echo $book_ticket;
		$userid = mysql_real_escape_string($_GET['userid']);
		$from = mysql_real_escape_string($_GET['from']);
		$to = mysql_real_escape_string($_GET['to']);
		$seats = mysql_real_escape_string($_GET['seats']);
		$date = mysql_real_escape_string($_GET['date']);
		$email = mysql_real_escape_string($_GET['email']);
		$way = mysql_real_escape_string($_GET['way']);
		$mobile = mysql_real_escape_string($_GET['mobile']);
		$name = mysql_real_escape_string($_GET['name']);

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return;
		}		
		$result = mysqli_query($con,"select amount from tbl_fair where source = '".$from."' AND destination = '".$to."'");
		$row = @mysqli_fetch_row($result);
		$amount = $row[0] * $seats * $way;
		$pnr = getPnr();		
		DoTentativeBooking($userid,$name,$from,$to,$seats,$date,$email,$way,$mobile,$pnr,$amount);
	
		echo "Your tentative booking has been done with $pnr pnr number ...";

	}

	if(isset($_GET['getseatlayout']))
	{
		//As per the initial document, source and destination are input parameter for getting seat layout
		$getseatlayout = $_GET['getseatlayout'];
		$source = $_GET['source'];
		$destination = $_GET['destination'];

		if($getseatlayout == 'true')
		{
			getseatlayout($source,$destination);
		}
	}

	//do confirmation using userid and pnr. 
	if(isset($_GET['doconfirm']))
	{
		$doConfirm = $_GET['doconfirm'];
		$user_id = $_GET['user_id'];
		$user_pnr = $_GET['user_pnr'];
		//I have used logic, when user enters his payment_id, do confirmation.
		$payment_id = $_GET['payment_id'];
		if($doConfirm == 'true')
		{
			doConfirm($user_id,$user_pnr,$payment_id);
		}
	}

	function getDropingPoint($getDropingPoint,$station_name)
	{

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		//echo $city;		

		$result = mysqli_query($con,"SELECT droping_points from tbl_service_droping where station_name = '".$station_name."' ");
		while ($row = @mysqli_fetch_row($result))
		{	
			array_push($result1,$row);
			//echo "hi";
		}
		echo  $result1 = json_encode($result1,true);   
	}



	function doConfirm($user_id,$user_pnr,$payment_id)
	{
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			
			$result = mysqli_query($con,"select * from tbl_guest where user_id = '".$user_id."' AND user_pnr = '".$user_pnr."'");
			$row = @mysqli_fetch_array($result);
			
			//Check payment on $payment_id is done or not. If yes then return message with confirmation
			$new_pnr = getpnr();
			//while ($row = @mysqli_fetch_array($result))
			if ($row[9] == $user_id)
			{
				confirmTicket($row['user_id'],$new_pnr,$row['from'],$row['to'],$row['way'],$row['date1'],$row['seat'],$row['email'],$row['amount']);
				echo "Your ticket is confirmed with pnr $new_pnr ...";
			}			
			//$row = @mysqli_fetch_row($result);
			//echo $row[0];
			return;
	}

	function getBoardingPoint($getBoardingPoint,$station)
	{

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		//echo $city;
		$result = mysqli_query($con,"SELECT boardingpointname from tbl_boardingpoint where station = '".$station."'");
		while ($row = @mysqli_fetch_row($result))
		{	
			array_push($result1,$row);
			//echo "hi";
		}
		echo  $result1 = json_encode($result1,true);  
	}



	function confirmTicket($user_id,$user_pnr,$from,$to,$way,$date,$seat,$email,$amount)
	{
		//Here assign the seats, after/before getting payment
		//Calculate the ammount as per seat type
		$amount = $seat * 200;
		//Select seats from list of vacant seatas
		$seat_no = '4,5';
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$insertQuery1 = "INSERT INTO tbl_confirmed(`user_id`,`from`,`to`,`date1`,`user_pnr`,`seat`,`email`,`amount`) VALUES ('".$user_id."','".$from."','".$to."','".$date."','".$user_pnr."','".$seat_no."','".$email."','".$amount."')";
			if (!mysqli_query($con,$insertQuery1))
		  	{
		  			die('Error: ' . mysqli_error($con));
					echo "error";
			}			
			return;		
	}


	function getseatlayout($source,$destination)
	{
		$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');			
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}		
		$result1 = array();
		//$result = mysqli_query($con,"select d.seatno, d.type from tbl_fair as a, tbl_service as b, tbl_lower as c, tbl_newlayout as d where a.sno = b.sno AND b.sno = c.sno AND d.sno = c.sno AND a.source = '".$source."' AND a.destination = '".$destination."' ; ");

		$result = mysqli_query($con, "SELECT a.seatno AS seatno, a.availability AS avaibility, a.type AS TYPE , b.from_date AS DOJ, c.bustype AS bus_type FROM tbl_newlayout AS a, tbl_fair AS b, tbl_bustype AS c WHERE a.sno = b.sno AND b.sno = c.sno AND b.source ='".$source."' AND b.destination ='".$destination."' ; ");

		while ($row = @mysqli_fetch_row($result))
		{
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true); 

	}


	function getAvailRout($getAvailRout,$source,$destination,$doj)
	{

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT source,destination,doj from tbl_newbusroute where status = 'active' AND source = '".$source."' AND destination = '".$destination."' AND doj = '".$doj."'");
		while ($row = @mysqli_fetch_row($result))
		{	
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true);  
	}


	function getsourcetodest($getsourcetodest)
	{

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT source,destination from tbl_newbusroute where status ='active'");
		while ($row = @mysqli_fetch_row($result))
		{	
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true);  
	}


	function getcity($getcity,$operatorid)
	{
		$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT city from tbl_demo where operator_no= '".$operatorid."' AND status ='active'");
		while ($row = @mysqli_fetch_row($result))
		{
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true);  
	}

	function DoTentativeBooking($userid,$name,$from,$to,$seats,$date,$email,$way,$mobile,$pnr,$amount)
	{
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$insertQuery1 = "INSERT INTO tbl_guest(`user_id`,`name`,`from`,`to`,`date1`,`user_pnr`,`seat`,`email`,`way`,`amount`,`mobile`) VALUES ('".$userid."','".$name."','".$from."','".$to."','".$date."','".$pnr."','".$seats."','".$email."','".$way."','".$amount."','".$mobile."')";
			if (!mysqli_query($con,$insertQuery1))
		  		{
		  			die('Error: ' . mysqli_error($con));
					echo "error";
				}		
			return;
	
	}

	function getPnr()
	{
		$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');
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

?>

