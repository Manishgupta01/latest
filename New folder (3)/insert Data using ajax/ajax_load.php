<?php
$conn = mysqli_connect("localhost","root","","test") or die("cnnection Failed");

$sql = "select * from students";

$result = mysqli_query($conn,$sql) or die("sql Query Failed");

$output = " ";

if(mysqli_num_rows($result)>0){
    $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
    <tr>
    <th>Id</th>
    <th>Name</th>
    </tr>';

    while($row = mysqli_fetch_assoc($result)){
        $output .="<tr><td>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td></tr>";
    }
    $output .= "</table>";

    mysqli_close($conn);
    echo $output;
}

    else{
echo "<h2>No Recod Found</h2>";
    }
?>