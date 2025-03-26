<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>
        
        <link href="<?=base_url();?>/portal/css/logpage.css" rel="stylesheet">
     
        
    </head>
<style type="text/css">
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #04AA6D;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="<?=base_url('sign_in/register')?>" method="post">
                <h1>Create Account</h1>
                <span>Use your email for registration</span>
                <input type="text" required name="name" placeholder="Name" />
                <input type="text" required name="student_id" placeholder="Student ID" />
                <input type="email" required name="email" placeholder="Email" />
                <input type="password" required name="password" placeholder="Password" />

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert success"> 
                      <strong>Success!</strong> <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert warning">
                      <strong>Warning!</strong> <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            
            <form action="<?=base_url('main/login')?>" method="post">
                <h1>Sign in</h1>
                <input type="email" name="email" required placeholder="Email" />
                <input type="password" name="password" required placeholder="Password" />

                <a href="#">Forgot your password?</a>

                <?php if ($this->session->flashdata('login_failed')): ?>
                    <div class="alert danger">
                    <?= $this->session->flashdata('login_failed'); ?>
                    </div>
                <?php endif; ?>

                <button>Sign In</button>
            </form>

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your email</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello There!</h1>
                    <p>Click here to start your journey with us!!</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>




    <script src="<?=base_url()?>/portal/js/login.js"></script>
</body>

<script type="text/javascript">
    <?php if ($this->session->flashdata('success')): ?>
        document.getElementById("signUp").click();
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        document.getElementById("signUp").click();
    <?php endif; ?>

</script>

<footer>
        <p>

        </p>
</footer>