<?php
require_once 'connection.php';

//start
$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($error)) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $Dstart = $_POST['Dstart'];
        $email = $_POST['email'];
        $phoneno = $_POST['phoneno'];
        $path = $_FILES['path'];
        $target_path = "uploads/";
        // echo "here";
// print_r($_FILES);die;
        if (isset($_FILES['path'])) {
            $file_name = $_FILES['path']['name'];
            $file_size = $_FILES['path']['size'];
            $file_tmp = $_FILES['path']['tmp_name'];
            $file_type = $_FILES['path']['type'];
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
        }
        $Show_path = $target_path . $file_name;
        $address = $_POST['address'];
        $zip = $_POST['zip'];

        if (isset($_REQUEST['gender_name'])) {
            $gender_name = $_REQUEST['gender_name'];
        }
        $language = isset($_POST['language']) ? implode(',', $_POST['language']) : '';


        $sql = "insert into registration_from(fname, lname, Dstart, email, phoneno, path, address, zip, gender_name, language ) values
        ('{$fname}','{$lname}','{$Dstart}','{$email}','{$phoneno}','{$Show_path}','{$address}','{$zip}','{$gender_name}','{$language}')";


        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'done';
        } else {
            echo 'error';
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
