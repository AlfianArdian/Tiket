<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('layout/meta'); ?>
	<title>Home - Hastowo AP Travel</title>
	<?php $this->load->view('layout/css'); ?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
</head>
<body>

<?php $this->load->view('layout/header'); ?>

<div class="container-fluid">
	<div class="row bg-img" id="header">
		<div class="section p-relative tp-30">
			<div class="col-md-7 font-black">
				<h1 class="font-bold font-xl">Hastowo AP Travel</h1>
				<p class="font-regular font-md">Pemesanan Tiket Pesawat dan Kapal</p>
			</div>
		</div>
		<div class="section p-relative">	
			<div class="col-md-12 bg-white font-black">
				<?php echo form_open(base_url('search/result'), 'class="form-inline col-ce"'); ?>
					<div class="col-md-3">
						<select name="kota_asal" class="form-control input-cus">
							<option>Pilih Kota Asal</option>
							<?php
								foreach($allAsal as $row) {
									echo '<option>'.$row->keberangkatan.'</option>';
								}
							?>
						</select>
					</div>
					<div class="col-md-3">
						<select name="kota_tujuan" class="form-control input-cus">
							<option>Pilih Kota Tujuan</option>
							<?php
								foreach($allTujuan as $row) {
									echo '<option>'.$row->tujuan.'</option>';
								}
							?>
						</select>
					</div>
					<div class="col-md-3">
						<input class="form-control input-cus" placeholder="Pilih Tanggal" name="tgl_keberangkatan" type="text" id="datepicker">
					</div>
					<div class="col-md-3">
						<input type="submit" value="Cari Penerbangan" class="btn bg-purple btn-lg">	
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<div class="section p-relative">	
			<div class="col-md-12 bg-white mt-1 font-black">
				<?php echo form_open(base_url('search/resultKapal'), 'class="form-inline col-ce"'); ?>
					<div class="col-md-3">
						<select name="pelabuhan_asal" class="form-control input-cus">
							<option>Pelabuhan Asal</option>
							<?php
								foreach($allKapalAsal as $row) {
									echo '<option>'.$row->pelabuhan_asal.'</option>';
								}
							?>
						</select>
					</div>
					<div class="col-md-3">
						<select name="pelabuhan_tujuan" class="form-control input-cus">
							<option>Pelabuhan Tujuan</option>
							<?php
								foreach($allKapalTujuan as $row) {
									echo '<option>'.$row->pelabuhan_tujuan.'</option>';
								}
							?>
						</select>
					</div>
					<div class="col-md-3">
						<input class="form-control input-cus" placeholder="Pilih Tanggal" name="tgl_keberangkatan" type="text" id="datepickerKapal">
					</div>
					<div class="col-md-3">
						<input type="submit" value="Cari Kapal" class="btn bg-purple btn-lg">	
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	
	</div>
	
	<div class="row bg-img" id="rentyour">
		<div class="section font-white">
			<div class="col-md-9">
				<h2 class="font-lg font-bold">Jasa dan Layanan</h2><br>
				<p class="font-md font-medium">Hastowo AP Travel adalah jasa yang menjual tiket pesawat maupun kapal antar provinsi maupun pulau.</p><br>
				<a>CONTACT US</a>
			</div>
		</div>
	</div>
	

</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
	<script>
		$('#datepicker').datepicker({
			format: 'yyyy-mm-dd',
			startDate: '+1d',
			todayHighlight: true
		});
		$('#datepickerKapal').datepicker({
			format: 'yyyy-mm-dd',
			startDate: '+1d',
			todayHighlight: true
		});
	</script>
	<?php $this->load->view('layout/js'); ?>
</body>
</html>