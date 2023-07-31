<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Kriteria
			<small>Tambah Kriteria Penilaian</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url() . 'dashboard/kriteria'; ?>" class="btn btn-sm btn-primary">Kembali</a><br /><br />
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Kriteria</h3>
					</div>
					<div class="box-body">
						<form method="post" action="<?php echo base_url('dashboard/kriteria_aksi') ?>">
							<div class="box-body">
								<div class="form-group">
									<label>Nama Kriteria</label>
									<input type="text" name="kriteria" class="form-control" placeholder="Masukkan nama kriteria ..">
									<?php echo form_error('kriteria'); ?>
								</div>
								<div class="form-group">
									<label>Bobot Kriteria (1% = 0,01)</label>
									<input type="text" name="bobot" class="form-control" placeholder="Masukkan Bobot kriteria ..">
									<?php echo form_error('bobot'); ?>
								</div>
							</div>
							<div class="box-footer">
								<input type="submit" class="btn btn-success" value="Simpan">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>