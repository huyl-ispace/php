<?php
	$search=queryAll("select count(*) as tong from noiluutru 
					inner join mavach on mavach.ma=noiluutru.mavach where noiluutru.ten like ? or noiluutru.ma=? or noiluutru.maluutrucha=? or mavach.noidung=?",array('%'.$_GET['search'].'%',$_GET['search'],$_GET['search'],$_GET['search']));
	$tong='';
	foreach($search as $key=>$value){
		$tong=$value['tong'];
	}
	if($tong<=0 && $_GET['search'] != ''){ ?>
		<html lang='vi'>
			<head>
				<meta charset="UTF-8">
			</head>
			<body>
				<div style="float:left">
					<?php include('menu.php'); ?>
				</div>
				<div style="padding-left:350px">
					<?php
						timKiem('dsnlt.php');
					?>
				</div>
			</body>
		</html>
	<?php		
		echo '<p style="color:red;padding-left:300px">Không Tìm Thấy Kết Quả !</p>';
		exit;
		}
	?>