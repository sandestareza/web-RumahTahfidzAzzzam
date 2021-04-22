<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?=$title; ?></title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url('assets/'); ?>css/styles.css" rel="stylesheet">
        <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/heading.css">
        <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/body.css">
        <!--icon web  -->
        <link rel="shortcut icon" href="<?= base_url('assets/img/rtaicon.ico'); ?>">
    </head>

<?php foreach($identitas as $id) : ?>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
            <div class="container"><a class="navbar-brand js-scroll-trigger" href="#page-top"><?=$id->judul; ?></a>
                <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu 
                    <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">GALERY</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">TENTANG KAMI</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">KONTAK KAMI</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="
                        <?=base_url('auth')?>">LOGIN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="assets/img/logorta.jpg" alt="">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading mb-0"><?=$id->judul; ?></h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="pre-wrap masthead-subheading font-weight-light mb-0"><?=$id->alamat;?></p>
            </div>
<?php endforeach; ?>
        </header>
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <div class="text-center">
                    <h2 class="page-section-heading text-secondary mb-0 d-inline-block">GALERY</h2>
                </div>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row">
                    <?php foreach($galeri as $id): ?>
                    <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div id="detail" class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1" 
                        data-galeri="<?=$id->galeri; ?>" 
                        data-ket="<?=$id->ket; ?>">
                            <div id="detail" class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div id="detail" class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="<?=base_url('assets/img/galeri/').$id->galeri; ?>" alt="" />
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>       

        <!-- Portfolio Modals-->
        <!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center" id="modal-detail">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal1Label">Keterangan Gambar</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img id="galeri" class="img-fluid rounded mb-5" src="" alt="" />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-5" id="ket"></p>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- batas galeri -->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <div class="text-center">
                    <h2 class="page-section-heading d-inline-block text-white">TENTANG KAMI</h2>
                </div>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <?php foreach($tentang as $id) : ?>
                    <div class="col-lg-4 ml-auto">
                        <h4>Visi</h4>
                        <p class="pre-wrap lead"><?=$id->visi;?></p>
                    </div>
                    <div class="col-lg-4 mr-auto">
                         <h4>Misi</h4>
                        <p class="pre-wrap lead"><?=$id->misi;?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <div class="text-center">
                    <h2 class="page-section-heading text-secondary d-inline-block mb-0">KONTAK KAMI</h2>
                </div>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Content-->
<?php foreach($identitas as $id) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="d-flex flex-column align-items-center">
                            <div class="icon-contact mb-3"><i class="fab fa-whatsapp"></i></div>
                            <div class="text-muted">Whatsapp</div>
                            <div class="lead font-weight-bold"><?=$id->kontak;?></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex flex-column align-items-center">
                            <div class="icon-contact mb-3"><i class="far fa-envelope"></i></div>
                            <div class="text-muted">Email</div><a class="lead font-weight-bold" href="mailto:<?=$id->email;?>" target="_blank"><?=$id->email;?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php endforeach; ?>
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="mb-4">ALAMAT</h4>
                        <?php foreach($identitas as $id) : ?>
                        <p class="pre-wrap lead mb-0"><?=$id->alamat;?></p>
                    <?php endforeach; ?>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="mb-4">SOSIAL MEDIA KAMI</h4><a class="btn btn-outline-light btn-social mx-1" href="#" target="_blank"><i class="fab fa-fw fab fa-facebook-f"></i></a><a class="btn btn-outline-light btn-social mx-1" href="#" target="_blank"><i class="fab fa-fw fab fa-instagram"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="mb-4">TENTANG KAMI</h4>
                        <?php foreach($tentang as $id) : ?>
                        <p class="pre-wrap lead mb-0"><?=$id->visi;?></p>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <section class="copyright py-4 text-center text-white">
            <div class="container"><small class="pre-wrap">Copyright &copy;<?=date('Y');?> Sandesta Reza</small></div>
        </section>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed"><a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a></div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="<?= base_url('assets/');?>mail/jqBootstrapValidation.js"></script>
        <script src="<?= base_url('assets/');?>mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url('assets/');?>js/scripts.js"></script>

<!-- modal galeri -->
  <script>
    $(document).on("click","#detail", function(){
      var ket  = $(this).data('ket');
      var galeri  = $(this).data('galeri');

      $("#modal-detail #ket").text(ket);
      $("#modal-detail #galeri").attr("src", "<?=base_url(); ?>assets/img/galeri/" +galeri);
    })
    </script>
    </body>
</html>