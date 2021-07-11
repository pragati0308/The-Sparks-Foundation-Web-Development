<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Details</title>
    <link rel="stylesheet" type="text/css" href="./navbar.css">

</head>
<body>
<div style="display:block;">
    <nav class="navbar">
      <a class="navbar-brand" href="index.php">VIJAYA BANK</a>
      </button>
      <div class="navbar-style" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="details.php">User Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transfer.php">Transfer Money</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transactionhistory.php">Transaction History</a>
              </li>
          </div>
       </nav>
</div>
  <div>
  <img src="img/bank.jpg" class="img-style1" style="height:1000px;">
  <div class="container">
        <h2 class="heading">User Details</h2>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div ><center>
            <table class="table-style">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>
                    
                <?php
  include('connect.php');
$sql = "SELECT * FROM details";
$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
  
while($row = mysqli_fetch_assoc($result)){

       echo '<tr>';
       echo '<td class="td-style">'.$row['id'].'</td>';
       echo '<td class="td-style">'.$row['Name']."</td>";
       echo '<td class="td-style">'.$row['Email']."</td>";
       echo '<td class="td-style">'.$row['currentbalance']."</td>";
       echo "</tr>";
       }
} else {
  echo "0 results";
}
?>
                </tr>
            </table>
</center>
        </div>
    </div>
    <footer class="footer-style" style="bottom:800px;">
        <p><center>&copy 2021. Made by <b>Pragati Agrawal</b><br> The Sparks Foundation</center> </p>
      </footer>

  </body>
  </html>