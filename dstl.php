<?php
	require_once('db.php');
	require_once('util.php');
	include('chualogin.php');
	$trang=$_GET['trang']??1;
	$sodong1trang=5;
	$from=($trang-1)*$sodong1trang;
	include('sapxep.php');
	if(isset($_GET['search'])){
		$r=queryAll("select * from theloai where ten like ? or ma=? $order limit $from,$sodong1trang",array('%'.$_GET['search'].'%',$_GET['search']));
		include('tktl.php');
	}else{
		$r=queryAll("select * from theloai $order limit $from,$sodong1trang",array());
	}
?>
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
				timKiem('dstl.php'); 
				demRow('theloai','taotl.php');
			?>
		</div>
		<div style="padding-left:250px">
			<table width=500px style="text-align:center;padding-top=150px">
				<tr>
					<?= 'Xin Chào.'.$_SESSION['USER']['email']?>
				</tr>
				<tr>
					<td style="border: 1px solid black">Mã Thể Loại<?php linkSearch($kTr,'ma');?></td>
					<td style="border: 1px solid black">Tên Thể Loại<?php linkSearch($kTr,'ten');?></td>
					<td style="border: 1px solid black">Action</td>
				</tr>
				<?php foreach($r as $key=>$value){?>
				<tr>
					<td style="border: 1px solid black"><?=$value['ma']?></td>
					<td style="border: 1px solid black"><?=$value['ten']?></td>
					<td style="border: 1px solid black"><a href="suatl.php?ma=<?=$value['ma']?>">EDIT</a>.<a href="xoatl.php?ma=<?=$value['ma']?>">DELETE</a></td>
				</tr>
				<?php } ?>
			</table>
			<button type=submit><a href='taotl.php'>ADD</a></button>
			<?php 
				if(isset($_GET['search'])){
					$x=$search;
				}else{
					$x=queryAll("select count(*) as tong from theloai",array());
				}
				phantrang($x,'dstl.php');
			?>
		</div>
	</body>
</html>