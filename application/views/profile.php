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
                                <li style="font-size: 16px;"><a class="dropdown-item" href="<?=base_url('logout/destroy_sess')?>"><i class="bi bi-box-arrow-right"></i>&nbsp;&nbsp;Log Out</a></li>
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


                    <?php if ($this->session->flashdata('sucess_save')): ?>
                        <div class="alert alert-primary" role="alert">
                        <?= $this->session->flashdata('sucess_save'); ?>
                        </div>
                    <?php endif; ?>

                    <? if($personal['is_completed'] <> "Y" || $education['is_completed'] <> "Y"){ ?>
                    <div class="alert alert-info" role="alert">
                      <h4 class="alert-heading">Notice!</h4>
                      <p>Your account information not complete yet. Please complete all of your information first</p>
                      <hr>
                      <? if($personal['is_completed'] <> "Y"){ ?>
                      <p class="mb-0"><strong>Alert !</strong> Personal details not complete</p>
                      <? } ?>
                      <? if($education['is_completed'] <> "Y"){ ?>
                      <p class="mb-0"><strong>Alert !</strong> Education details not complete</p>
                      <? } ?>
                      
                      <!-- <p class="mb-0"><strong>Alert !</strong> Skill details not complete</p> -->
                    </div>

                    <? } ?>

                    <div class="row">

                        <div class="col-lg-12 col-12">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="bi bi-person-fill"></i> Personal Details</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="bi bi-mortarboard-fill"></i> Education</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="bi bi-file-earmark-bar-graph"></i> Skills</a>
                              </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <? $this->load->view('personal-details-tab'); ?>
                              </div>
                              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                   <? $this->load->view('education-details-tab'); ?>
                              </div>
                              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                  <? $this->load->view('skill-details-tab'); ?>
                              </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </section>
        </main>

        

        <!-- JAVASCRIPT FILES -->
        <script src="<?=base_url()?>portal/js/jquery.min.js"></script>
        <script src="<?=base_url()?>portal/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>portal/js/owl.carousel.min.js"></script>
        <script src="<?=base_url()?>portal/js/counter.js"></script>
        <script src="<?=base_url()?>portal/js/custom.js"></script>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
        <?php if ($this->session->flashdata('skill_saved')): ?>
            document.getElementById("contact-tab").click();
         <?php endif; ?>
    </script>

    </body>
</html>