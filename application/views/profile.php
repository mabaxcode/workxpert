<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>WorkXpert Job Details</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="<?=base_url()?>portal/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?=base_url()?>portal/css/bootstrap-icons.css" rel="stylesheet">

        <link href="<?=base_url()?>portal/css/owl.carousel.min.css" rel="stylesheet">

        <link href="<?=base_url()?>portal/css/owl.theme.default.min.css" rel="stylesheet">

        <link href="<?=base_url()?>portal/css/tooplate-gotto-job.css" rel="stylesheet">
        
    </head>
    
    <body id="top">

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.html">
                    <img src="<?=base_url()?>portal/images/pkslogo.png" class="img-fluid logo-image">

                    <div class="d-flex flex-column">
                        <strong class="logo-text">WorkXpert Training</strong>
                        <small class="logo-slogan">JTMK INTERNSHIP PORTAL</small>
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


            <section class="job-section section-padding pb-0">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12">
                            <h2 class="job-title mb-0">Technical Lead</h2>

                            <div class="job-thumb job-thumb-detail">
                                <div class="d-flex flex-wrap align-items-center border-bottom pt-lg-3 pt-2 pb-3 mb-4">
                                    <p class="job-location mb-0">
                                        <i class="custom-icon bi-geo-alt me-1"></i>
                                        Kuala, Malaysia
                                    </p>

                                    <p class="job-date mb-0">
                                        <i class="custom-icon bi-clock me-1"></i>
                                        10 hours ago
                                    </p>

                                    <p class="job-price mb-0">
                                        <i class="custom-icon bi-cash me-1"></i>
                                        $20k
                                    </p>

                                    <div class="d-flex">
                                        <p class="mb-0">
                                            <a href="job-listings.html" class="badge badge-level">Internship</a>
                                        </p>

                                        <p class="mb-0">
                                            <a href="job-listings.html" class="badge">Freelance</a>
                                        </p>
                                    </div>
                                </div>

                                <h4 class="mt-4 mb-2">Job Description</h4>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                                <h5 class="mt-4 mb-3">The Role</h5>

                                <p class="mb-1"><strong>Benefits:</strong> Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito adipcingi elit</p>

                                <p><strong>Good salary:</strong> Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito</p>

                                <h5 class="mt-4 mb-3">Requirements</h5>

                                <ul>
                                    <li>Strong knowledge in computing skill</li>

                                    <li>Minimum 5 years of working experiences consectetur omeg</li>

                                    <li>Excellent interpersonal skills</li>
                                </ul>

                                <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
                                    <a href="#" class="custom-btn btn mt-2">Apply now</a>

                                    <a href="#" class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3">Save this job</a>

                                    <div class="job-detail-share d-flex align-items-center">
                                        <p class="mb-0 me-lg-4 me-3">Share:</p>

                                        <a href="#" class="bi-facebook"></a>

                                        <a href="#" class="bi-twitter mx-3"></a>

                                        <a href="#" class="bi-share"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 mt-5 mt-lg-0">
                            <div class="job-thumb job-thumb-detail-box bg-white shadow-lg">
                                <div class="d-flex align-items-center">
                                    <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mb-3">
                                        <img src="<?=base_url()?>portal/images/logos/google.png" class="job-image me-3 img-fluid" alt="">

                                        <p class="mb-0">Google</p>
                                    </div>

                                    <a href="#" class="bi-bookmark ms-auto me-2"></a>

                                    <a href="#" class="bi-heart"></a>
                                </div>

                                <h6 class="mt-3 mb-2">About the Company</h6>

                                <p>Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>

                                <h6 class="mt-4 mb-3">Contact Information</h6>

                                <p class="mb-2">
                                    <i class="custom-icon bi-globe me-1"></i>

                                    <a href="#" class="site-footer-link">
                                        www.jobbportal.com
                                    </a>
                                </p>

                                <p class="mb-2">
                                    <i class="custom-icon bi-telephone me-1"></i>

                                    <a href="tel: 305-240-9671" class="site-footer-link">
                                        305-240-9671
                                    </a>
                                </p>

                                <p>
                                    <i class="custom-icon bi-envelope me-1"></i>

                                    <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                        info@jobportal.co
                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="d-flex align-items-center mb-4">
                            <img src="<?=base_url()?>portal/images/pkslogo.png" class="img-fluid logo-image">

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
        <script src="<?=base_url()?>portal/js/jquery.min.js"></script>
        <script src="<?=base_url()?>portal/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>portal/js/owl.carousel.min.js"></script>
        <script src="<?=base_url()?>portal/js/counter.js"></script>
        <script src="<?=base_url()?>portal/js/custom.js"></script>

    </body>
</html>