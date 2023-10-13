<?php
require 'connection.php';
?>
<div class="R_table">
    <table class="table">
        <!-- <pre><h2 id="caption"> List of Users Record </h2></pre> -->
        <thead>
            <tr>
                <th scope="col">SNo.</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Email</th>
                <th scope="col">Phone No.</th>
                <th scope="col">Path</th>
                <th scope="col">Address</th>
                <th scope="col">Pincode</th>
                <th scope="col">Gender</th>
                <th scope="col">Language</th>
                <th colspan="2">Edit</th>
            </tr>
            <?php
            $sql2 = 'select * from registration_from';
            $result2 = (mysqli_query($conn, $sql2));
            while ($states2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) :;
            ?>
        </thead>
        <tbody>
            <!-- <tr><th scope="row"></th>   -->
            <td scope="col"><?php echo $states2['id']; ?></td>
            <td scope="col"><?php echo $states2['fname']; ?></td>
            <td scope="col"><?php echo $states2['lname']; ?></td>
            <td scope="col"><?php echo $states2['Dstart']; ?></td>
            <td scope="col"><?php echo $states2['email']; ?></td>
            <td scope="col"><?php echo $states2['phoneno']; ?></td>
            <td scope="col"><img src="<?php echo $states2['choose_file']; ?>" alt="not found" width="50px"></td>
            <td scope="col"><?php echo $states2['address']; ?></td>
            <td scope="col"><?php echo $states2['zip']; ?></td>
            <td scope="col"><?php echo $states2['gender_name']; ?></td>
            <td scope="col"><?php echo $states2['language']; ?></td>
            <td scope="col">
                <button type="button" class="btn">
                    <img src="/images/edit.png" width="25px" height="25px" alt="delete">
                </button>

                <button class="btn" onclick="deleterec(<?php echo $states2['id'];  ?>)">
                    <img src="/images/delete.png" width="25px" height="25px" alt="delete">
                </button>
            </td>
        <?php endwhile; ?>
        </tbody>
    </table>

</div>