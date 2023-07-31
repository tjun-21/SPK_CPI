<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Produk
            <small>Edit Produk UMKM</small>
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
                        <h3 class="box-title">Edit Produk UMKM</h3>
                    </div>
                    <div class="box-body">

                        <?php foreach ($product as $k) { ?>

                            <form method="post" action="<?php echo base_url('dashboard/product_update') ?>" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="hidden" name="id" value="<?php echo $k->produk_id; ?>">
                                        <input type="text" name="produk" class="form-control" placeholder="Masukkan nama Produk .." value="<?php echo $k->produk_nama; ?>">
                                        <?php echo form_error('produk'); ?>
                                    </div>
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
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <?php echo form_error('desc'); ?>
                                        <br />
                                        <textarea class="form-control" id="editor" name="desc"> <?php echo $k->produk_description; ?> </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Gambar Produk</label>
                                    <input type="file" name="sampul">
                                    <small>Kosongkan jika tidak ingin mengubah logo</small>
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