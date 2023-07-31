<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Sistem Pendukung Keputusan </h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Menggunakan Metode Composite Performance Index (CPI)</h2>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="<?php echo base_url(); ?>gambar/system/pnl.png" class="img-fluid" alt="" width="75%">
            </div>
        </div>
    </div>

</section><!-- End Hero -->


<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">


        <div data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content border">
                        <h3>Makanan</h3>
                        <table class="table table-striped table-bordered" id="tabeldata">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama Barang</th>
                                    <th>Foto</th>
                                    <th>Rank</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($produk as $p) {

                                ?>

                                    <tr>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td width="60%"><?= $p->produk_nama ?> </td>
                                        <?php
                                        if ($p->produk_foto != null) { ?>
                                            <td><img width="100%" class="img-responsive" src="<?php echo base_url() . '/gambar/produk/' . $p->produk_foto; ?>"></td>
                                        <?php } else { ?>
                                            <td><img width="100%" class="img-responsive" src="<?php echo base_url() . '/gambar/produk/jangandihapus.jpg' ?>"></td>
                                        <?php } ?>
                                        <td width="10%"><?= $p->produk_rank ?></td>
                                        <td>
                                            <a id="detail" class="btn btn-sm fa fa-eye bg-dark text-light mt-2" data-toggle="modal" data-target="#modal-detail" data-produkid="<?= $p->produk_id ?>" data-produknama="<?= $p->produk_nama ?>" data-produkhasil="<?= $p->produk_hasil ?>" data-produkrank="<?= $p->produk_rank ?>" data-produkdesc="<?= $p->produk_description ?>">view</a>
                                        </td>

                                    </tr>
                                <?php  } ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class=" col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content border">
                        <h3>KERAJINAN TANGAN</h3>
                        <table class="table table-striped table-bordered" id="tabeldata2">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama Barang</th>
                                    <th>Foto</th>
                                    <th>Rank</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($produk2 as $p) {

                                ?>

                                    <tr>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td width="60%"><?= $p->produk_nama ?> </td>
                                        <?php
                                        if ($p->produk_foto != null) { ?>
                                            <td><img width="100%" class="img-responsive" src="<?php echo base_url() . '/gambar/produk/' . $p->produk_foto; ?>"></td>
                                        <?php } else { ?>
                                            <td><img width="100%" class="img-responsive" src="<?php echo base_url() . '/gambar/produk/jangandihapus.jpg' ?>"></td>
                                        <?php } ?>
                                        <td width="10%"><?= $p->produk_rank ?></td>
                                        <td>
                                            <a id="detail" class="btn btn-sm fa fa-eye bg-dark text-light mt-2" data-toggle="modal" data-target="#modal-detail" data-produkid="<?= $p->produk_id ?>" data-produknama="<?= $p->produk_nama ?>" data-produkhasil="<?= $p->produk_hasil ?>" data-produkrank="<?= $p->produk_rank ?>" data-produkdesc="<?= $p->produk_description ?>" data-produkfoto="<?= $p->produk_foto ?>">View</a>
                                        </td>

                                    </tr>
                                <?php  } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
    <!-- End About Section -->
</main>
<!-- End #main -->

<!-- modal detail  -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-left">Detail Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="post-box">
                <div class="post-meta">
                    <h1 class="article-title"><span id="produk_nama"></span></h1>
                    <ul>
                        <li>Rank Produk :
                            <span class="ion-ios-person" id="produk_rank"></span>

                        </li>
                        <li>Nilai Produk :
                            <span class="ion-pricetag" id="produk_hasil"></span>

                        </li>
                        <!-- <li>Foto Produk :
                            <span class="ion-pricetag" id="produk_foto"></span>

                        </li> -->
                    </ul>
                </div>
                <div class="article-content">
                    <div class="container">
                        <h3>Deskripsi Produk</h3>
                        <span id="produk_desc"></span>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Id Produk</th>
                            <td><span id="produk_id"></span></td>
                        </tr>
                        <tr>
                            <th>Nama Produk</th>
                            <td><span id="produk_nama"></span></td>
                        </tr>
                        <tr>
                            <th>Ranking Produk</th>
                            <td><span id="produk_rank"></span></td>
                        </tr>
                        <tr>
                            <th>Nilai Produk</th>
                            <td><span id="produk_hasil"></span></td>
                        </tr>
                        <tr>
                            <th>Deskripsi Produk</th>
                            <td><span id="produk_desc"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div> -->
        </div>
    </div>
</div>
<!-- end modal  -->