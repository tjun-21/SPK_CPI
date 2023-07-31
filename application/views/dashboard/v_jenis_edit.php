<div class="content-wrapper">
    <section class="content-header">
        <h1>
            jenis
            <small>Edit jenis Produk</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-6">
                <a href="<?php echo base_url() . 'dashboard/jenis_produk'; ?>" class="btn btn-sm btn-primary">Kembali</a>
                <br />
                <br />
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit jenis produk</h3>
                    </div>
                    <div class="box-body">

                        <?php foreach ($jenis as $k) { ?>

                            <form method="post" action="<?php echo base_url('dashboard/jenis_update') ?>">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Nama jenis</label>
                                        <input type="hidden" name="id" value="<?php echo $k->jenis_id; ?>">
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama jenis produk .." value="<?php echo $k->jenis_nama; ?>">
                                        <?php echo form_error('nama'); ?>
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