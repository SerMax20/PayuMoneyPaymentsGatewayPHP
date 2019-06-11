<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PayuMoney Payments Gateway for Custom Payments - Hash Hackers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.9/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.9/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.9/icons/favicon-16x16.png">
    <link rel="mask-icon" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.9/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/bootstrap/css/bootstrap.min.css" integrity="sha256-m/h/cUDAhf6/iBRixTbuc8+Rg2cIETQtPcH9D3p2Kg0=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/fonts/font-awesome-4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/fonts/Linearicons-Free-v1.0.0/icon-font.min.css" integrity="sha256-McqPxLsZARiFGVnygpCa9Kj254K2nc++AAlP/AEIeLM=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/animate/animate.css" integrity="sha256-gKpUl/8xssABR02UMvCFPBHSAKZ+pPmFKrL37i/t2cI=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/css-hamburgers/hamburgers.min.css" integrity="sha256-5GnVu4h1nEeqkjwhs4+StqORVvYrp+XSfLJ1cYLzqk8=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/select2/select2.min.css" integrity="sha256-xJOZHfpxLR/uhh1BwYFS5fhmOAdIRQaiOul5F/b7v3s=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/css/util.css" integrity="sha256-g3SU8rSj3nvOuH156EGuSLlvgQgqJCGFjgax1dHhF/g=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/css/main.css" integrity="sha256-tAZ13BHmfteiyply1ftKqhwlBUVmwBuTRJqH23oio1k=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/jquery/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script>
        var hash = '<?php echo $hash ?>';
        function submitPayuForm() {
          if(hash == '') {
            return;
          }
          var payuForm = document.forms.payuForm;
          payuForm.submit();
        }
        
        //Mobile Validation
        function check()
        {

            var pass1 = document.getElementById('mobile');
            var message = document.getElementById('message');

           var goodColor = "#0C6";
            var badColor = "#FF9B37";

            if(mobile.value.length!=10){
                mobile.style.backgroundColor = badColor;
                message.style.color = badColor;
                message.innerHTML = "Invalid Mobile Number, 10 Digit Number Required."
                return false;
            }
            else if(mobile.value.startsWith("0") || mobile.value.startsWith("1") || mobile.value.startsWith("2") || mobile.value.startsWith("3") || mobile.value.startsWith("4") || mobile.value.startsWith("5")){
                mobile.style.backgroundColor = badColor;
                message.style.color = badColor;
                message.innerHTML = "Number Should Start with 9,8,7 or 6 only."
                return false;
            }
            else{
                mobile.style.backgroundColor = goodColor;
                message.style.color = goodColor;
                message.innerHTML = "Mobile Number Validated."
                return true;
            }
        }
    </script>
</head>
<body onload="submitPayuForm()">

    <div class="container-contact100" style="background-image: url('https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/images/bg-01.jpg');">
        <div class="wrap-contact100">
            <form class='contact100-form validate-form' method='POST' action="<?php echo $action; ?>" method="post" name="payuForm"><input type='hidden' name='form-name' value='contact' />
                <span class="contact100-form-title">
                    <a class="navbar-brand" href="/"><img src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.9/images/hashhackers_logo.webp" alt="Hash Hackers" width="200px" height="auto"> PG</a>
                </span>

                <div class="wrap-input100">
                    <span class="label-input100">Payumoney Payments Gateway of Hash Hackers Group.<br></span>
                </div><br>
                <?php if($formError) { ?><span style="color:red">Please fill all mandatory fields.</span><?php } ?>
                <div class="wrap-input100">
                    <span class="label-input100">AMOUNT FOR TRANSACTION : <a href='#' style='color: rgb(255,69,0)'><?php echo $txnid ?></a></span>
                        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                        <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                        <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                        <input class="input100" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" placeholder="Amount" maxlength="5" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                </div>
                
                <div class="wrap-input100">
                    <span class="label-input100">FIRST NAME</span>
                    <input class="input100" name="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" placeholder="First Name" maxlength="20" oninput="this.value=this.value.replace(/[^a-zA-Z]/g,'');" required>
                </div>

                <div class="wrap-input100">
                    <span class="label-input100">EMAIL</span>
                    <input type="email" class="input100" name="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" placeholder="Email" required>
                    <input type="hidden" class="input100" name="productinfo" value="CUSTOMPAY" required>
                    <input type="hidden"  name="surl" value="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/success/' ?>" size="64" />
                    <input type="hidden" name="furl" value="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/failed/' ?>" size="64" />
                    <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                </div>
                
                <div class="wrap-input100">
                    <span class="label-input100">PHONE</span>
                    <input type="text" id="mobile" class="input100" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" placeholder="Phone" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required onkeyup="check(); return false;">
                    <span id="message"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <?php if(!$hash) { ?><button class="contact100-form-btn">
                            Submit
                        </button><?php } ?>
                    </div>
                </div>
            </form>
            <br><center><a href='//github.com/ParveenBhadooOfficial/PayuMoneyPaymentsGatewayPHP'>This Software is Open Source.</a></center>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <script src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/bootstrap/js/popper.min.js" integrity="sha256-UpLmd/5xLICGNBTp5z82eNhtQJ91E5K2gDtwqUn8EBc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/bootstrap/js/bootstrap.min.js" integrity="sha256-DiWJXXyq81WlPRnDfGmgYZj2aOVCKyEdJ1l+2TmDuAs=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/select2/select2.min.js" integrity="sha256-+mWd/G69S4qtgPowSELIeVAv7+FuL871WXaolgXnrwQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/js/main.js" integrity="sha256-b7AHVAAYXastL2DcLVJRkTYnCilfJN+amUmtYN8J7HU=" crossorigin="anonymous"></script>
    <!--- A ColorLib Theme Edited and CDNed by Parveen Bhadoo -->
</body>
</html>
