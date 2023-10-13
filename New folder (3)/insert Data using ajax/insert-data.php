<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #success-message{
            background: #DEF1D8;
            color: green;
            padding: 10px;
            margin: 10px;
            display: none;
            position: absolute;
            right: 15px;
            top: 15px;
        }
        #error-message{
            background: #EFDCDD;
            color: red;
            padding: 10px;
            position: absolute;
            margin: 10px;
            display: none;
            right: 15px;
            top: 15px;
        }
    </style>
</head>

<body>
    <table id="main" border="0">
        <tr>
            <td id="header">
                <h1>Add Record with php $ Ajax</h1>
            </td>
        </tr>
        <tr>
            <td id=table-form>
                <form id="addform">
                    First Name <input type="text" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Last Name <input type="text" id="lname">
                    <input type="submit" id="save-button" value="save">
                </form>
            </td>
        </tr>
        <tr>
            <td id=table-data></td>
        </tr>
    </table>
    <div id="error-message"></div>
    <div id="success-message"></div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            function loadTable() {
                $.ajax({
                    url: "ajax_load.php",
                    type: "POST",
                    success: function(data) {
                        $("#table-data").html(data);
                    }
                });
            }

            loadTable();

            $("#save-button").on("click", function(e) {
                // console.log(e,"this")
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                if (fname == "" || lname == "") {
                    $("#error-message").html("All field are Required").slideDown();
                    $("#success-message").slideUp();
                } else {
                    $.ajax({
                        url: "ajax-insert.php",
                        type: "POST",
                        data: {
                            first_name: fname,
                            last_name: lname
                        },
                        // dataType:'HTML',
                        success: function(data) {
                            // console.log(data)
                            if (data == 1) {
                                loadTable();
                                $("#addform").trigger("reset");
                                $("#success-message").html("Data Inserted Successfully.").slideDown();
                                $("#error-message").slideUp();
                            } else {
                                alert("can't Save Record.");
                                $("#error-message").html("can't Save Record.").slideDown();
                                $("#success-message").slideUp();
                            }
                        }
                    });
                }



            });



        });
    </script>
</body>

</html>