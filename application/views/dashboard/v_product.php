<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Product
            <small>Product UMKM</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-9">

                <a href="<?php echo base_url() . 'dashboard/product_tambah'; ?>" class="btn btn-sm btn-primary">+ Produk Baru</a>

                <br />
                <br />

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Produk</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>Nama Produk</th>
                                    <th>Jenis Produk</th>
                                    <th>Description</th>
                                    <td width="10%">Foto Produk</td>
                                    <th width="10%">OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($product as $k) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $k->produk_nama; ?></td>
                                        <td><?php echo $k->jenis_nama; ?></td>
                                        <td><?php echo substr($k->produk_description, 0, 20); ?>....</td>
                                        <?php
                                        if ($k->produk_foto != null) { ?>
                                            <td><img width="100%" class="img-responsive" src="<?php echo base_url() . '/gambar/produk/' . $k->produk_foto; ?>"></td>
                                        <?php } else { ?>
                                            <td><img width="100%" class="img-responsive" src="<?php echo base_url() . '/gambar/produk/jangandihapus.jpg' ?>"></td>
                                        <?php } ?>
                                        <td>
                                            <a href="<?php echo base_url() . 'dashboard/product_edit/' . $k->produk_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                                            <a href="<?php echo base_url() . 'dashboard/product_hapus/' . $k->produk_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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