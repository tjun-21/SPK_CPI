<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Kriteria
			<small>Kriteria Penilaiana</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-9">

				<!-- <a href="<?php echo base_url() . 'dashboard/kriteria_tambah'; ?>" class="btn btn-sm btn-primary">Tambah Kriteria Penilaian</a> -->
				<br />
				<br />
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Kriteria</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="1%">NO</th>
									<th>Nama Kriteria</th>
									<th width="10%">Bobot </th>
									<th>Tren</th>
									<th width="10%">OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($kriteria as $k) {
								?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $k->kriteria_nama; ?></td>
										<td><?php echo $k->bobot_kriteria; ?></td>
										<td> <strong>+</strong> </td>
										<td>
											<a href="<?php echo base_url() . 'dashboard/kriteria_edit/' . $k->kriteria_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<!-- <a href="<?php echo base_url() . 'dashboard/kriteria_hapus/' . $k->kriteria_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a> -->
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>


					</div>
				</div>

			</div>
		</div>

	</section>

</div>