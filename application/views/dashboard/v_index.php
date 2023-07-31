<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?php echo $produk ?></h3>

                        <p>Data Produk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-list"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-12">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $jenis ?></h3>

                        <p>Jenis Produk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-list"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-12">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $makanan ?></h3>

                        <p>Data Makanan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-12">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $kerajinan ?></h3>

                        <p>Kerajinan Tangan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $kriteria . "/" . $sub ?></h3>

                        <p>Kriteria / Sub Kriteria</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-3 content-header">
                <h1>
                    Grafik
                    <small>Jumlah Produk Berdasarkan Jenis</small>
                </h1>
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-6 content-header text-center">
                <h1>
                    Grafik
                    <small>Jumlah Sub Kriteria Berdasarkan Kriteria</small>
                </h1>
                <canvas id="barchart"></canvas>
            </div>
        </div>
    </section>
</div>