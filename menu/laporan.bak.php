<?php
include "../koneksi/checknlog.php";
$sql = "SELECT * FROM datalogin";
$hasil = mysqli_query($connection,$sql);
$itung1=$itung2=$itung3=$itung4=$itung5=0;
while($fetch = mysqli_fetch_array($hasil))
{
	switch($fetch['status'])
	{
		case 1:$itung1 += $fetch['logcount'];break;
		case 2:$itung2 += $fetch['logcount'];break;
		case 3:$itung3 += $fetch['logcount'];break;
		case 4:$itung4 += $fetch['logcount'];break;
		default:return true;
	}
}
?>
<html>
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);
function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['User', 'Jumlah login'],
          ['Admin',  <?php echo $itung1;?>],
          ['Anggota',  <?php echo $itung2;?>],
          ['Pimpinan',  <?php echo $itung3;?>],
          ['Operator',  <?php echo $itung4;?>]
        ]);
        var options = {
          title: 'Grafik login menurut hak akses user',
          legend: { position: 'bottom' },
		  height:500
        };
        var chart = new google.visualization.LineChart(document.getElementById('graflog'));
		chart.draw(data, options);
}
function drawChart2() {
		var data = google.visualization.arrayToDataTable([
          ['Tanggal', 'Jumlah login']
		  <?php
		  for($i = 1;$i<=30;$i++)
		  {
			  $countlog = 0;
			  $thisdate = '2016-12-'.$i.' 00:00:00';
			  $enddate = '2016/12/'.$i.' 23:59:59';
			  $countlog = mysqli_num_rows(mysqli_query($connection,"SELECT * FROM log WHERE tgllogin BETWEEN '$thisdate' AND '$enddate'"));
			  echo ",['$i',$countlog]";
		  }
		  ?>]);
        var options = {
          title: 'Grafik login bulan Desember 2016',
		  legend:{position:'bottom'},
		  height:600
        };
		var chart = new google.visualization.LineChart(document.getElementById('graflogtm'));
		chart.draw(data, options);
}
</script>
</head>
<body>
<h2>Laporan Elibra</h2>
<div id="graflog">
</div>
<div id="graflogtm">
</div>