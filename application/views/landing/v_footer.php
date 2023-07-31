<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <!-- <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    </div>
                    <div class="col-lg-6">
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="assets/img/logo.png" alt="">
                            <span>FlexStart</span>
                        </a>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Contact Us</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>

                    </div>

                </div>
            </div>
        </div> -->

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>TeknikInformatikaPNL</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
            Designed by <a href="#">Mhs@TeknikInformatikaPNL</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/aos/aos.js"></script>
<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url(); ?>assets_frontend/assets/js/main.js"></script>
<link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.5/datatables.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.5/datatables.min.js"></script>
<link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.5/rg-1.4.0/sc-2.2.0/datatables.min.css" rel="stylesheet" />

<!-- <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.5/rg-1.4.0/sc-2.2.0/datatables.min.js"></script> -->
<script>
    $(document).ready(function() {
        $('#tabeldata').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#tabeldata2').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        // Show the modal when "Open Modal" button is clicked
        $('#myModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            // You can customize this part to load dynamic data from the server
            var modalTitle = button.data('title'); // Extract info from data-* attributes
            var modalBody = button.data('content');

            var modal = $(this);
            modal.find('.modal-title').text(modalTitle);
            modal.find('.modal-body').html(modalBody);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#detail', function() {
            var produkid = $(this).data('produkid');
            var produknama = $(this).data('produknama');
            var produkhasil = $(this).data('produkhasil');
            var produkrank = $(this).data('produkrank');
            var produkdescription = $(this).data('produkdesc');
            var produkfoto = $(this).data('produkfoto');
            // var suratdistribusi = $(this).data('suratdistribusi');
            // var suratstatus = $(this).data('suratstatus');
            // var suratsifat = $(this).data('suratsifat');
            // var suratdis = $(this).data('suratdis');
            // var suratkategori = $(this).data('suratkategori');


            $('#produk_nama').text(produknama);
            $('#produk_id').text(produkid);
            $('#produk_hasil').text(produkhasil);
            $('#produk_rank').text(produkrank);
            $('#produk_desc').text(produkdescription);
            $('#produk_foto').text(produkfoto);
            // $('#surat_distribusi').text(suratdistribusi);
            // $('#surat_status').text(suratstatus);
            // $('#surat_dis').text(suratdis);
            // $('#surat_sifat').text(suratsifat);
            // $('#surat_kategori').text(suratkategori);

        })
    })
</script>
<script src="<?php echo base_url() ?>assets/bower_components/ckeditor/ckeditor.js"></script>
<script>
    $(function() {
        CKEDITOR.replace('editor')
    });
</script>

</body>

</html>