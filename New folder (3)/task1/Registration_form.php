<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    </script>
    <link rel="stylesheet" href="style.css">
    <title>Registeration</title>

</head>

<body>
    <!-- --navTabs -->
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Registration</button>
            <button class="nav-link" id="nav-profile-tab-load-button" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Record</button>

        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <br><br>
        <!-- start -->
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="cont1">
                <form id="addform" class="row g-3 mt-2" method="post" enctype="multipart/form-data">
                    <div class="col-md-3">
                        <label for="fname" class="form-label">First Name</label> <span id="fnameErr" class="error">*</span>
                        <input type="text" class="form-control" placeholder="Enter First Name" id="fname" name="fname" maxlength="60">

                    </div>

                    <div class="col-md-3">
                        <label for="lname" class="form-label">Last Name</label> <span id="lnameErr" class="error">*</span>
                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter Last Name" maxlength="60">
                    </div>
                    <div class="col-md-3">
                        <label for="Dstart" class="form-label">Start date:</label><span id="DstartErr" class="error">*</span>
                        <input type="date" id="Dstart" name="Dstart" class="form-control">
                    </div>
                    <!-- <div class="col-md-3">
                        <label for="Dstart" class="form-label">Start date:<span id="DstartErr" class="error">*</span>
                            <input type="date" class="form-control" id="Dstart" name="Dstart" />
                    </div> -->

                    <div class="col-md-3">
                        <label for="email" class="form-label">Email</label> <span id="emailErr" class="error">*</span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>

                    <div class="col-md-4">
                        <label for="phoneno" class="form-label">Phone Number</label> <span id="phonenoErr" class="error">*</span>
                        <input type="text" class="form-control" id="phoneno" name="phoneno" placeholder="Enter Phone Number" minlength="10" maxlength="10" />
                    </div>

                    <div class="col-md-2">
                        <label for="inputState" class="form-label">Select State</label> <span class="error">*</span>

                        <select id="inputState" class="form-select">
                            <option value="">--select--</option>
                            <?php
                            $sql1 = "SELECT * FROM states WHERE country_id=101";
                            $result1 = (mysqli_query($conn, $sql1));
                            while ($states = mysqli_fetch_array($result1, MYSQLI_ASSOC)) :; ?>
                                <option value="<?php echo $states["id"]; ?>">
                                    <?php echo $states["name"]; ?>
                                </option>
                            <?php
                            endwhile;
                            ?>
                        </select>

                    </div>
                    <div class="col-md-2">
                        <label for="inputCity" class="form-label">Select City</label> <span class="error">* </span>
                        <select id="inputCity" class="form-select">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="address" class="form-label">Address</label> <span id="addressErr" class="error">*</span>
                        <textarea class="form-control" rows="1" cols="30" id="address" name="address" maxlength="400" placeholder="Enter Full Address"></textarea>
                    </div>

                    <div class="col-md-4">
                        <label for="zip" class="form-label">Pincode</label> <span id="zipErr" class="error">*</span>
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter PinCode" maxlength="15">
                    </div>

                    <div class="col-md-4">
                        <label for="path" class="form-label">Choose file</label>
                        <!-- <span id="pathErr" class="error">*</span> -->
                        <input type="file" class="form-control" accept="image/*" id="path" name="path" onchange="loadimage(event)">
                        <br>
                        <div id="img">
                            <img style="width:265px; height:80px; display: none;" id="output" alt="preview">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="gender_name" class="form-label">Gender Name</label><span id="gender_nameErr" class="error">*</span>
                        <br>
                        <input type="radio" id="male" name="gender_name" value="male">
                        <label for="male" class="form-label">Male</label>
                        <br>
                        <input type="radio" id="female" name="gender_name" value="female">
                        <label for="female" class="form-label">Female</label>
                    </div>

                    <div class="col-md-2">

                        <label class="form-label">Language<span id="LanguageErr" class="error">*</span></label>
                        <br>
                        <input type="checkbox" id="hindi" name="language[]" value="hindi">
                        <label for="hindi" class="form-label">Hindi</label>
                        <br>
                        <input type="checkbox" id="english" name="language[]" value="english">
                        <label for="english" class="form-label">English</label>
                        <br>
                        <input type="checkbox" name="" id="other" value="other" onclick="text();">
                        <label for="other" class="form-label">Other</label>

                        <textarea name="language[]" id="other_text" class="hide form-control" value=""></textarea>
                    </div>

                    <!-- <div class="col-11 d-flex justify-content-end">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">Confirm</label>
                        </div>
                    </div> -->

                    <div class="col-11 d-flex justify-content-end">
                        <input type="button" id="submit" class="btn btn-primary" name="submit" value="Submit" onclick="updatedetails()" />
                    </div>

                </form>
            </div>
        </div>
        <!-- start -->
        <div class="tab-pane fade " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="R_table">
                <table class="table">
                    <tr>
                        <th>SNo.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone No.</th>
                        <th>Path</th>
                        <th>Address</th>
                        <th>Pincode</th>
                        <th>Gender</th>
                        <th>Language</th>
                        <th>Edit</th>
                    </tr>
                    <tbody id="data">

                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



        <!-- js  -->
        <script>
            function text() {
                $("#other_text").toggleClass('hide');
            }
            //image
            var loadimage = function(event) {
                var output = document.getElementById("output");
                output.src = URL.createObjectURL(event.target.files[0]);
                document.getElementById("output").style.display = "block";


            }

            //show record
            $(document).ready(function() {
                getList();
            });

            function getList() {
                $.ajax({
                    url: "Ajax_onload.php",
                    type: "POST",
                    success: function(data) {
                        $("#data").html(data);
                    }
                });

            }


            function validation() {
                // 
                let validation = true;

                fname = $("#fname").val();
                if (fname == '') {
                    fnameErr.textContent = "  This feild is required ";
                    fnameErr.style.color = "red";
                    $("#fnameErr").show().fadeOut(3000);
                    return validation = false;
                } else {
                    fnameErr.textContent = "";
                }

                lname = $("#lname").val();
                if (lname == '') {
                    lnameErr.textContent = "  This feild is required ";
                    lnameErr.style.color = "red";
                    $("#lnameErr").show().fadeOut(3000);
                    return validation = false;
                } else {
                    lnameErr.textContent = "";
                }
                Dstart = $("#Dstart").val();
                if (Dstart == '') {
                    DstartErr.textContent = "  This feild is required ";
                    DstartErr.style.color = "red";
                    $("#DstartErr").show().fadeOut(3000);
                    return validation = false;
                } else {
                    DstartErr.textContent = "";
                }
                email = $("#email").val();
                if (email == '') {
                    emailErr.textContent = "  This feild is required ";
                    emailErr.style.color = "red";
                    $("#emailErr").show().fadeOut(3000);
                    return validation = false;
                } else {
                    emailErr.textContent = "";
                }
                phoneno = $("#phoneno").val();
                if (phoneno == '') {
                    phonenoErr.textContent = "  This feild is required ";
                    phonenoErr.style.color = "red";
                    $("#phonenoErr").show().fadeOut(3000);
                    return validation = false;
                } else {
                    phonenoErr.textContent = "";
                }
                address = $("#address").val();
                if (phoneno == '') {
                    addressErr.textContent = "  This feild is required ";
                    addressErr.style.color = "red";
                    $("#addressErr").show().fadeOut(3000);
                    return validation = false;
                } else {
                    addressErr.textContent = "";
                }
                zip = $("#zip").val();
                if (zip == '') {
                    zipErr.textContent = "  This feild is required ";
                    zipErr.style.color = "red";
                    $("#zipErr").show().fadeOut(3000);
                    return validation = false;
                } else {
                    zipErr.textContent = "";
                }

                // if (empty($_POST["gender_name"])) {
                //     $gender_nameErr = "is required";
                // } else {
                //     $gender_name = test_input($_POST["gender_name"]);
                //     // check if name only contains letters and whitespace
                //     if (!preg_match("/^[a-zA-Z-' ]*$/", $gender_name)) {
                //         $gender_nameErr = "Only letters and white space allowed";
                //     }
                // }




                // language = $("#language[]").val();
                // if (language == '') {
                //     languageErr.textContent = "  This feild is required ";
                //     languageErr.style.color = "red";
                //     $("#languageErr").show().fadeOut(3000);
                // } else {
                //     languageErr.textContent = "";
                // }
                return validation;

            }

            //insert
            function updatedetails() {
                var formElem = document.getElementById('addform');
                var formData = new FormData(formElem);
                // formData.append('id', $('#id').val())
                let checkValidation = validation();
                if (validation() == true) {
                    $.ajax({
                        type: "POST",
                        url: "Ajax_insert.php",
                        data: formData,
                        contentType: false,
                        processData: false,
                        // dataType: "html",
                        success: function(data) {
                            if (response = 'done') {
                                // $("#addform").trigger("reset");
                                alert('data is inserted');
                                getList();
                            } else {
                                alert('Error');
                            }
                        }
                    });
                }

            }
//delete call ajaxd

            // insert
            // $("#submit").click(function() {
            //     var form1 = $("#addform").serialize();
            //     // var form1 = new FormData(this);
            //     let checkValidation = validation();
            //     if (checkValidation) {
            //         $.ajax({
            //             url: 'Ajax_insert.php',
            //             type: 'POST',
            //             data: form1,
            //             success: function(response) {
            //                 // console.log(response);
            //                 if (response = 'done') {
            //                     alert('data is inserted');
            //                 } else {
            //                     alert('Error');
            //                 }
            //             }

            //         });
            //     } else {
            //         console.log('validationerror');
            //     }
            // });

            // $("#submit").click(function() {
            //     // var form1 = $("#addform").serialize();
            //     // var form1 = new FormData(this);
            //     let checkValidation = validation();
            //     if (checkValidation) {
            //         $.ajax({
            //             url: 'Ajax_insert.php',
            //             type: 'POST',
            //             data: form1,
            //             success: function(response) {
            //                 // console.log(response);
            //                 if (response = 'done') {
            //                     alert('data is inserted');
            //                 } else {
            //                     alert('Error');
            //                 }
            //             }

            //         });
            //     } else {
            //         console.log('validationerror');
            //     }
            // });


            // $('#addform').submit(function(event) {
            //     event.preventDefault();
            //     var form = document.getElementById('addform');
            //     var formdata = new formdata(form);


            //     $.ajax({
            //         url: 'Ajax_insert.php',
            //         method: 'POST',
            //         data: 'formdata',
            //         processData: false,
            //         contentType: false,
            //         success: function(response) {
            //             alert('your form submited');
            //         },
            //         error: function(xhr, status, error) {
            //             alert('not submited');
            //             console.log(error);
            //         }

            //     });
            // });









            // function insert() {
            //     $.ajax({
            //         url: "Ajax_insert.php",
            //         type: "POST",

            //         success: function(data) {
            //             if (data == 1) {
            //                 $("#addform").trigger("reset");
            //             } else {
            //                 alert("can't Save Record.");
            //             }

            //         }
            //     })
            // }
        </script>
</body>

</html>