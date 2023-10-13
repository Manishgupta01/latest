<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table id="main" border="0">
        <tr>
            <td id="header">
                <h1>php</h1>
            </td>
        </tr>
        <tr>
            <td id=table-load>
                <input type="button" id="load-buuton" value="Load Data">
            </td>
        </tr>
        <tr>
            <td id=table-data>
                <table border="1" width="100%" cellspacing="0" cellpadding="10px">

                    <tr>
                        <th>id</th>
                        <th> Name</th>

                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td>Yaoo</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#load-buuton").on("click", function(e) {
                $.ajax({
                    url: "ajax_load.php",
                    type: "POST",
                    success: function(data) {
                        $("#table-data").html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>