<!DOCTYPE html>
    <html>
    <head>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, td, th {
        border: 1px solid black;
        padding: 5px;
    }

    th {text-align: left;}
    </style>
    </head>
    <body>

    <?php
// don't use intval if your select value is not numberic
    $q = $_GET['q'];

    $con = mysqli_connect('localhost','root','','dairyprofeed');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    $sql="SELECT * FROM producs_info_masters WHERE pro_cat = '".$q."'";
    $result = mysqli_query($con,$sql);

    echo "<table>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Age</th>
    <th>Hometown</th>
    <th>Job</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {

        echo "<option>" . $row['pro_name'] . "</option>";

    
    }
    echo "</table>";
    mysqli_close($con);
    ?>
    </body>
    </html>
