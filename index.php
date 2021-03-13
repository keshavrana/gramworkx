<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="keshav">
    <form action="update.php" method="POST" enctype="multipart/form-data">
    <h2>GramworkX File Upload</h2>
    <?php
    if(isset($_GET['msg']))echo $_GET['msg']; 
    ?>
    
        <p>Device Model  <select name="model" id="id1" required>
            <option value="">--Select Device--</option>
            <option value="gwx100">gwx100</option>
            <option value="gwx200">gwx200</option>
        </select></p>
        <p>Firmware Vision <input type="text" name="number" id="id2" required></p>
        <p>Select Firmware <input type="file" name="file" id="id3" required></p>

    <button type="submit" name="submit">Upadte new firmware</button>
    </form>
    </div>
    
    <h2>Firmware Table</h2>

    <br>
    <?php
$conn = mysqli_connect("localhost","root","","fileuploaddata");
if ($conn-> connect_error){
    die("Connection failed:" . $conn-> connect_error);
}
$sql = "SELECT * FROM `table` WHERE 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>GWX Device</th><th>Firmware Vrsion</th><th>File Path</th><th>Created At</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["model"]. "</td><td> " . $row["number"]. "</td><td> " . $row["file"]. "</td><td> " . $row["date"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


    ?>

        
</body>
</html>