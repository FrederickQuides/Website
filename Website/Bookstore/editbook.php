
<?php
// include the database connection file
require_once("connectDB.php");

// attemp to connect to the database
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
                                        

  
// check connection 
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());

}

// Fetch data from the 'users table in descending ORDER by 'id')
$result = mysqli_query($mysqli, "SELECT * FROM cart ORDER BY CartID DESC");


// Check if the querry was successful
if (!$result) {
    die("Query failed: " . mysqli_error($mysqli));


}

//Display fetched data
?>
<html>
    <head>
        <body>
         <h2>Check Out</h2>
         <p>
            <a href="index.php">Return to Home</a>
</p>
            <table width='80%' border='1'>
                <tr bgcolor='#DDDDDD'>
        <td><strong>Name</strong></td>
        <td><strong>Email</strong></td>
        <td><strong>Book</strong></td>
        <td><strong>Price</strong></td>
        <td><strong>Action</strong></td>

</tr>
<?php
// check if there are rows in the result set
 if (mysqli_num_rows($result) > 0) {
    while ($res = mysqli_fetch_assoc($result)) {
        // loop through each row of  the result set
        echo "<tr>";
        echo "<td>" . htmlspecialchars($res['name']) . "</td>";
        echo "<td>" . htmlspecialchars($res['email']) . "</td>";
        echo "<td>" . htmlspecialchars($res['book']) . "</td>";
        echo "<td>" . htmlspecialchars($res['price']) . "</td>";
        echo "<td>
           <a href='edit.php?id=" . $res['ID'] . "'>Edit</a>|
           <a href='delete.php?id=" . $res['ID'] . "'onclick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
           </td>";
           echo "</tr>";
    }
    // Free the result set
    mysqli_free_result($result);
} else {

    echo "<tr><td colspan='4'> No record found</td></tr>";
}

?>
</table>
</body>
</html> 

<?php
// Close the database connection
mysqli_close($mysqli);
?>