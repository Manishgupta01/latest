<?php
require_once 'connection.php';

$sql = "select * from registration_from";

$result = mysqli_query($conn,$sql) or die("sql Query Failed");

$output = " ";

if(mysqli_num_rows($result)>0){
        
    while($row = mysqli_fetch_assoc($result)){
        $output .="
        <tr><td>{$row["id"]}</td><td>{$row["fname"]}</td><td>{$row["lname"]}</td><td>{$row["Dstart"]}</td><td>{$row["email"]}</td><td>{$row["phoneno"]}</td><td><img src='". $row['path'] ."' alt='not found' width='50px'></td><td>{$row["address"]}</td><td>{$row["zip"]}</td><td>{$row["gender_name"]}</td><td>{$row["language"]}</td><td> <button type='button' class='btn'><img src=". '/images/edit.png'  ." width='25px' height='25px' alt='delete'></button>
        <button class='btn' onclick='deleterec({$row['id']})'><img src=". '/images/delete.png' ." width='25px' height='25px' alt='delete'>
            </button></td>
        </tr>";
    }
    $output .= "</table>";

    mysqli_close($conn);
    echo $output;
}

    else{
echo "<h2>No Recod Found</h2>";
    }
?>