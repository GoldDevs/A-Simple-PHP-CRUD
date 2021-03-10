<?php
$hostname = "localhost";
$dbname = "blogdb";
$username = "blogcntroot";
$password = "2118312904444";


$conn = mysqli_connect("$hostname", "$username", "$password", "$dbname");

if (!$conn) {
    die("$c_err");
}


$sql = "select * from blog where BCategory='travel' order by Bid Desc";

if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-striped table-responsive table-hover'>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td><b>" . $row['BTitle'] . "</b></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . $row['BDesc'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td><a href=../articles/" . $row['BUrl'] . " class='text-decoration-none'>Read More ...</a></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Category - <b>" . $row['BCategory'] . "</b></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

mysqli_close($conn);
?>