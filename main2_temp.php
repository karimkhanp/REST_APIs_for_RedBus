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

	if(isset($_GET['getbusmap']))
	{
		$getseatlayout = $_GET['getbusmap'];
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
			getBusMap($seattype,$iswindow,$source,$destination,$xpos,$ypos,$seatwidth,$seatheight,$seatname);
		}
	}

	if(isset($_GET['getsearchresult']))
	{
		if(isset($_GET['query1']))
		{
			$query1 = $_GET['query1'];
			if($query1 == 'true')
			{
				$from = $_GET['from'];
				$to = $_GET['to'];
				getSearchResult1($from,$to);
			}	
		}

		if(isset($_GET['query2']))
		{
			$query2 = $_GET['query2'];
			if($query2 == 'true')
			{
				$serviceid = $_GET['serviceid'];
				$travel_from = $_GET['travel_from'];
				$travel_to = $_GET['travel_to'];
				getSearchResult2($serviceid,$travel_from,$travel_to);
			}	
		}

		if(isset($_GET['query3']))
		{
			$query3 = $_GET['query3'];
			if($query3 == 'true')
			{
				$from = $_GET['from'];
				$to = $_GET['to'];
				$serviceid = $_GET['serviceid'];
				$travel_from = $_GET['travel_from'];
				$travel_to = $_GET['travel_to'];
				getSearchResult3($from,$to,$serviceid,$travel_from,$travel_to);
			}	
		}
	}

	if(isset($_GET['isblock']))
	{
		$isblock = $_GET['isblock'];
		$userloginid = $_GET['userloginid'];
		if($isblock == 'true')
		{
			isBlock($userloginid);
		}
	}

	if(isset($_GET['iscancel']))
	{
		$iscancel = $_GET['iscancel'];
		$service_id = $_GET['service_id'];
		$ticketnumber = $_GET['ticketnumber'];
		if($iscancel == 'true')
		{
			isCancel($service_id,$ticketnumber);
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


	function routeDetails($routid)
	{
		$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		
	//	echo $routDetails;
		$result1 = array();
		$result = mysqli_query($con,"SELECT * from tbl_routdetails where routeid = '".$routid."'");
		while ($row = @mysqli_fetch_row($result))
		{
			array_push($result1,$row);
		}
		echo $result1 = json_encode($result1);  
		
	}	


	function isCancel($service_id,$ticketnumber)
	{
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$result1 = array();
			$result = mysqli_query($con,"SELECT userstatus FROM tbl_cancel where service_id='".$service_id."' and  ticketnumber = '".$ticketnumber."' ");
			$row = @mysqli_fetch_row($result);
			if ($row[0] == NULL)
				echo "Ticket is yet not cancelled ...";
			else if($row[0] == 'yes')
				echo "Ticket is cancelled ...";

			return;	
	}

	function isBlock($userloginid)
	{

			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$updateStatus = "update tbl_usermgt set userstatus = 'blocked' where userloginid = '".$userloginid."' ";
			if (!mysqli_query($con,$updateStatus))
		  	{
		  			die('Error: ' . mysqli_error($con));
					echo "error";
			}
			else
				echo "User $userloginid is blocked ...";
	}

	function getSearchResult3($from,$to,$serviceid,$travel_from,$travel_to)
	{

			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$result1 = array();
			$result = mysqli_query($con,"SELECT a.source,a.destination,a.seat_fare,a.start_time,a.reach_time,a.day,a.service_id,a.from_date,a.to_date,b.availability,b.type  FROM tbl_fair as a, tbl_newlayout as b where a.sno='".$serviceid."' and a.from_date >='".$travel_from."' and a.to_date <='".$travel_to."' AND a.source = '".$from."' AND a.destination = '".$to."' and a.sno = b.sno ");
			while ($row = @mysqli_fetch_row($result))
			{
				array_push($result1,$row);
			}
			echo $result1 = json_encode($result1);  
			return;	
	}


	function getSearchResult2($serviceid,$travel_from,$travel_to)
	{
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$result1 = array();
			$result = mysqli_query($con,"SELECT * FROM tbl_service where sno='".$serviceid."' and  travel_from >='".$travel_from."' and travel_to <='".$travel_to."' ORDER BY sno desc");
			while ($row = @mysqli_fetch_row($result))
			{
				array_push($result1,$row);
			}
			echo $result1 = json_encode($result1);  
			return;	
	}

	function getSearchResult1($from,$to)
	{
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$result1 = array();
			$result = mysqli_query($con,"select * from tbl_fair where source = '".$from."' AND destination= '".$to."' ");
			while ($row = @mysqli_fetch_row($result))
			{
				array_push($result1,$row);
			}
			echo $result1 = json_encode($result1);  
			return;
	
	}

	function getBusMap($seattype,$iswindow,$source,$destination,$xpos,$ypos,$seatwidth,$seatheight,$seatname)
	{

			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}		
			$result = mysqli_query($con,"select seatname,seat_sub_num,category,seat_width,seat_height,seatpos_x,seatpos_y,iswindow from tbl_bustype where source = '".$source."' AND destination = '".$destination."' AND iswindow = '".$iswindow."' AND seatname = '".$seatname."' AND seattype = '".$seattype."' AND seat_height = '".$seatheight."' AND seat_width = '".$seatwidth."' AND seatpos_x = '".$xpos."' AND seatpos_y = '".$ypos."' ");
			$result1 = array();
			while ($row = @mysqli_fetch_row($result))
			{
				array_push($result1,$row);
			}
			echo $result1 = json_encode($result1);  
			
	}


	function cancelTicket($user_id,$user_pnr)
	{

		$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
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
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
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
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}
			$result = mysqli_query($con,"select * from tbl_user where user_id = '".$user_id."' AND user_pnr = '".$user_pnr."' AND isConfirm = 'No' ");
			if(mysqli_num_rows($result)>0)
			{			
				while ($row = @mysqli_fetch_row($result))
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
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
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
			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
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

	function getbranch($getbranch)
	{
		$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT sno,division, branch,branchofficename,branchofficecode,status from tbl_demo");
		while ($row = @mysqli_fetch_row($result))
		{
			array_push($result1,$row);
		}
		echo $result1 = json_encode($result1);  
		
	}

	function getcity($getcity)
	{
		$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}   
		$today = date("Ymd");           
		$result1 = array();
		$result = mysqli_query($con,"SELECT stationId,stationname from  tbl_newstation");
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
		$result = mysqli_query($con,"SELECT a.sourceId,a.destinationId  from tbl_newbusroute as a,tbl_newstation as b,tbl_newstation as c where a.source=b.stationId and a.destination=c.stationId ");
		while ($row = @mysqli_fetch_row($result))
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
		while ($row = @mysqli_fetch_row($result))
		{	
			array_push($result1,$row);
		}
		echo  $result1 = json_encode($result1,true);  
	}


	//echo $_GET['location'];
	
?>

