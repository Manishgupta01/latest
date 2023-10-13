<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $Dstart = $_POST['Dstart'];
  $email = $_POST['email'];
  $phoneno = $_POST['phoneno'];
  $choose_file = $_POST['choose_file'];
  $address = $_POST['address'];
  $zip = $_POST['zip'];

  $gender_name = $_POST['gender_name'];

  $language = $_POST['language'];




$sql = "INSERT INTO registration_from (fname, lname, email, Dstart, phoneno, address, zip, gender_name, language) VALUES 
('$fname', '$lname', '$email', '$Dstart', $phoneno, '$address', '$zip', $gender_name, $language)";

if ($conn->query($sql) === TRUE) {
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> Data add successfully!!</div>';
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

  // if ($result) {
  //   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  //   <strong>Your entry has been submited sucessfully!  </strong> You should check in on some of those fields below.
  //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  // </div>';
  // } else {
  //   echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  //   <strong>Error! </strong> we are facing some tecnical issue and entry was not submited sucessfully! we are gregate 
  //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  // </div>';
  // }
}
