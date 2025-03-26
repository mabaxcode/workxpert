<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>WorkXpert Training</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="<?=base_url()?>/portal/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?=base_url()?>/portal/css/bootstrap-icons.css" rel="stylesheet">

        <link href="<?=base_url()?>/portal/css/owl.carousel.min.css" rel="stylesheet">

        <link href="<?=base_url()?>/portal/css/owl.theme.default.min.css" rel="stylesheet">

        <link href="<?=base_url()?>/portal/css/tooplate-gotto-job.css" rel="stylesheet">
        
    </head>
    
    <body id="top">


        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.html">
                    <img src="<?=base_url()?>/portal/images/pkslogo.png" class="img-fluid logo-image">

                    <div class="d-flex flex-column">
                        <strong class="logo-text">WorkXpert Training</strong>
                        <small class="logo-slogan">JTMK Internship Portal</small>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-center ms-lg-5">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url();?>">Home</a>
                        </li>
                        <?/*
                        <li class="nav-item ms-lg-auto">
                            <a class="nav-link" href="job-listings.html">Internship Listings</a>
                        </li>
                        */?>
                        <li class="nav-item ms-lg-auto">



                            <? if( $this->session->userdata('user_id') && $this->session->userdata('user_type') == '1'){ ?>
                            <!-- <a class="nav-link" href="<?=base_url('sign_in')?>"><i class="bi-person custom-icon"></i></a> -->
                             <div class="dropdown">
                              <i class="bi-person custom-icon"></i>
                              <ul class="dropdown-menu">
                                <li style="font-size: 16px;"><a class="dropdown-item" href="<?=base_url('main/profile')?>"><i class="bi bi-person-lines-fill"></i>&nbsp;&nbsp;Profile</a></li>
                                <li style="font-size: 16px;"><a class="dropdown-item" href="#"><i class="bi bi-calendar2-check"></i>&nbsp;&nbsp;My Application</a></li>
                                <li style="font-size: 16px;"><a class="dropdown-item" href="#"><i class="bi bi-card-checklist"></i>&nbsp;&nbsp;Resume</a></li>
                                <li style="font-size: 16px;"><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i>&nbsp;&nbsp;Log Out</a></li>
                              </ul>
                            </div>
                            <? } else { ?>
                            <a class="nav-link" href="<?=base_url('sign_in')?>">Sign in</a>
                            <? } ?>
                        </li>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <? if( ! $this->session->userdata('user_id') ){ ?>
                        <li class="nav-item">
                            <a class="nav-link custom-btn btn" href="login.html">Employer Site</a>
                        </li>
                        <? } else { ?>
                        <? echo "Welcome, ". $this->session->userdata('name') ?>
                        <? } ?>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main>

            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <div class="hero-section-text mt-5">

                                <h1 class="hero-title text-white mt-4 mb-4">Jabatan Teknologi Maklumat Dan Komunikasi</h1>

                                <a href="#categories-section" class="custom-btn custom-border-btn btn">Browse Categories</a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <form class="custom-form hero-form" action="#" method="get" role="form">
                                <h3 class="text-white mb-3">Search your dream Internship</h3>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                                            <input type="text" name="job-title" id="job-title" class="form-control" placeholder="Job Title" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-laptop custom-icon"></i></span>
                                            
                                            <select class="form-select form-control" name="job-level" id="job-level" aria-label="Default select example">
                                                <option selected>Location</option>
                                                <option value="1">Sarawak</option>
                                                <option value="2">Sabah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-laptop custom-icon"></i></span>
                                            
                                            <select class="form-select form-control" name="job-level" id="job-level" aria-label="Default select example">
                                                <option selected>Course Stream</option>
                                                <option value="1">Software</option>
                                                <option value="2">Networking</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-laptop custom-icon"></i></span>
                                            
                                            <select class="form-select form-control" name="job-level" id="job-level" aria-label="Default select example">
                                                <option selected>Allowance</option>
                                                <option value="1">RM100-RM600</option>
                                                <option value="2">RM600-RM1000</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <button type="submit" class="form-control">
                                            Find Internship
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>


            <section class="categories-section section-padding" id="categories-section">
                <div class="container">
                    <div class="row justify-content-center align-items-center">

                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-5">Browse by <span>Your Course Stream</span></h2>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-window"></i>
                                
                                    <small class="categories-block-title">Software</small>

                                    <div class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                                        <span class="categories-block-number-text">4</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-globe"></i>
                                
                                    <small class="categories-block-title">Networking</small>

                                    <div class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                                        <span class="categories-block-number-text">2</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="about-section">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-12">
                            <div class="about-image-wrap custom-border-radius-start">
                                <img src="<?=base_url()?>/portal/images/professional-asian-businesswoman-gray-blazer.jpg" class="about-image custom-border-radius-start img-fluid" alt="">

                                <div class="about-info">
                                    <h5 class="text-white mb-0 me-2">Muhamad Faris Danial</h5>

                                    <p class="text-white mb-0">Developer</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="custom-text-block">
                                <h2 class="text-white mb-2">Introduction WorkXpert Training</h2>

                                <p class="text-white">WorkXpert Training is a website for JTMK students to search for their Internship easily. We understand your hardship in finding Internship places. Let us help you!</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">
                            <div class="instagram-block">
                                <img src="<?=base_url()?>/portal/images/horizontal-shot-happy-mixed-race-females.jpg" class="about-image custom-border-radius-end img-fluid" alt="">

                                <div class="about-info">
                                    <h4 class="text-white mb-0 me-2">Sarah Jane</h4>

                                    <p class="text-white mb-0">Developer</p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <h1>

            </h1>

            <section class="cta-section">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-10">
                            <h3 class="text-white mb-2">Discover Internship Opportunities</h3>
                            <p class="text-white">Kickstart your career with access to internships tailored to your skills and interests. Create an account now and connect with top companies looking for young talented students like you!</p>
                        </div>

                        <div class="col-lg-4 col-12 ms-auto">
                            <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                                <a href="login.html" class="custom-btn custom-border-btn btn me-4">Create an account</a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer" style="background-color:whitesmoke">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="d-flex align-items-center mb-4">
                            <img src="<?=base_url()?>/portal/images/pkslogo.png" class="img-fluid logo-image">

                            <div class="d-flex flex-column">
                                <strong class="logo-text">WorkXpert Training</strong>
                                <small class="logo-slogan">JTMK INTERNSHIP PORTAL</small>
                            </div>
                        </div>  

                        <p class="mb-2">
                            <i class="custom-icon bi-globe me-1"></i>
                            <a href="#" class="site-footer-link">
                                www.workxperttraining.com
                            </a>
                        </p>
                        <p>
                            <i class="custom-icon bi-envelope me-1"></i>

                            <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                info@jobportal.co
                            </a>
                        </p>

                    </div>

                    <div class="col-lg-4 col-md-8 col-12 mt-3 mt-lg-0">
                        <h6 class="site-footer-title">Newsletter</h6>

                        <form class="custom-form newsletter-form" action="#" method="post" role="form">
                            <h6 class="site-footer-title">Get notified Internship news!</h6>

                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person"></i></span>

                                <input type="text" name="newsletter-name" id="newsletter-name" class="form-control" placeholder="yourname@gmail.com" required>

                                <button type="submit" class="form-control">
                                    <i class="bi-send"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="site-footer-bottom">
                <div class="container">
                    <div class="row">
                    </div>
                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="<?=base_url()?>/portal/js/jquery.min.js"></script>
        <script src="<?=base_url()?>/portal/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>/portal/js/owl.carousel.min.js"></script>
        <script src="<?=base_url()?>/portal/js/counter.js"></script>
        <script src="<?=base_url()?>/portal/js/custom.js"></script>

    </body>
</html>