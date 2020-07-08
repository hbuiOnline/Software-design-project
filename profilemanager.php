<?php
include 'includes/autoloader.inc.php';
$clientObj = new ClientProfileView();
$clientData = $clientObj->getClientData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Profile Manager</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/override2.css">
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


<body>
  <div class="container">
    <?php
    include 'navbar.php';
    ?>
    <div class="limiter">
      <div class="wrap-login100">
        <div class="js-tilt" data-tilt>
          <!-- <img style="width: 60rem;" src="images/undraw_profile_6l1l.svg" alt="IMG"> -->
          <img style="width: 33rem;" src="images/undraw_profile_6l1l.svg" alt="IMG">

        </div>

        <form class="login100-form validate-form" action="includes/editprofile.inc.php" method="POST">
          <span class="login100-form-title">
            Your Profile
          </span>


          <?php
          if ($clientData == NULL) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          Your profile is incomplete.
          </div>';
          }

          ?>


          <div class="row info-row">
            <div class="col-lg-6">
              <p class="info-topic">Name:</p>
              <p class="info-data">
                <?php
                if ($clientData != NULL) {
                  echo $clientData['name'];
                } else {
                  echo 'N/A';
                }
                ?></p>
              <hr>
            </div>
            <div class="col-lg-6">
              <p class="info-topic">Username:</p>
              <p class="info-data"><?php echo $_SESSION['username']; ?></p>
              <hr>
            </div>
          </div>

          <div class="row info-row">
            <div class="col-lg-12">
              <p class="info-topic">Email:</p>
              <p class="info-data"><?php echo $_SESSION['email']; ?></p>
              <hr>
            </div>
          </div>

          <div class="row info-row">
            <div class="col-lg-12">
              <p class="info-topic">Address:</p>
              <p class="info-data"><?php
                                    if ($clientData != NULL) {
                                      echo $clientData['address1'] . " " . $clientData['address2'];
                                    } else {
                                      echo 'N/A';
                                    }
                                    ?></p>
              <hr>
            </div>
          </div>

          <div class="row info-row">
            <div class="col-lg-4">
              <p class="info-topic">City:</p>
              <p class="info-data"><?php
                                    if ($clientData != NULL) {
                                      echo $clientData['city'];
                                    } else {
                                      echo 'N/A';
                                    }
                                    ?></p>
              <hr>
            </div>
            <div class="col-lg-4">
              <p class="info-topic">State:</p>
              <p class="info-data"><?php
                                    if ($clientData != NULL) {
                                      echo $clientData['state'];
                                    } else {
                                      echo 'N/A';
                                    }
                                    ?></p>
              <hr>
            </div>
            <div class="col-lg-4">
              <p class="info-topic">Zip:</p>
              <p class="info-data"><?php
                                    if ($clientData != NULL) {
                                      echo $clientData['zip'];
                                    } else {
                                      echo 'N/A';
                                    }
                                    ?></p>
              <hr>
            </div>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="button" data-toggle="modal" data-target="#profileModal">
              Edit Profile
            </button>
          </div>

          <!-- Modal for profile edit -->
          <div class="modal fade in" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Profile Editor</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <?php

                if (isset($_GET['error'])) { //when we have something equal to something in URL, use _GET method
                  if ($_GET['error'] == 'invalidname') {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Please enter your first and last name in the following format: First Last
                        </div>';
                  } elseif ($_GET['error'] == 'invalidaddress') {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Please enter a valid address.
                        </div>';
                  } elseif ($_GET['error'] == 'invalidaddress2') {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Please enter a valid apartment number.
                        </div>';
                  } elseif ($_GET['error'] == 'invalidcity') {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Please enter a valid city name.
                        </div>';
                  } elseif ($_GET['error'] == 'invalidstate') {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Please select a state.
                        </div>';
                  } elseif ($_GET['error'] == 'invalidzip') {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                          Please enter a valid zip code.
                          </div>';
                  }
                } elseif (isset($_GET['editprofile'])) {
                  if ($_GET['editprofile'] == "success") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Profile updated!
                        </div>';
                  }
                }
                ?>

                <div class="modal-body">

                  <div class="wrap-input100">
                    <input class="input100" type="text" name="name" value="<?php
                                                                            if ($clientData != NULL) {
                                                                              echo $clientData['name'];
                                                                            }
                                                                            ?>" placeholder="Full Name">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                      <i class="fa fa-address-card" aria-hidden="true"></i>
                    </span>
                  </div>

                  <div class="wrap-input100">
                    <input class="input100" type="text" name="address1" value="<?php
                                                                                if ($clientData != NULL) {
                                                                                  echo $clientData['address1'];
                                                                                }
                                                                                ?>" placeholder="Address">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </span>
                  </div>

                  <div class="wrap-input100">
                    <input class="input100" type="text" name="address2" value="<?php
                                                                                if ($clientData != NULL) {
                                                                                  echo $clientData['address2'];
                                                                                }
                                                                                ?>" placeholder="Apt. #">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </span>
                  </div>

                  <div class="wrap-input100">
                    <input class="input100" type="text" name="city" value="<?php
                                                                            if ($clientData != NULL) {
                                                                              echo $clientData['city'];
                                                                            }
                                                                            ?>" placeholder="City">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                      <i class="fa fa-map-signs" aria-hidden="true"></i>
                    </span>
                  </div>

                  <div class="wrap-input100">
                    <select class="input100" type="text" name="state" placeholder="State">
                        <?php
                          $stateArray = array('TX', 'AZ', 'MS', 'TE','KE', 'CA', 'IL', 'NV');

                          //Displaying all states to be choose
                          if ($clientData == NULL) {
                            echo '<option>State</option>';
                            foreach($stateArray as $state){
                              echo "<option value=".$state.">".$state."</option>";
                            }
                          } else {
                            //This is for delete the state in the array which is already assigned to the profile
                            if (($key = array_search($clientData['state'], $stateArray)) !== false) {
                                unset($stateArray[$key]);
                            }
                            echo "<option value=".$clientData['state'].">".$clientData['state']."</option>";
                            foreach($stateArray as $state){
                              echo "<option value=".$state.">".$state."</option>";
                            }
                          }
                        ?>

                    </select>
                    <span class="symbol-input100">
                      <i class="fa fa-map" aria-hidden="true"></i>
                    </span>

                  </div>

                  <div class="wrap-input100">
                    <input class="input100" type="text" name="zip" value="<?php
                                                                          if ($clientData != NULL) {
                                                                            echo $clientData['zip'];
                                                                          }
                                                                          ?>" placeholder="Zip Code">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </span>
                  </div>

                  <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" name="editprofile-submit">
                      Update Profile
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>

    </form>
  </div>
  </div>
  </div>


  <!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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

  <script>
    $('.modal').modal('show');
  </script>

  <!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>

</html>
