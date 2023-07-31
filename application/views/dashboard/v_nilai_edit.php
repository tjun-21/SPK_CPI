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
                <a href="<?php echo base_url() . 'dashboard/nilai'; ?>" class="btn btn-sm btn-primary">Kembali</a>

                <br />
                <br />

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Produk Baru</h3>
                    </div>
                    <div class="box-body">

                        <?php
                        foreach ($produk as $k) { ?>


                            <form method="post" action="<?php echo base_url('dashboard/nilai_aksi') ?>">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="hidden" name="id" value="<?php echo $k->produk_id; ?>">
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Produk .." value="<?= $k->produk_nama ?>">
                                        <?php echo form_error('nama'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis</label>
                                        <select class="form-control" name="jenis">
                                            <option value="">- Pilih Jenis Produk</option>
                                            <?php foreach ($jenis as $j) { ?>
                                                <option <?php if ($k->produk_jenis == $j->jenis_id) {
                                                            echo "selected='selected'";
                                                        } ?> value="<?php echo $j->jenis_id ?>"><?php echo $j->jenis_nama; ?></option>
                                            <?php } ?>
                                        </select>

                                        <br />
                                        <?php echo form_error('jenis'); ?>
                                    </div>
                                    <?php
                                    foreach ($nilai as $n) { ?>
                                        <div class="form-group">
                                            <label>Nilai <?= $n->kriteria_nama ?> <?= "[" . $n->sub_nilai . "]"  ?> </label>
                                            <select class="form-control" name=<?= $n->kriteria_id ?>>
                                                <option value="">- Pilih Nilai</option>

                                                <?php foreach ($sub as $s) {
                                                    if ($n->kriteria_id == $s->kriteria_id) {
                                                ?>
                                                        <option <?php if (set_value($n->kriteria_nama) == $s->sub_id) {
                                                                    echo "selected='selected'";
                                                                } ?> value="<?php echo $s->sub_id ?>"><?php echo " [ " . $s->sub_nilai . " ] " . $s->sub_nama; ?>
                                                        </option>

                                                <?php }
                                                }
                                                ?>
                                            </select>

                                            <br />
                                            <?php echo form_error($n->kriteria_id); ?>
                                        </div>
                                    <?php }
                                    ?>
                                </div>

                                <div class="box-footer">
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                </div>
                            </form>
                        <?php }
                        ?>

                    </div>
                </div>

            </div>
        </div>

    </section>

</div>