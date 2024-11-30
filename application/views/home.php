<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>UPSI Custom Jersey</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <!-- <link href="<?=base_url()?>assets/logo/logo.png" rel="icon"> -->
  <!-- <link href="<?=base_url()?>assets-landing/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
  <link rel="shortcut icon" href="<?=base_url();?>assets/logo/favicon.png" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>assets-landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets-landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>assets-landing/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=base_url()?>assets-landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets-landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?=base_url()?>assets-landing/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Dewi
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="<?=base_url()?>" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?=base_url()?>assets/logo/logo-tran.png" alt="" width="179px" style="height: 200px;">
        <!-- <h3 class="sitename">UPSI Custom Jersey</h3> -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#design">Gallery</a></li>
          <li><a href="<?=base_url('main/login')?>">Login</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="cta-btn" href="<?=base_url()?>#contact">Get Started</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="<?=base_url()?>assets-landing/img/7.png" alt="" data-aos="fade-in">

      <div class="container d-flex flex-column align-items-center">
        <h2 data-aos="fade-up" data-aos-delay="100">Customise Your Idea Into Reality</h2>
        <!-- <p data-aos="fade-up" data-aos-delay="200">Customise Your Idea Into Reality</p> -->
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="#contact" class="btn-get-started">Custom Your Jersey</a>
        </div>
      </div>

    </section><!-- /Hero Section -->




    <!-- Portfolio Section -->
    <section id="design" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <p>CHECK OUR GALLERY</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <!-- <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Product</li>
            <li data-filter=".filter-branding">Branding</li>
            <li data-filter=".filter-books">Books</li>
          </ul> -->
          <!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <? if($kits){ ?>
            <? foreach($kits as $kit){ ?>
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="<?=base_url()?>uploads/kit/<?=$kit['filename']?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?=$kit['name']?></h4>
                  <!-- <p>Lorem ipsum, dolor sit amet consectetur</p> -->
                  <a href="<?=base_url()?>uploads/kit/<?=$kit['filename']?>" title="<?=$kit['name']?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <!-- <a href="#" title="More Details" class="details-link"></a> -->
                </div>
              </div>
            </div><!-- End Portfolio Item -->
           <? } ?>
            <? } ?>
            <?/*

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <div class="portfolio-content h-100">
                <img src="<?=base_url()?>assets-landing/img/portfolio/product-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Design 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="<?=base_url()?>assets-landing/img/portfolio/product-1.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <div class="portfolio-content h-100">
                <img src="<?=base_url()?>assets-landing/img/portfolio/branding-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Design 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="<?=base_url()?>assets-landing/img/portfolio/branding-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->
            */?>
            

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->



    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Register To Start Your Custom Your Jersey</h2>
        <p>Get FREE quotes with us today</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6 ">
            <div class="row gy-4">

              <div class="col-lg-12">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Universiti Pendidikan Sultan Idris, Tanjong Malim, Perak 35900</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+605 - 450 6000</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@custom-jersey.com</p>
                </div>
              </div><!-- End Info Item -->

            </div>
          </div>

          <div class="col-lg-6">
            <form action="<?=base_url('main/doCreateAccount')?>" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label>Your Name</label>
                  <input type="text" name="name" class="form-control" required="">
                </div>

                <div class="col-md-6 ">
                  <label>Your Email</label>
                  <input type="email" class="form-control" name="email" required="">
                </div>

                <div class="col-md-12">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" required="">
                </div>

  

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <!-- <div class="error-message"></div> -->

                  <? if($this->session->flashdata('error')){ ?>
                  <div class="error-message d-block">
                      <?=$this->session->flashdata('error')?>
                  </div>
                  <? } ?>

                  <? if($this->session->flashdata('success')){ ?>
                  <div class="sent-message d-block">
                      <?=$this->session->flashdata('success')?>
                  </div>
                  <? } ?>

                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Create an account</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <!-- <span class="sitename">UPSI Custom Jersey</span> -->
            <img src="<?=base_url()?>assets/logo/logo.jpeg" alt="">
          </a>
          <div class="footer-contact pt-3">
            <p>Universiti Pendidikan Sultan Idris</p>
            <p>Tanjong Malim, Perak 35900</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+605 - 450 6000</span></p>
            <p><strong>Email:</strong> <span>info@custom-jersey.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#hero">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#design">Gallery</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#hero">Custom Jersey</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
       <!--    <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form> -->
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">UPSI Custom Jersey</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>assets-landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="<?=base_url()?>assets-landing/vendor/php-email-form/validate.js"></script> -->
  <script src="<?=base_url()?>assets-landing/vendor/aos/aos.js"></script>
  <script src="<?=base_url()?>assets-landing/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?=base_url()?>assets-landing/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?=base_url()?>assets-landing/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?=base_url()?>assets-landing/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?=base_url()?>assets-landing/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="<?=base_url()?>assets-landing/js/main.js"></script>

  <script>
        const input = document.getElementById("custom-password");

        // Optional: Mask input manually for better cross-browser support
        input.addEventListener("input", () => {
            let value = input.value;
            input.value = value.replace(/./g, "•");
        });
    </script>

</body>

</html>