<div class="content-wrapper">
    <section class="content-header">
        <h1>
            jenis
            <small>Tambah Jenis Produk</small>
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
                        <h3 class="box-title">Tambah jenis Produk Baru</h3>
                    </div>
                    <div class="box-body">
                        <form method="post" action="<?php echo base_url('dashboard/jenis_aksi') ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama jenis</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama jenis produk..">
                                    <?php echo form_error('nama'); ?>
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