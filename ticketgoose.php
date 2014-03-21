<?php

	if(isset($_GET['getsearchresult']))
	{
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

Boarding point & address,Dropping Point ,seat fare,seat status,cancellation term

	function getBusMap($seattype,$iswindow,$source,$destination,$xpos,$ypos,$seatwidth,$seatheight,$seatname)
	{

			$con = mysqli_connect('127.0.0.1', 'root', '', 'safarinew');				
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				return;
			}		
			$result = mysqli_query($con,"select a.bustype,a.bustype_sname,a.category, b.seat_fare, b.start_time,b.status,d.boardingpointname,d.address,e.station_name,f.cancel_status from tbl_bustype as a, tbl_fair as b, tbl_cancel as c, tbl_boardingpoint as d, tbl_service_droping as e, tbl_cancel as f where a.source = '".$source."' AND a.destination = '".$destination."' AND a.iswindow = '".$iswindow."' AND a.seatname = '".$seatname."' AND a.seattype = '".$seattype."' AND a.seat_height = '".$seatheight."' AND a.seat_width = '".$seatwidth."' AND a.seatpos_x = '".$xpos."' AND a.seatpos_y = '".$ypos."' and a.sno = b.sno and a.sno = c.sno and a.sno = d.sno and a.sno = e.sno and a.sno = f.sno ");
			$result1 = array();
			while ($row = @mysqli_fetch_row($result))
			{
				array_push($result1,$row);
			}
			echo $result1 = json_encode($result1);  
			
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
?>
