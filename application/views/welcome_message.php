
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Egri Roma Szakkollégium</title>
</head>
<body class="bg-light">

<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="bg-dark container shadow-sm text-white rounded mt-4 p-1">
	<h6 class="my-2 mx-2"> <?php echo lang('welcome_message_title') ?> </h6>
</div>

<?php if ($this->ion_auth->logged_in()): ?>
	<div class="container border shadow-sm rounded mt-3 bg-white p-2">
		<p class="text-secondary m-2">
		 <?php echo $this->ion_auth->user()->row()->last_name?> sikeresen bejelentkezett.
		</p>
	</div>

<?php if ($this->ion_auth->is_admin()): ?>
	<div class="bg-dark container shadow-sm text-white rounded mt-4 p-1">
		<h6 class="my-2 mx-2">Kimutatások</h6>
	</div>


	<div class="container mt-3">
		<div class="row mb-2">

			<div class="col-md bg-white data-box rounded border p-4">

				<div class="row ">
					<div class="col-lg-9">
						<h6 class="text-dark"> Succesfull Presentations </h6>
						<h2 class="presenting-number fw-bold"><?=count($successfull_presentations)?> db </h2>
					</div>
					<div class="col-lg-3">
						<a href="#"><h1 class="fas fa-check-square text-success mt-4"></h1></a>
					</div>
				</div>
				<div class="row ">
					<?php
						$all_presentations = count($successfull_presentations) + count($not_successfull_presentations) + count($waiting_presentations) + count($not_waiting_presentations);
						$percent = (count($successfull_presentations) / $all_presentations) * 100;
						?>
					<h6 class="text-secondary presenting-number mt-5"><?=$percent?> %</h6>
					<div class="">
						<div class="progress" style="height: 22px">
							<div class="progress-bar bg-info" style="width:<?=$percent?>%;height:22px;"></div>
						</div>
					</div>
				</div>

			</div>

			<div class="col-md bg-white data-box rounded border p-4">

				<div class="row ">
					<div class="col-lg-9">
						<h6 class="text-dark"> Unsuccesfull Presentations </h6>
						<h2 class="presenting-number fw-bold"><?=count($not_successfull_presentations)?> db </h2>
					</div>
					<div class="col-lg-3">
						<a href="#"><h1 class="fas fa-times text-danger mt-4"></h1></a>
					</div>
				</div>
				<div class="row ">
					<?php
						$all_presentations = count($not_successfull_presentations) + count($not_successfull_presentations) + count($waiting_presentations) + count($not_waiting_presentations);
						$percent = (count($not_successfull_presentations) / $all_presentations) * 100;
						?>
					<h6 class="text-secondary presenting-number mt-5"><?=$percent?> %</h6>
					<div class="">
						<div class="progress" style="height:22px">
							<div class="progress-bar bg-info" style="width:<?=$percent?>%;height:22px;"></div>
						</div>
					</div>
				</div>

			</div>

			<div class="col-md bg-white data-box rounded border p-4">

				<div class="row ">
					<div class="col-lg-9">
						<h6 class="text-dark"> Waiting for Approval </h6>
						<h2 class="presenting-number fw-bold"><?=count($waiting_presentations)?> db </h2>
					</div>
					<div class="col-lg-3">
						<a href="#"><h2 class="fas fa-question text-warning mt-4"></h2></a>
					</div>
				</div>
				<div class="row ">
					<?php
						$all_presentations = count($waiting_presentations) + count($not_successfull_presentations) + count($waiting_presentations) + count($not_waiting_presentations);
						$percent = (count($waiting_presentations) / $all_presentations) * 100;
						?>
					<h6 class="text-secondary presenting-number mt-5"><?=$percent?> %</h6>
					<div class="">
						<div class="progress" style="height:22px">
							<div class="progress-bar bg-info" style="width:<?=$percent?>%;height:22px;"></div>
						</div>
					</div>
				</div>

			</div>

			<div class="col-md bg-white data-box rounded border p-4">

				<div class="row ">
					<div class="col-lg-9">
						<h6 class="text-dark"> Approved Presentations </h6>
						<h2 class="presenting-number fw-bold"> <?=count($not_waiting_presentations)?> db </h2>
					</div>
					<div class="col-lg-3">
						<a href="#"><h1 class="fas fa-calendar-check text-info mt-4"></h1></a>
					</div>
				</div>
				<div class="row ">
					<?php
						$all_presentations = count($not_waiting_presentations) + count($not_successfull_presentations) + count($waiting_presentations) + count($not_waiting_presentations);
						$percent = (count($not_waiting_presentations) / $all_presentations) * 100;
						?>
					<h6 class="text-secondary presenting-number mt-5"><?=$percent?> %</h6>
					<div class="">
						<div class="progress" style="height:22px">
							<div class="progress-bar bg-info" style="width:<?=$percent?>%;height:22px;"></div>
						</div>
					</div>
				</div>

			</div>

		</div>

		<div class="row ">
			<div class="col-md-9  bg-white big-data-box rounded border p-3">
				<!-- google chart solution
				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    		<script type="text/javascript">
      		google.charts.load('current', {'packages':['corechart']});
      		google.charts.setOnLoadCallback(drawChart);

      		function drawChart() {
        		var data = google.visualization.arrayToDataTable([
          		['Év', 'Felvett tagok'],
          		['2004',  3],
          		['2005',  4],
          		['2006',  2],
          		['2007',  5],
							['2008',  3],
          		['2009',  4],
          		['2010',  6],
          		['2011',  5],
        		]);

        		var options = {
          		title: 'Tagok felvétele',
          		//curveType: 'function',
          		legend: { position: 'none' }
        		};

        		var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        		chart.draw(data, options);
      		}
					$(window).resize(function(){
  					drawChart();
					});
    		</script>
				<div id="curve_chart" class="" style="width: 100%; height: 100%"></div>
			-->

			<!-- SVG solution with Vue.js -->

			<h6 class="fw-bold">Felvett tagok évente</h6> <br>
			<?php
			$datas = [4,2,2,1,3,4,2,3,7,2,6,2,6,6,2,9,5,2,5,2,7,2,5,2,7,4,8,5,2,4,6];
			echo '<svg  viewBox="0 0 900 ' . (count($datas) * 30 + 30) . '">';
			$max_width = max($datas);

			echo ' <g> <line x1="50" y1="0" x2="50" y2="'.(count($datas) * 30 + 30).'" style="stroke:#145a85;stroke-width:1">  </line> </g>';
			echo ' <g> <line x1="0" y1="'.(count($datas) * 30).'" x2="900" y2="'.(count($datas) * 30).'" style="stroke:#145a85;stroke-width:1">  </line> </g>';

			for ($i = 0; $i < count($datas); $i++) {
				echo '<g>';
				echo '<text fill="black" y="' . (($i * 30) + 15) . '" x="0">' . ($i + 2010 ) . '</text>';
				echo '<rect x="60" rx="5" ry="5" fill="#0dcaf0" height="20" width="' . ( 800 / $max_width * $datas[$i]) . '" y="' . $i * 30 . '"/>';
				echo '<text fill="black" y="' . (($i * 30) + 15) . '" x="'. (800 / $max_width * $datas[$i] + 70) .'" font-weight="bold">' . $datas[$i] . ' db </text>';
				echo '</g>';

				echo '<g>';
				echo '<text fill="black" y="'. (count($datas) * 30 + 25) .'" x="' . (800 / $max_width * $i + 70) . '">' . $i . '</text>';
				echo '</g>';
			}

			?>
			</svg>

			</div>
			<div class="col-md-3 ">
				<div class="row bg-white data-box rounded border">

				</div>
				<div class="row bg-white data-box rounded border">

				</div>
			</div>
		</div>
	</div>

<?php elseif ($this->ion_auth->in_group(['admin-helper'], false, false)) : ?>
	<div class="container border shadow-sm rounded mt-3 bg-white p-2">
	 <p class="text-secondary m-2">	Ön Admin Segéd-ként van bejelentkezve.</p>
	</div>
<?php else : ?>
	<div class="bg-dark container shadow-sm text-white rounded mt-4 p-1">
		<h6 class="my-2 mx-2">Felhasználó segédlet</h6>
	</div>

	<div class="container border shadow-sm rounded mt-3 bg-white p-3">
	 <h6>Hogyan kezdjek neki?</h6>
	 <ol class="list-group">
	 	<li class="text-secondary list-group-item">
			1. Amikor eldöntötted, hogy előadást fogsz tartani egy intézménynél, ellenőrzid le, hogy az intézmény már benne van-e az adatbázisban!
		</li>
		<li class="list-group-item text-secondary ms-5">
			1.1 Amennyiben nincs, kis kutatómunkát kell végezned, összegyűjteni az intézmény adatait, és hozzáadni az intézmények listánál.
		</li>
		<li class="list-group-item text-secondary ms-5">
			1.2 Ha az általad kiválasztott intézményt már felvitte valaki, akkor hozzáadhatod az előadásodat!
		</li>
		<li class="text-secondary list-group-item border">
			2. Az <a href="/institution/list">előadások</a> pont alatt, add meg az előadás nevét, dátumát, állapotát, és válaszd ki a legördülű listából, hogy melyik intézménybe fogsz menni!
		</li>
		<li class="text-secondary list-group-item ">
			3. Ha felvitted az előadást, még nem vagy kész. Menj az előadás nevénél az <h5 class="fas fa-info-circle text-info"></h5> ikonra, és rendeld hozzá az előadáshoz a tagokat akik részt fognak venni rajta!
			Ezt nem csak az előadásnál, de egy Tag részletes adatainál is megteheted!
		</li>
		<li class="list-group-item text-secondary ms-5">
			3.1 Ha valamilyen oknál fogja nincs a neved a <a href="/member/list">Tag</a> listában, keress fel egy Adminisztrátort, vagy Adminisztrátor segédet!
		</li>
		<li class="text-secondary list-group-item border">
			4. Ha változott az előadásod állapota (Teljesítetted, vagy visszaszóltak hogy nem mehetsz stb.) akkor az előadás <h5 class="fas fa-edit text-info"></h5> (szerkesztés) ikonjára kattintva, módosítsd az előadás állapotát.
		</li>
	 </ol>
	</div>
<?php endif; ?>
<?php else : ?>
	<div class="container border shadow-sm rounded mt-3 bg-white p-2">
		<p class="text-secondary m-2">
			<?php echo lang('welcome_message') ?>
		</p>
	</div>
<?php endif; ?>


</body>
</html>

<style>




</style>
