<?php
// require_once __DIR__."task1/connection.php";
// require_once __DIR__."/../data.php";
require 'connection.php';
// require 'data.php';
require 'validate.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Registeration_form</title>
  <style>
    /* body {
            margin: 90px;
        } */

    .container {
      background-color: darkgrey;
      font-weight: bold;
      border-radius: 30px;

    }

    /* .container {
            padding: 20px;
            box-shadow:
                inset 0 -3em 3em rgba(0, 200, 0, 0.1),
                0 0 0 2px white,
                0.3em 0.3em 1em rgba(39 68 74);
        } */

    .error {
      color: #c30202d9;
    }

    .hide {
      display: none;
    }
  </style>
</head>

<body>
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Registration</button>
      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Shown Record</button>
    </div>
  </nav>

<!-- 1  <div class="tab-content" id="nav-tabContent"> -->
    2<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>




                  <div class="container">
                    <form class="row g-3 mt-2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                      <div class="col-md-3">
                        <label for="fname" class="form-label">First Name</label> <span class="error">* <?php echo $fnameErr; ?></span>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="fname" maxlength="60">

                      </div>

                      <div class="col-md-3">
                        <label for="lname" class="form-label">Last Name</label> <span class="error">* <?php echo $lnameErr; ?></span>
                        <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" maxlength="60">
                      </div>

                      <div class="col-md-3">
                        <label for="Dstart" class="form-label">Start date:</label> <span class="error">* <?php echo $DstartErr; ?></span>
                        <input type="date" class="form-control" id="Dstart" name="Dstart" />
                      </div>

                      <div class="col-md-3">
                        <label for="email" class="form-label">Email</label> <span class="error">* <?php echo $emailErr; ?></span>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email">
                      </div>


                      <div class="col-md-3">
                        <label for="phoneno" class="form-label">Phone Number</label> <span class="error">* <?php echo $phonenoErr; ?></span>
                        <input type="text" class="form-control" name="phoneno" placeholder="Enter Phone Number" minlength="10" maxlength="10" />
                      </div>
                      <div class="col-md-3">
                        <label for="choose_file" class="form-label">Choose file</label> <span class="error">* <?php echo $choose_fileErr; ?></span>
                        <input type="file" class="form-control" id="choose_file" name="choose_file">
                      </div>

                      <div class="col-md-3">
                        <label for="address" class="form-label">Address</label> <span class="error">* <?php echo $addressErr; ?></span>
                        <textarea class="form-control" rows="1" cols="30" name="address" maxlength="400" placeholder="Enter your Address"></textarea>
                      </div>

                      <div class="col-md-3">
                        <label for="zip" class="form-label">Zip</label> <span class="error">* <?php echo $zipErr; ?></span>
                        <input type="text" class="form-control" name="zip" placeholder="Enter ZipCode" maxlength="15">
                      </div>

                      <!-- Gender -->
                      <div class="col-md-2"> <span class="error">* <?php echo $gender_nameErr; ?></span>
                        <label for="gender_name" class="form-label">Gender Name</label>
                        <br>
                        <input type="radio" name="gender_name" value="male">
                        <label for="male" class="form-label">Male</label>
                        <br>
                        <input type="radio" id="female" name="gender_name" value="female">
                        <label for="female" class="form-label">Female</label>

                      </div>

                      <div class="col-md-2">
                        <span class="error">* <?php echo $languageErr; ?></span>
                        <label for="language" class="form-label">Language</label>
                        <br>
                        <input type="checkbox" name="language" value="hindi">
                        <label for="hindi" class="form-label">Hindi</label>
                        <br>
                        <input type="checkbox" name="language" value="english">
                        <label for="english" class="form-label">English</label>
                        <br>
                        <input type="checkbox" name="language" id="other" value="other" onclick="text();">
                        <label for="other" class="form-label">Other</label>

                        <textarea name="other_text" id="other_text" class="hide form-control"></textarea>
                      </div>

                      <!--  state Select -->
                      <div class="col-md-4">
                        <label for="inputState" class="form-label">Select State</label> <span class="error">* <?php echo $inputStateErr; ?></span>
                        <select id="inputState" class="form-select">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>

                      </div>
                      <div class="col-md-4">
                        <label for="inputCity" class="form-label">Select City</label> <span class="error">* <?php echo $inputCityErr; ?></span>
                        <select id="inputCity" class="form-select">
                          <option selected>Choose...</option>
                          <option>...</option>

                        </select>
                      </div>

                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="gridCheck">
                          <label class="form-check-label" for="gridCheck">
                            Confirm
                          </label>
                        </div>
                      </div>
                      <div class="col-12">

                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                      </div>
                    </form>
                    <div id="success"></div>
                  </div>
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                  <script>
                    function text() {
                      $("#other_text").toggleClass('hide');
                    }
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
   2 </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>