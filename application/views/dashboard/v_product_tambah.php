<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Produk
            <small>Produk UMKM</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-6">
                <a href="<?php echo base_url() . 'dashboard/product'; ?>" class="btn btn-sm btn-primary">Kembali</a>

                <br />
                <br />

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Produk Baru</h3>
                    </div>
                    <div class="box-body">


                        <form method="post" action="<?php echo base_url('dashboard/product_aksi') ?>" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Produk ..">
                                    <?php echo form_error('nama'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Product</label>
                                    <select class="form-control" name="jenis">
                                        <option value="">- Pilih Jenis Produk</option>
                                        <?php foreach ($jenis as $j) { ?>
                                            <option value="<?php echo $j->jenis_id ?>"><?php echo $j->jenis_nama; ?></option>
                                        <?php } ?>
                                    </select>

                                    <br />
                                    <?php echo form_error('jenis'); ?>
                                </div>
                                <?php
                                foreach ($kriteria as $k) { ?>
                                    <div class="form-group">
                                        <label>Nilai <?= $k->kriteria_nama ?> </label>
                                        <select class="form-control" name=<?= $k->kriteria_id ?>>
                                            <option value="">- Pilih Nilai</option>
                                            <?php foreach ($sub as $s) {
                                                if ($k->kriteria_id == $s->kriteria_id) { ?>
                                                    <option <?php if (set_value($k->kriteria_nama) == $s->sub_id) {
                                                                echo "selected='selected'";
                                                            } ?> value="<?php echo $s->sub_id ?>"><?php echo " [ " . $s->sub_nilai . " ] " . $s->sub_nama; ?></option>
                                                <?php } ?>


                                            <?php } ?>
                                        </select>

                                        <br />
                                        <?php echo form_error($k->kriteria_id); ?>
                                    </div>
                                <?php }
                                ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <?php echo form_error('desc'); ?>
                                        <br />
                                        <textarea class="form-control" id="editor" name="desc"> <?php echo set_value('desc'); ?> </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Gambar Produk</label>
                                    <input type="file" name="sampul">
                                    <small>Kosongkan jika tidak ingin mengubah gambar produk</small>
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