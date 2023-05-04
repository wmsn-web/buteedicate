<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register </title>
    <link rel="canonical" href="">
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
                                <h4>Register</h4>
                            </div>
                            <div class="bx-body">
                                <?php if($err = $this->session->flashdata("err")): ?>
                                    <div class="alert alert-danger"><?= $err; ?></div>
                                <?php endif; ?>
                                <form id="reg" action="<?= base_url('Register/submitReg'); ?> " method="post" data-parsley-validate novalidate>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control"required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Email Address</label>
                                            <input type="email" name="email" class="form-control"required>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <label>Password</label>
                                            <input type="Password" id="pass"  class="form-control" required>
                                            <span id="msg1"></span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Confirm Password</label>
                                            <input type="Password" id="conpass" name="password" class="form-control" required>
                                            <span id="msg2"></span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="ckbox">
                                                <input type="checkbox" checked  required>
                                                <span>  I accept all <a target="_blank" href="<?= base_url('terms-and-conditions'); ?>">terms & conditions</a> (gtc) - <a href="<?= base_url('privacy-policy'); ?>" target="_blank">data policy</a></span>
                                            </label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button type="button" onclick="subReg()" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <a href="<?= base_url('Login'); ?>">Already registered? Login</a>
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
            function subReg()
            {
                var pass = $("#pass").val();
                var conpass = $("#conpass").val();
                if(conpass == pass)
                {
                    $("#reg").submit();
                }
                else
                {
                    $("#msg2").html("<b style='color:#f00'>Password does not match!</b>");
                }
                
            }
            $("#pass").blur(function(){
                var pass = $("#pass").val();
                if(pass.length < 8)
                {
                    $("#msg1").html("<b style='color:#f00'>Minimum 8 Character password</b>");
                    $("#pass").focus();
                }
                else
                {
                    $("#msg1").html("");
                    return false;
                    
                }
            });
            $("#conpass").keyup(function(){
                var pass = $("#pass").val();
                var conpass = $("#conpass").val();
                if(conpass == pass)
                {
                    $("#msg2").html("<b style='color:#090'>Password matched!</b>");
                }
                else
                {
                    $("#msg2").html("<b style='color:#f00'>Password does not match!</b>");
                }
            })
        </script>
    </div>

</body>
</html>