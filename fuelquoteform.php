<?php
include 'includes/autoloader.inc.php';
// $fuelQuoteObj = new FuelQuoteView();
$clientObj = new ClientProfileView();
$clientData = $clientObj->getClientData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fuel Quote Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- For overriding small elements -->
    <link rel="stylesheet" type="text/css" href="css/override3.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/LogoNoBackground.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/overmain.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="container">
        <?php

        include 'navbar.php';
        ?>

        <div class="limiter">

            <div class="wrap-login100">
                <div class="js-tilt" data-tilt>
                    <img style="width: 28rem;" src="images/undraw_data_report_bi6l.svg" alt="IMG">
                </div>

                <form id="pageForm" class="login100-form validate-form" method="POST">

                    <span class="login100-form-title">
                        Fuel Quote Form
                    </span>

                    <?php
                    if ($clientData == NULL) {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        You must complete your profile before you can generate a fuel quote.
                        </div>';
                    }

                    if (isset($_GET['error'])) { //when we have something equal to something in URL, use _GET method
                        if ($_GET['error'] == "emptypricefield") {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              							Please fill in all fields before Generating Quote.
              						  </div>';
                        } elseif ($_GET['error'] == 'nogeneratequote') {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  							Please Generate a Quote before Placing an Order.
                  						  </div>';
                        } elseif ($_GET['error'] == 'invalidgallons') {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                							Please enter a number for gallons.
                						  </div>';
                        }
                    }
                    ?>

                    <div class="row info-row">
                        <div class="col-lg-12">
                            <p class="info-topic">Delivery Address:</p>
                            <p class="info-data"><?php
                                                    if ($clientData != NULL) {
                                                        echo $clientData['address1'] . " " . $clientData['address2'] . ", " . $clientData['city'] . ", " . $clientData['state'] . " " . $clientData['zip'];
                                                    } else {
                                                        echo 'N/A';
                                                    }
                                                    ?></p>
                            <hr>
                        </div>
                    </div>

                    <!-- passing clientId -->

                    <input type="hidden" name="clientid" value="<?php echo $_SESSION['client']; ?>">

                    <input type="hidden" name="state" value="<?php echo $clientData['state']; ?>">

                    <input type="hidden" name="quoteGallons" value="<?php echo $_SESSION['gallons']; ?>">

                    <input type="hidden" name="quotePPG" value="<?php echo $_SESSION['ppg']; ?>">

                    <input type="hidden" name="quoteTotal" value="<?php echo $_SESSION['total']; ?>">

                    <input type="hidden" name="quoteDeliveryDate" value="<?php echo $_SESSION['deliveryDate']; ?>">

                    <div class="wrap-input100" data-validate="Gallons requested">
                        <input class="input100" type="number" name="gallons" placeholder="Number of Gallons">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-industry" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="text" name="deliveryDate" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Delivery Date">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" name="pricing-input" onClick="submitForm('includes/getprice.inc.php')" class="login100-form-btn" method="POST">
                            Generate Quote
                        </button>
                    </div>

                    <?php
                    if (isset($_GET['pricing'])) {
                        if ($_GET['pricing'] == "success") {
                    ?>
                      <hr>
                      <br><br>
                      <span class="login100-form-title">
                        Your Quote
                      </span>
                      <?php echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Quote generated!
                        </div>';
                      ?>
                      <div class="row">
                        <div class="col-lg-12">
                          <p class="info-topic">Delivery Date:</p>
                          <p class="info-data">
                            <?php
                            $date = date_create($_SESSION['deliveryDate']);
                            echo date_format($date,"m/d/Y");
                            ?>
                          </p>
                          <hr>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <p class="info-topic">Suggested Price / Gallon:</p>
                          <p class="info-data">$<?php echo $_SESSION['ppg']; ?> / gallon</p>
                          <hr>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                            <p class="info-topic">Number of Gallon(s):</p>
                            <p class="info-data"><?php echo $_SESSION['gallons']; ?> gallon(s)</p>
                            <hr>
                        </div>
                      </div>


                      <h6>Total Amount Due:</h6>
                      <h4>$<?php echo $_SESSION['total']; ?></h4>

                      <div class="container-login100-form-btn">
                          <button type="submit" name="quote-input" onClick="submitForm('includes/fuelquote.inc.php')" class="login100-form-btn" method="POST">
                              Place Order
                          </button>
                      </div>

                    <?php
                          }
                      }

                     ?>


            </div>
            </form>

        </div>
    </div>



    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"> </script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <script type="text/javascript">
        function submitForm(action) {
            var form = document.getElementById('pageForm');
            form.action = action;
            form.submit();
        }
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>
