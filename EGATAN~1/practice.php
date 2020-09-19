

<head>
	<meta charset="utf-8">
	<title> E-Light </title>

	<style>
 		
			
	#div_root{
		margin: 	auto;	
		width: 	800px;
	}	

	#div_top{
		width: 	30%:
		height: 100px;
		text-align: 	left;
		float: left;			
	}

	#div_hello{
		width: 	70%:
		height: 100px;
		text-align: 	left;
		
	}

	#div_menu{
		width: 	9%;
		height: 300px;
		float: 	left;	
		text-align: 	center;	
	}

	#div_line{
		width: 1%;
		height: 300px;
		float: left;

	}
	#div_con{
		width: 90%;
		height: 	300px;
		float:  center;
		text-align: 	center;
	}

	</style>
</head>


<body>

	<div id = div_top>
		<img src="logo5.jpg" width="327" height="100" onclick = "location.href='home5.php';">

	</div>

	<div id = div_hello>
		<div id="introduce">
			<br / ><br />

			<form action="home5.php" method="post">
		
			<?php
				$con = mysql_connect("localhost", "root", "8713");
				mysql_select_db("egatan");
				
				$id=$_GET[id];

				$query = "select * from reservation";
				$result = mysql_query($query, $con);

				$result2 = mysql_query("SELECT * FROM manager where id='$id'");
				//$getID="select ID from manager where id='$id'";
				
				while($row=mysql_fetch_array($result2, MYSQL_ASSOC)){
				
				$name=$row["Name"];
				$ID=$row["id"];
				$PW=$row["pw"];
				$park=$row["Park"];
				} 
				

				$total_records = mysql_num_rows($result);
				$timestamp = new DateTime($result -> DT);

				
				echo "관리자님 안녕하세요!";
				echo "<br>";
				print $timestamp->format("Y년m월d일 "); 
				echo "예약된 이벤트는 총 $total_records 건입니다.";

				?>

		

			<a href='logout5.php'><input type='button' value='Logout'></a>
		</div>
	</div>

	<br  /><br  /><br  />

	<div id = div_menu>
		<button
			type = "button"
			style =  "color: #fff;
			background: pink;
			font-size:1.2em;
			border-radius:0.2em;">예약 확인</button>
		<br  />
		<button
			type = "button"
			onclick = "location.href='practice2.html';"
			style =  "color: #fff;
			background: skyblue;
			font-size:1.2em;
			border-radius:0.2em;">회원 정보</button>		
	</div>

	<div id = div_line>
		
			<HR width="1" size="600">
		
	</div>

	<div id = "div_con"  >

		<table class = "tblType1" border = 0 cellspacing=0 cellpadding = 0 style="text-align: center" >  
			<tr>
				<th width = "150" class = "th1"> 신청자 </th>
				<th width = "150" class = "th2"> 날짜 </th>
				<th width = "150" class = "th2"> 시간 </th>
				<th width = "150" class = "th2"> 도시 </th>
				<th width = "150" class = "th2"> 구 </th>
				<th width = "150" class = "th2"> 공원 </th>	
				<th width = "150" class = "th4"> 구역 </th>
				<th width = "150" class = "th5"> led 테마 </th>
			</tr>
			
			<tr height = 1 bgcolor=black><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>



		
			
			<?php
				$conn = mysqli_connect("localhost", "root", "8713", "egatan");

				if (mysqli_connect_errno()){
					echo "연결실패 이유"  . mysqli_connect_error();
				}

				$result = mysqli_query($conn, "SELECT * FROM reservation");
				$n = 1;
				
				while($row = mysqli_fetch_array($result)){

					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['reserve_date'] . "</td>";
					echo "<td>" . $row['reserve_time'] . "</td>";
					echo "<td>" . $row['city'] . "</td>";
					echo "<td>" . $row['district'] . "</td>";
					echo "<td>" . $row['park'] . "</td>";
					echo "<td>" . $row['area'] . "</td>";
					echo "<td>" . $row['led_theme'] . "</td>";
					echo "<tr>";

					$n++;
				}
			
				mysqli_close($conn);
			?>

		</table>

			
	</div>
</body>



