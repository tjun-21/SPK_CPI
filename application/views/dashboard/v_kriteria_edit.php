<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Kriteria
			<small>Edit Kriteria Penilaian</small>
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

						<?php foreach ($kriteria as $k) { ?>

							<form method="post" action="<?php echo base_url('dashboard/kriteria_update') ?>">
								<div class="box-body">
									<div class="form-group">
										<label>Nama Kriteria</label>
										<input type="hidden" name="id" value="<?php echo $k->kriteria_id; ?>">
										<input type="text" name="kriteria" class="form-control" placeholder="Masukkan nama kriteria .." value="<?php echo $k->kriteria_nama; ?>">
										<?php echo form_error('kriteria'); ?>
									</div>
								</div>

								<div class="box-footer">
									<input type="submit" class="btn btn-success" value="Update">
								</div>
							</form>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

	</section>

</div>