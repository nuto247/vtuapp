<!doctype html>
<html lang="en">


<!-- Mirrored from www.havillpay.com/web/login by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 09:03:49 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

        <meta charset="utf-8" />
        <title>Login | HavillPay - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content=" Get Started" name="description" />
       <meta content="MaestroDEV" name="author" />
    <meta content="Abdurrahmon Badmus|| Software Developer|| abdurrahmonbadmus.ab@gmail.com" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="asset/images/icon.jpg">

        <!-- Bootstrap Css -->
        <link href="asset/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="asset/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="asset/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>
<style>
    .purple{
        background-color:#4A206C;
        color:white;

    }
     .purp{
        background-color:#4A206C;
        color:white;

    }
     .pur{

         color:#4A206C;
    }
    .hov:hover{
        color: purple;
       background-color: #FCD19E;
    }
</style>
    <body>

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primar purp  bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-white ">Welcome Back!</h5>
                                             <p class="text-white ">Login to your HavillPay Account.</p>

                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="asset/images/verticalr.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="#">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="asset/images/icon.jpg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                      <div id="response"></div>
                                                                          <form class="needs-validation" id="form-data" novalidate action="#">



                                        <div class="mb-3">
                                            <label for="yourUsername" class="form-label pur">Username</label>

                                             <input type="hidden"  id="req_token" value="a507e3acce51ea29c3ecc5ca1d618ea621b0db1c">
                                            <input type="text" class="form-control" id="yourUsername" placeholder="Enter Username" required>
                                            <div class="invalid-feedback">
                                               Please choose a Username
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="yourPassword" class="form-label pur">Password</label>
                                            <input type="password" class="form-control" id="yourPassword" placeholder="Enter Your Password" required>
                                            <div class="invalid-feedback">
                                               Please enter your password!
                                            </div>
                                        </div>

                                        <div class="mt-4 d-grid">
                                            <button class="btn purple  hov"  id="submitBtn" type="submit">Login</button>
                                        </div>

                                          <div class="mt-4 text-center">
                                            <a href="{{ route('password.request') }}" class="pur"> Forgot your password?</a>
                                        </div>


                                        <div class="mt-3 text-center">

                            <div>
                                <p>Don't have an account ? <a href="register.html" class="fw-medium pur"> Signup now </a> </p>

                                <p class="pur">© <script>document.write(new Date().getFullYear())</script> HavillPay.</p>
                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="asset/libs/jquery/jquery.min.js"></script>
        <script src="asset/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="asset/libs/metismenu/metisMenu.min.js"></script>
        <script src="asset/libs/simplebar/simplebar.min.js"></script>
        <script src="asset/libs/node-waves/waves.min.js"></script>

        <!-- validation init -->
        <script src="asset/js/pages/validation.init.js"></script>

        <!-- App js -->
        <script src="asset/js/app.js"></script>

    </body>

<!-- Mirrored from www.havillpay.com/web/login by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 09:03:57 GMT -->
</html>


  <script type="text/javascript">
     $("#form-data").submit(function (event) {
     $("#submitBtn").html('Please wait...');
     var formData = {
      username: $("#yourUsername").val(),
      password: $("#yourPassword").val(),
      req_token: $("#req_token").val(),
    };
    $.ajax({
      url:'profile/login',
      method:'POST',
      dataType:'json',
      data:formData,
      success:function(response_fd){
     if (response_fd.status == 'success'){

    $('#submitBtn').html('Redirecting...');
                    setTimeout(function() {
                        window.location.href = response_fd.redirect;
                    }, 1000);
     }
     else if(response_fd.status == 'redirect'){
         $("#response").html(response_fd.message);
          setTimeout(function() {
         window.location.href = response_fd.redirect;
          }, 1000);
     }else {
   $("#submitBtn").html('Sign In');
   $("#response").html(response_fd.message);
    }
}
    });

      event.preventDefault();
     });
  </script>

</body>

</html>
