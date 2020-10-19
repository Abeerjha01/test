<h1>sdgfou<h1>
<?php
$name = $_POST['gname'];
$name2 = $_POST['lname'];
$ticker = $_POST['stock'];
echo $name;
echo $name2;
echo $ticker;
?>

<div class = "w3-container">
    <table align="Left" border="1px" class = "w3-table-all w3-hoverable tbody tr:hover" style = width:300px>
      <tr>
        <th colspan = "2" class = w3-large style = text-align:center> Actual Values </th>
      </tr>
      <tr>
        <td style = width:150px> Moving Avg. </td>
        <td style = width:100px id = "average">  </td>
      </tr>
      <tr>
        <td style = width:150px> SD </td>
        <td style = width:100px id = "sd">  </td>
      </tr>
      <tr>
        <td style = width:150px> Distribution </td>
        <td style = width:100px id = 'distribution'>  </td>
      </tr>
    </table>
    <table align="Right" border="1px" class = "w3-table-all w3-hoverable tbody tr:hover" style = width:300px>
      <tr>
      <th colspan = "2" class = w3-large style = text-align:center> Predicted Values </th>
      </tr>
      <tr>
        <td style = width:150px> Mean </td>
        <td style = width:100px id = "p_average">  </td>
      </tr>
      <tr>
        <td style = width:150px> SD </td>
        <td style = width:100px id = "p_sd">  </td>
      </tr>
      <tr>
        <td style = width:150px> Distribution </td>
        <td style = width:100px id = "p_distribution">  </td>
      </tr>
    </table>
    <table align="center" border="1px" class = "w3-table-all w3-hoverable tbody tr:hover" style = width:600px id = 'Table'>
      <tr>
        <th> Date </th>
        <th> Day </th>
        <th> Actual </th>
        <th> Predicted </th>
        <th> Deviation </th>
      </tr>
      
      <?php
            //  $toDate = $fromDate = $tableName = "";

            //  if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //    $fromDate = $_POST["fromDate"];
            //    $toDate = $_POST["toDate"];
            //    $tableName = $_POST["tableName"];
            //  }
       
        $conn = mysqli_connect("localhost", "root", "", "Stock");
  // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
          }
        $sql = "SELECT * FROM `$ticker` WHERE date >= '$name' and date <= '$name2'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Date"]. "</td><td>" . $row["Day"] . "</td><td>"
        . $row["Actual"]. "</td><td>" . $row["Predicted"] . "</td><td>" . $row["Deviation"] . "</td></tr>";
        }
        echo "</table>";
      } else { echo "0 results"; }
        $conn->close();
      ?>
    </table>
  </div>
