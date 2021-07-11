<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History</title>
    <link rel="stylesheet" href="./navbar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
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
    <h2 class="heading">Transaction History</h2>
    <div>
        <table class="table-style">
            <thead>
                <tr>
                    <th class="text-center ">Sender</th>
                    <th class="text-center ">Receiver</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Date and Time</th>
                </tr>
            </thead>
        <tbody>
        <?php

include 'connect.php';

$sql ="select * from transaction";

$query =mysqli_query($conn, $sql);

while($rows = mysqli_fetch_assoc($query))
{
?>
<tr>
            <td class="td-style"><?php echo $rows['sender']; ?></td>
            <td class="td-style"><?php echo $rows['receiver']; ?></td>
            <td class="td-style"><?php echo $rows['balance']; ?> </td>
            <td class="td-style"><?php echo $rows['datetime']; ?> </td>
                
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>
<footer class="footer-style" style="bottom:800px;">
        <p><center>&copy 2021. Made by <b>Pragati Agrawal</b><br> The Sparks Foundation</center> </p>
      </footer>
</body>

</html>