<?php
/*

8.	DoTentativeBooking(): Do tentative booking for given user inputs 
	http://localhost/safari/REST_APIs_for_RedBus/validate.php?tentative_booking=true&email=karimkhan_it@yaho.com&date=21121989&seats=4&userid=111&from=abad&to=del&way=1&name=karim2&mobile=3434

9.	ConfirmTicket(): Confirm booking for entered userid and pnr number
	http://localhost/safari/REST_APIs_for_RedBus/validate.php?doconfirm=true&user_id=111&user_pnr=1152531668&payment_id=34

7.	GetSeatLayout(): Get seat layout for entered source and destination
	http://localhost/safari/REST_APIs_for_RedBus/validate.php?getseatlayout=true&source=15&destination=16
	

*/
	//As per initial document, using source and destination for getting seat layout
	if(isset($_GET['getseatlayout']))
	{
		//As per the initial document, source and destination are input parameter for getting seat layout
		$getseatlayout = $_GET['getseatlayout'];
		$source = $_GET['source'];
		$destination = $_GET['destination'];
		
		$getAvailRout = $_GET['getAvailRout'];
		$source = $_GET['source'];
		$destination = $_GET['destination'];

		if($getseatlayout == 'true')
		{
			getseatlayout($source,$destination);
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
	
	if(isset($_GET['getcity']))
	{
		$getcity = $_GET['getcity'];
		if($getcity == 'true')
		{
			getcity($getcity);
		}
	}
	
	function getAvailRout($getAvailRout,$source,$destination)
	{

		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');			
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}		
		$result1 = array();
		
		
		
	 "select b.service_name,b.service_number from tbl_fair as a, tbl_service as b, tbl_lower as c where a.service_id = b.sno AND b.layout = c.sno AND a.source = '".$source."' AND a.destination = '".$destination."' ;  ";
		
		
		$result = mysqli_query($con,"select b.sno,b.service_name,b.service_number,a.seat_fare,a.start_time,a.reach_time from tbl_fair as a, tbl_service as b, tbl_lower as c where a.service_id = b.sno AND b.layout = c.sno AND a.source = '".$source."' AND a.destination = '".$destination."' ;  ");
		while ($row = @mysqli_fetch_row($result))
		{
			array_push($result1,$row);
		}
		
		
		
		 
		
		 echo  $result1 = json_encode($result1,true);   
	}
	
	function getcity($getcity)
	{
		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');			
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}		
		$result1 = array();
		
		
		
	
		
		
		$result = mysqli_query($con,"select stationname, sno from tbl_newstation  ");
		while ($row = @mysqli_fetch_row($result))
		{
			array_push($result1,$row);
		}
		
		
		
		 
		
		 echo  $result1 = json_encode($result1,true);  
	}
	
	function getseatlayout($source,$destination)
	{
		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');			
		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		    return;
		}		
		$result1 = array();
		$result123 = array();
		
		
	
		$result23 = mysqli_query($con,"select c.lowtotcapacity,c.lowtotalrows,c.lowtotalcolumns,c.lowdividerrow,c.lowberthrows,c.uptotcapacity,c.uptotalrows,c.uptotalcolumns,c.updividerrow,c.upberthrows	 from tbl_fair as a, tbl_service as b, tbl_lower as c where a.service_id = b.sno AND b.layout = c.sno AND a.source = '".$source."' AND a.destination = '".$destination."' ; ");
		
		while ($row23 = @mysqli_fetch_row($result23))
		{
			array_push($result123,$row23);
		}
		
		$result = mysqli_query($con,"select d.seatno, d.type from tbl_fair as a, tbl_service as b, tbl_lower as c, tbl_newlayout as d where a.service_id = b.sno AND b.layout = c.sno AND d.seatno!=''  AND d.layoutid = c.sno AND a.source = '".$source."' AND a.destination = '".$destination."' ; ");
		while ($row = @mysqli_fetch_row($result))
		{
			array_push($result1,$row);
		}
		
		
		 echo    $result123 = json_encode($result123,true);
		 ?>
		 <br />
		 <?
		 
		
		 echo  $result1 = json_encode($result1,true); 

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

		$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');				
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
	function doConfirm($user_id,$user_pnr,$payment_id)
	{
			$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');				
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

	function confirmTicket($user_id,$user_pnr,$from,$to,$way,$date,$seat,$email,$amount)
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
			$insertQuery1 = "INSERT INTO tbl_confirmed(`user_id`,`from`,`to`,`date1`,`user_pnr`,`seat`,`email`,`amount`) VALUES ('".$user_id."','".$from."','".$to."','".$date."','".$user_pnr."','".$seat_no."','".$email."','".$amount."')";
			if (!mysqli_query($con,$insertQuery1))
		  	{
		  			die('Error: ' . mysqli_error($con));
					echo "error";
			}			
			return;		
	}

	function DoTentativeBooking($userid,$name,$from,$to,$seats,$date,$email,$way,$mobile,$pnr,$amount)
	{
			$con = mysqli_connect('50.62.209.38:3306', 'saffari', 'Jxuv62&3', 'venkat07_saffari');				
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


?>
