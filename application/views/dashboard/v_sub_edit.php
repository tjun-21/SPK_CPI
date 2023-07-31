<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Sub Kriteria
			<small>Edit Sub Kriteria Produk</small>
		</h1>
	</section>

	<section class="content">

		<a href="<?php echo base_url() . 'dashboard/sub_kriteria'; ?>" class="btn btn-sm btn-primary">Kembali</a>

		<br />
		<br />

		<?php foreach ($sub as $a) { ?>

			<form method="post" action="<?php echo base_url('dashboard/sub_update') ?>" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-9">

						<div class="box box-primary">
							<div class="box-body">

								<div class="box-body">
									<div class="form-group">
										<label>Nama Sub</label>
										<input type="hidden" name="id" value="<?php echo $a->sub_id; ?>">
										<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Sub Kriteria ..." value="<?php echo $a->sub_nama; ?>">

										<br />
										<?php echo form_error('nama'); ?>
									</div>
									<div class="form-group">
										<label>Kriteria</label>
										<select class="form-control" name="kriteria">
											<option value="">- Pilih Kriteria</option>
											<?php foreach ($kriteria as $j) { ?>
												<option <?php if ($a->kriteria_id == $j->kriteria_id) {
															echo "selected='selected'";
														} ?> value="<?php echo $j->kriteria_id ?>"><?php echo $j->kriteria_nama; ?></option>
											<?php } ?>
										</select>

										<br />
										<?php echo form_error('kriteria'); ?>
									</div>

									<div class="form-group">
										<label>Nilai Sub Kriteria (1 -3)</label>
										<input type="number" min="0" max="3" name="nilai" class="form-control" placeholder="Masukkan Nilai SUb" value="<?= $a->sub_nilai ?>">
										<br />
										<?php echo form_error('nilai'); ?>
									</div>



									<input type="submit" value="Update" class="btn btn-success btn-block">
								</div>
							</div>
						</div>

					</div>


				</div>
			</form>
		<?php } ?>

	</section>

</div>