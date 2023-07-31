<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Product
            <small>Product UMKM</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">

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
                                    <?php
                                    foreach ($kriteria as $k) {
                                    ?>
                                        <th><?= $k->kriteria_nama ?></th>
                                    <?php
                                    }
                                    ?>
                                    <th width="10%">OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($produk as $p) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $p->produk_nama; ?></td>
                                        <!-- <td><?php echo $k->jenis_nama; ?></td> -->
                                        <?php foreach ($nilai as $i) {
                                            if ($i->produk_id == $p->produk_id) { ?>
                                                <td>
                                                    <?php
                                                    if ($i->sub_nama != null) {
                                                        echo "[" . $i->sub_nilai ?>]
                                                <?php  } ?>
                                                </td>

                                        <?php }
                                        } ?>
                                        <!-- <td><?php echo $k->sub_nama; ?></td>
                                        <td><?php echo $k->sub_nilai; ?></td> -->
                                        <td>
                                            <a href="<?php echo base_url() . 'dashboard/nilai_edit/' . $p->produk_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                                            <!-- <a href="<?php echo base_url() . 'dashboard/product_hapus/' . $p->produk_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a> -->
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