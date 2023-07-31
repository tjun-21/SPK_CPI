<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Metode
            <small>Composite Performance Index</small>
        </h1>
    </section>
    <section class="content">
        <div class="container">
            <div class="col-md-12 col-s-12 col-xs-12">
                <div class="row">
                    <div class="content-header text-center">
                        <h3>Data
                            <small>Awal</small>
                        </h3>
                    </div>
                    <table class="table table-striped table-bordered" id="tabeldata">
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

                                    <?php foreach ($nilai as $i) {
                                        if ($i->produk_id == $p->produk_id) { ?>
                                            <td><?php echo $i->sub_nilai ?></td>

                                    <?php }
                                    } ?>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <hr>

                <div class="row">
                    <div class="content-header text-center">
                        <h3>Normalisasi
                            <small>Data jenis makanan</small>
                        </h3>
                    </div>
                    <table class="table table-striped table-bordered" id="normalisasi1">
                        <thead>
                            <tr>
                                <th width="1%">NO</th>
                                <th>Nama</th>
                                <?php
                                foreach ($kriteria as $k) {
                                ?>
                                    <th><?= $k->kriteria_nama ?></th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $t = 1;
                            $id = 0;
                            for ($i = 0; $i < $j_produk; $i++) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <?php
                                    foreach ($produk as $k) {
                                        for ($t = 0; $t < count($dataid); $t++) {
                                            if ($k->produk_id == $dataid[$i]) { ?>
                                                <td><?php echo $k->produk_nama; ?></td>

                                                <?php
                                                for ($j = 0; $j < $j_kriteria; $j++) { ?>
                                                    <td><?= $normalisasi[$i][$j] ?></td>
                                        <?php
                                                }
                                            }
                                            break;
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
                <hr>

                <div class="row">
                    <div class="content-header text-center">
                        <h3>Normalisasi
                            <small>Data jenis Kerajinan Tangan</small>
                        </h3>
                    </div>
                    <table class="table table-striped table-bordered" id="normalisasi2">
                        <thead>
                            <tr>
                                <th width="1%">NO</th>
                                <th>Nama</th>
                                <?php
                                foreach ($kriteria as $k) {
                                ?>
                                    <th><?= $k->kriteria_nama ?></th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $t = 1;
                            $id = 0;
                            for ($i = 0; $i < $j_produk2; $i++) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <?php
                                    foreach ($produk as $k) {
                                        for ($t = 0; $t < count($dataid2); $t++) {
                                            if ($k->produk_id == $dataid2[$i]) { ?>
                                                <td><?php echo $k->produk_nama; ?></td>

                                                <?php
                                                for ($j = 0; $j < $j_kriteria; $j++) { ?>
                                                    <td><?= $normalisasi2[$i][$j] ?></td>
                                        <?php
                                                }
                                            }
                                            break;
                                        }
                                        ?>

                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
                <hr>

                <div class="row">
                    <div class="content-header text-center">
                        <h3>Bobot x Normalisasi
                            <small>Data jenis makanan</small>
                        </h3>
                    </div>
                    <table class="table table-bordered" id="bobotnormal1">
                        <thead>
                            <tr>
                                <th width="1%">NO</th>
                                <th>Nama</th>
                                <?php
                                foreach ($kriteria as $k) {
                                ?>
                                    <th><?= $k->kriteria_nama ?></th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $t = 1;
                            for ($i = 0; $i < $j_produk; $i++) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <?php
                                    foreach ($produk as $k) {
                                        for ($t = 0; $t < count($dataid); $t++) {
                                            if ($k->produk_id == $dataid[$i]) { ?>
                                                <td><?php echo $k->produk_nama; ?></td>

                                                <?php
                                                for ($j = 0; $j < $j_kriteria; $j++) { ?>
                                                    <td><?= $bobotxmatriks[$i][$j] ?></td>
                                        <?php
                                                }
                                            }
                                            break;
                                        }
                                        ?>

                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="content-header text-center">
                        <h3>Bobot x Normalisasi
                            <small>Data jenis Kerajinan Tangan</small>
                        </h3>
                    </div>
                    <table class="table table-bordered" id="bobotnormal1">
                        <thead>
                            <tr>
                                <th width="1%">NO</th>
                                <th>Nama</th>
                                <?php
                                foreach ($kriteria as $k) {
                                ?>
                                    <th><?= $k->kriteria_nama ?></th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $t = 1;
                            for ($i = 0; $i < $j_produk2; $i++) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <?php
                                    foreach ($produk as $k) {
                                        for ($t = 0; $t < count($dataid2); $t++) {
                                            if ($k->produk_id == $dataid2[$i]) { ?>
                                                <td><?php echo $k->produk_nama; ?></td>

                                                <?php
                                                for ($j = 0; $j < $j_kriteria; $j++) { ?>
                                                    <td><?= $bobotxmatriks2[$i][$j] ?></td>
                                        <?php
                                                }
                                            }
                                            break;
                                        }
                                        ?>

                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


                <div class="row">
                    <?php
                    for ($z = 1; $z <= 2; $z++) {
                        if ($z == 1) {
                            $judul = "Data jenis makanan";
                            $tabel = "hasil1";
                        } else {
                            $judul = "Data Kerajinan Tangan";
                            $tabel = "hasil2";
                        } ?>
                        <div class="content-header text-center">
                            <h3>Hasil
                                <small><?= $judul ?></small>
                            </h3>
                        </div>

                        <table class="table table-bordered table-striped" id="<?= $tabel ?>">
                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>Nama</th>
                                    <th>Hasil</th>
                                    <td>Rank</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $t = 1;

                                foreach (${'hasil' . $z} as $k) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $k->produk_nama ?></td>
                                        <td><?php echo $k->produk_hasil; ?></td>
                                        <td><?php echo $k->produk_rank; ?></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>

                    <?php }  ?>
                </div>
            </div>
        </div>

    </section>
</div>