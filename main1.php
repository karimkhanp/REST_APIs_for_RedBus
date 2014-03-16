<?php
	//echo date("ymd");
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
		$source = $_GET['source'];
		$destination = $_GET['destination'];
		if($getAvailRout == 'true')
		{
			getAvailRout($getAvailRout,$source,$destination);
		}
	}

	if(isset($_GET['getroutdetails']))
	{
		$routeDetails = $_GET['getroutdetails'];
		$routeid = $_GET['routeid'];
 
		if($routeDetails == 'true')
		{
			routeDetails($routeid);
		}
	}

	if(isset($_GET['getBoardingPoint']))
	{
		$getBoardingPoint = $_GET['getBoardingPoint'];
		$source = $_GET['source'];
		$destination = $_GET['destination'];
		if($getBoardingPoint == 'true')
		{
			getBoardingPoint($getBoardingPoint,$source,$destination);
		}
	}

	if(isset($_GET['getDropingPoint']))
	{
		$getDropingPoint = $_GET['getDropingPoint'];		
		$source = $_GET['source'];
		$destination = $_GET['destination'];
		if($getDropingPoint == 'true')
		{
			getDropingPoint($getDropingPoint,$source,$destination);
		}
	}

	if(isset($_GET['doconfirm']))
	{
		$doConfirm = $_GET['doconfirm'];
		$user_id = $_GET['user_id'];
		$user_pnr = $_GET['user_pnr'];
		if($doConfirm == 'true')
		{
			doConfirm($user_id,$user_pnr);
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

	if(isset($_GET['isticketcancellable']))
	{
		$isticketcancellable = $_GET['isticketcancellable'];
		$user_id = $_GET['user_id'];
		$user_pnr = $_GET['user_pnr'];
		if($isticketcancellable == 'true')
		{
			isTicketCancellable($user_id,$user_pnr);
		}
	}

	if(isset($_GET['cancelticket']))
	{
		$cancelticket = $_GET['cancelticket'];
		$user_id = $_GET['user_id'];
		$user_pnr = $_GET['user_pnr'];
		if($cancelticket == 'true')
		{
			cancelTicket($user_id,$user_pnr);
		}
	}

	function cancelTicket($user_id,$user_pnr)
	{

		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');				
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return;
		}		
		$result = mysqli_query($con,"select date from tbl_user where user_id = '".$user_id."' AND user_pnr = '".$user_pnr."'");
		$row = @mysqli_fetch_row($result);
		$book_date = $row[0];
		$today = date("ymd");
		$diff = $today - $book_date;
		//echo "<br>dif : $diff";
		if($diff <= 1)
		{
			echo "Sorry, now you can not cancel your ticket ...";
			return;
		}
		else
		{
			$result = mysqli_query($con,"select amount from tbl_confirm where user_id = '".$user_id."' AND user_pnr = '".$user_pnr."'");
			$row = @mysqli_fetch_row($result);
			$amount = $row[0];
			echo $amount;
			$updateStatus = "update tbl_user set isConfirm = 'cancelled' where user_id = '".$user_id."' AND user_pnr = '".$user_pnr."'";
			if (!mysqli_query($con,$updateStatus))
		  	{
		  		//	die('Error: ' . mysqli_error($con));
					echo "error";
			}
			$updateStatus = "update tbl_confirmed set status = 'cancelled' where user_id = '".$user_id."' AND user_pnr = '".$user_pnr."'";
			if (!mysqli_query($con,$updateStatus))
		  	{
		  		//	die('Error: ' . mysqli_error($con));
					echo "error";
			}
			echo "Your ticket with pnr number $user_pnr is cancelled ...<br>";
			echo "Your accoutn would be credited by $amount by 7 working days ...<br>";
			echo "Thanks for using our system!";

		}

	}


	function isTicketCancellable($user_id,$user_pnr)
	{
			$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}		
			$result = mysqli_query($con,"select date from tbl_user where user_id = '".$user_id."' AND user_pnr = '".$user_pnr."'");
			$row = @mysqli_fetch_row($result);
			$book_date = $row[0];
			echo $book_date;
			$today = date("ymd");
			$diff = $today - $book_date;
			//echo "<br>dif : $diff";
			if($diff <= 1)
				echo "Sorry, could not be cancelled ..";
			else
				echo "You can proceed to cancel ..";
	}

	function doConfirm($user_id,$user_pnr)
	{
			$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$result = mysqli_query($con,"select * from tbl_user where user_id = '".$user_id."' AND user_pnr = '".$user_pnr."' AND isConfirm = 'No' ");
			if(mysqli_num_rows($result)>0)
			{			
				while ($row = @mysqli_fetch_array($result))
				{
					confirmTicket($row['user_id'],$row['user_pnr'],$row['from'],$row['to'],$row['way'],$row['date'],$row['seat'],$row['email']);
				}
			}
			else
				echo "your all tickes are confirmed";
			//$row = @mysqli_fetch_row($result);
			//echo $row[0];
			return;
	}

	function confirmTicket($user_id,$user_pnr,$from,$to,$way,$date,$seat,$email)
	{
		//Here assign the seats, after/before getting payment
		//Calculate the ammount as per seat type
		$amount = $seat * 200;
		//Select seats from list of vacant seatas
		$seat_no = '4,5';
			$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$insertQuery1 = "INSERT INTO tbl_confirmed(`user_id`,`from`,`to`,`date`,`user_pnr`,`seat`,`email`,amount) VALUES ('".$user_id."','".$from."','".$to."','".$date."','".$user_pnr."','".$seat_no."','".$email."','".$amount."')";
			if (!mysqli_query($con,$insertQuery1))
		  	{
		  		//	die('Error: ' . mysqli_error($con));
					echo "error";
			}		
			$updateStatus = "update tbl_user set isConfirm = 'Yes' where user_id = '".$user_id."' AND user_pnr = '".$user_pnr."'";
			if (!mysqli_query($con,$updateStatus))
		  	{
		  		//	die('Error: ' . mysqli_error($con));
					echo "error";
			}		
			echo "Your ticket is confirmed... <br>";
			echo "you PNR is $user_pnr and seat no $seat_no <br>";
			
			return;		
	}

	function DoTentativeBooking($userid,$book_ticket,$from,$to,$date,$pnr,$seats,$email)
	{
			$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$insertQuery1 = "INSERT INTO tbl_user(`user_id`,`book_ticket`,`from`,`to`,`date`,`user_pnr`,`seat`,`email`,`isConfirm`) VALUES ('".$userid."','".$book_ticket."','".$from."','".$to."','".$date."','".$pnr."','".$seats."','".$email."','No')";
			if (!mysqli_query($con,$insertQuery1))
		  		{
		  		//	die('Error: ' . mysqli_error($con));
					echo "error";
				}		
			return;
	
	}
	
	function getPnr()
	{
		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');
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

	function routeDetails($routid)
	{
		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		
	//	echo $routDetails;
		$result1 = array();
		$result = mysqli_query($con,"SELECT a.sno,a.service_name as ServiceName ,e.start_time as Depature,e.reach_time as Arrival  from tbl_service as a,tbl_newbusroute as b,tbl_newstation as c,tbl_newstation as d,tbl_newbusroute as f,tbl_fair as e where a.status = 'active' and a.route=b.sno and b.source=c.sno and b.destination=d.sno and b.source=e.source and b.destination=e.destination and a.sno=e.service_id");
		while ($row = @mysqli_fetch_array($result))
		{
			array_push($result1,$row);echo $routid;
		}
		echo $result1 = json_encode($result1);  
		
	}	

	function getbranch($getbranch)
	{
		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');
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
		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT sno,stationname,status from  tbl_newstation");
		while ($row = @mysqli_fetch_array($result))
		{
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true);  
	}

	function getsourcetodest($getsourcetodest)
	{

		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT a.sno,b.stationname as Source,c.stationname as Destination  from tbl_newbusroute as a,tbl_newstation as b,tbl_newstation as c where a.source=b.sno and a.destination=c.sno ");
		while ($row = @mysqli_fetch_array($result))
		{	
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true);  
	}

	function getAvailRout($getAvailRout,$source,$destination)
	{

		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
			$result = mysqli_query($con,"SELECT a.sno,a.service_name as ServiceName,c.stationname as Source,d.stationname as Destination from tbl_service as a,tbl_newbusroute as b,tbl_newstation as c,tbl_newstation as d where a.status = 'active' and a.route=b.sno and b.source=c.sno and b.destination=d.sno");
		while ($row = @mysqli_fetch_row($result))
		{	
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true);  
	}

	function getBoardingPoint($getBoardingPoint,$source,$destination)
	{

		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		//echo $city;
		$result = mysqli_query($con,"SELECT a.boardingpointname,a.address,a.landmark,b.service_name as Servicename FROM  tbl_boardingpoint as a,tbl_service as b,tbl_service_boarding as c where c.servic_id=b.sno and c.boarding_points=a.sno");
		while ($row = @mysqli_fetch_array($result))
		{	
			array_push($result1,$row);
			//echo "hi";
		}
		echo  $result1 = json_encode($result1,true);  
	}

	function getDropingPoint($getDropingPoint,$source,$destination)
	{

		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		//echo $city;		

		$result = mysqli_query($con,"SELECT a.boardingpointname,a.address,a.landmark,b.service_name as Servicename FROM  tbl_boardingpoint as a,tbl_service as b,tbl_service_droping as c where c.servic_id=b.sno and c.boarding_points=a.sno");
		while ($row = @mysqli_fetch_array($result))
		{	
			array_push($result1,$row);
			//echo "hi";
		}
		echo  $result1 = json_encode($result1,true);   
	}
	//echo $_GET['location'];
	
?>

