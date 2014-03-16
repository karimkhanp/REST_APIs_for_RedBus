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
		$station_name = $_GET['station_name'];
		if($getDropingPoint == 'true')
		{
			getDropingPoint($getDropingPoint,$station_name);
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

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');				
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return;
		}		
		$result = mysqli_query($con,"select amount from tbl_fair where source = '".$source."' AND destination = '".$destination."'");
		$row = @mysqli_fetch_row($result);
		$amount = $row[0] * $seats * $way;
		$pnr = getPnr();		
		DoTentativeBooking($userid,$name,$from,$to,$seats,$date,$email,$way,$mobile,$pnr,$amount);
	
		$pnr = getPnr();
		echo "Your tentative booking has been done with $pnr pnr number ...";

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

	if(isset($_GET['getseatlayout']))
	{
		$getseatlayout = $_GET['getseatlayout'];
		$seattype = $_GET['seattype'];
		$iswindow = $_GET['iswindow'];
		$source = $_GET['source'];
		$destination = $_GET['destination'];
		$xpos = $_GET['xpos'];
		$ypos = $_GET['ypos'];
		$seatwidth = $_GET['seatwidth'];
		$seatheight = $_GET['seatheight'];
		$seatname = $_GET['seatname'];

		if($getseatlayout == 'true')
		{
			getSeatLayout($seattype,$iswindow,$source,$destination,$xpos,$ypos,$seatwidth,$seatheight,$seatname);
		}
	}

	function getSeatLayout($seattype,$iswindow,$source,$destination,$xpos,$ypos,$seatwidth,$seatheight,$seatname)
	{

			$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}		
			$result = mysqli_query($con,"select seatname,seat_sub_num,category,seat_width,seat_height,seatpos_x,seatpos_y,iswindow from tbl_bustype where source = '".$source."' AND destination = '".$destination."' AND iswindow = '".$iswindow."' AND seatname = '".$seatname."' AND seattype = '".$seattype."' AND seat_height = '".$seatheight."' AND seat_width = '".$seatwidth."' AND seatpos_x = '".$xpos."' AND seatpos_y = '".$ypos."' ");
			$result1 = array();
			while ($row = @mysqli_fetch_array($result))
			{
				array_push($result1,$row);
			}
			echo $result1 = json_encode($result1);  
			
	}

	function cancelTicket($user_id,$user_pnr)
	{

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');				
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
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');				
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
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$result = mysqli_query($con,"select * from tbl_guest where user_id = '".$user_id."' AND user_pnr = '".$user_pnr."'");
	
			while ($row = @mysqli_fetch_array($result))
			{
				confirmTicket($row['user_id'],$row['user_pnr'],$row['from'],$row['to'],$row['way'],$row['date'],$row['seat'],$row['email'],$row['amount']);
			}
			
			echo "Your ticket is confirmed with pnr $row['usr_pnr']";
			//$row = @mysqli_fetch_row($result);
			//echo $row[0];
			return;
	}

	function confirmTicket($user_id,$user_pnr,$from,$to,$way,$date,$seat,$email,$amount)
	{
		//Here assign the seats, after/before getting payment
		//Calculate the ammount as per seat type
		$amount = $seat * 200;
		//Select seats from list of vacant seatas
		$seat_no = '4,5';
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$insertQuery1 = "INSERT INTO tbl_confirmed(`user_id`,`from`,`to`,`date`,`user_pnr`,`seat`,`email`,`amount`) VALUES ('".$user_id."','".$from."','".$to."','".$date."','".$user_pnr."','".$seat_no."','".$email."','".$amount."')";
			if (!mysqli_query($con,$insertQuery1))
		  	{
		  		//	die('Error: ' . mysqli_error($con));
					echo "error";
			}			
			return;		
	}

	function DoTentativeBooking($userid,$name,$from,$to,$seats,$date,$email,$way,$mobile,$pnr,$amount)
	{
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$insertQuery1 = "INSERT INTO tbl_user(`user_id`,`name`,`from`,`to`,`date1`,`user_pnr`,`seat`,`email`,`way`,`amount`,`mobile`) VALUES ('".$userid."','".$name."','".$from."','".$to."','".$date."','".$pnr."','".$seats."','".$email."','".$way."','".$amount."','".$mobile."')";
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

	function routeDetails($routid)
	{
		$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		
	//	echo $routDetails;
		$result1 = array();
		$result = mysqli_query($con,"SELECT * from tbl_routdetails where routeid = '".$routid."'");
		while ($row = @mysqli_fetch_array($result))
		{
			array_push($result1,$row);echo $routid;
		}
		echo $result1 = json_encode($result1);  
		
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

	function getAvailRout($getAvailRout,$source,$destination)
	{

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safari');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT sno,source,routename from tbl_newbusroute where status = 'active' AND source = '".$source."' AND destination = '".$destination."'");
		while ($row = @mysqli_fetch_array($result))
		{	
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true);  
	}

	function getBoardingPoint($getBoardingPoint,$source,$destination)
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
		$result = mysqli_query($con,"SELECT * from tbl_boardingpoint where source = '".$source."' AND destination = '".$destination."'");
		while ($row = @mysqli_fetch_array($result))
		{	
			array_push($result1,$row);
			//echo "hi";
		}
		echo  $result1 = json_encode($result1,true);  
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

		$result = mysqli_query($con,"SELECT * from tbl_service_droping where station_name = '".$station_name."' ");
		while ($row = @mysqli_fetch_row($result))
		{	
			array_push($result1,$row);
			//echo "hi";
		}
		echo  $result1 = json_encode($result1,true);   
	}
	//echo $_GET['location'];
	
?>


