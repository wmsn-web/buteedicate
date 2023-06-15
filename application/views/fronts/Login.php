<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Gammaprep.com</title>
    <meta name="description" content="Login to gammaprep.com">
    <meta name="keywords" content="gammaprep login">
    <link rel="canonical" href="https://www.gammaprep.com/Login">
	<?php include("inc/layout.php"); ?>
    
</head>
<body>
	<div class="main-wrapper">

        <!-- Header -->
        <?php include("inc/header_final.php"); ?> 
        
        <div class="why-gamma-prep-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="rowx justify-content-center">
                        <div class="formbx">
                            <div class="header">
                                <h4 id="ttiltle">Login</h4>
                            </div>
                            <div class="bx-body">
                                <div class="text-center">
                                    <?php if($err = $this->session->flashdata("err")): ?>
                                        <div class="alert alert-danger"><?= $err; ?></div>
                                    <?php endif; ?>
                                </div>
                                <form id="loginForm" action="<?= base_url('Login/ProcessLogin'); ?>" method="post" data-parsley-validate novalidate>
                                    <div class="row">
                                        <div class="form-group col-md-12"><p><br>&nbsp;</p></div>
                                        <div class="form-group col-md-12">
                                            <label>Email Address</label>
                                            <input type="email" name="email" class="form-control"required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Password</label>
                                            <input type="Password" name="password" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <a onclick="showForgot()" href="javascript:void(0)">Forgot Password?</a>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="ckbox">
                                                <input type="checkbox" checked  required>
                                                <span>  I accept all <a target="_blank" href="<?= base_url('terms-and-conditions'); ?>">terms & conditions</a> (gtc) - <a href="<?= base_url('privacy-policy'); ?>" target="_blank">data policy</a></span>
                                            </label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button class="btn btn-primary btn-block">Login</button>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <a class="nav-link" href="<?= base_url('Register'); ?>">Don't have an account create from here.</a>
                                        </div>
                                    </div>
                                </form>
                                <form style="display:none" id="forgotPass">
                                    <span id="lnkMsg"></span>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Registered Email Address</label>
                                            <input type="email" id="Email" name="email" class="form-control"required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <img id="loder" style="display:none;" src="<?= base_url('assets/loder.gif'); ?>" width="20" />
                                            <button id="gtLnk" onclick="getLink()" type="button" class="btn btn-primary btn-block">Get Link</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php include("inc/footer_final.php"); ?>
        <?php include("inc/js.php"); ?>
        <script type="text/javascript">
            function showForgot()
            {
                $("#loginForm").hide();
                $("#ttiltle").html("Forgot Password");
                $("#forgotPass").show();
            }
            function getLink()
            {
                $("#gtLnk").hide();
                $("#loder").show();
                var email = $("#Email").val();
                if(email == "")
                {
                    $("#lnkMsg").html("<b class='text-danger'>Please Enter Registered Email Address!</b>");
                    $("#gtLnk").show();
                    $("#loder").hide();
                }
                else
                {
                    $.post("<?= base_url('ForgotPass/getLink'); ?>",{
                        email: email
                    },function(resp){
                        var obj = JSON.parse(resp);
                        if(obj.sts == "succ")
                        {
                            $("#lnkMsg").html("<b class='text-success'>"+obj.mssg+"</b>");
                        }
                        else
                        {
                            $("#lnkMsg").html("<b class='text-danger'>"+obj.mssg+"</b>");
                        }

                        $("#gtLnk").show();
                        $("#loder").hide();
                    })
                }
            }
            $("#Email").focus(function(){
                $("#lnkMsg").html("");
            })
        </script>
    </div>

</body>
</html>