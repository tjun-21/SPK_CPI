<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Sub Kriteria
			<small>Manajemen Sub Kriteria</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">

				<a href="<?php echo base_url() . 'dashboard/sub_tambah'; ?>" class="btn btn-sm btn-primary">Buat Nilai Sub baru</a>

				<br />
				<br />

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">SUB KRITERIA</h3>
					</div>
					<div class="box-body">

						<div class="table-responsive">
							<table class="table table-striped table-bordered" id="sub">
								<thead>
									<tr>
										<th width="1%" rowspan="2">NO</th>
										<th>Nama Kriteria</th>
										<th>Nama Sub Kriteria</th>
										<th>Nilai</th>
										<th width="15%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($sub as $a) {
									?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?= $a->kriteria_nama ?></td>
											<td><?php echo $a->sub_nama; ?></td>
											<td><?php echo $a->sub_nilai ?></td>

											<td>
												<a href="<?php echo base_url() . 'dashboard/sub_edit/' . $a->sub_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
												<a href="<?php echo base_url() . 'dashboard/sub_hapus/' . $a->sub_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>

	</section>

</div>