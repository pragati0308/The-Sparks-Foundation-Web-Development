<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="./navbar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<body>

    <?php
    include 'connect.php';
    $sql = "SELECT * FROM details";
    $result = mysqli_query($conn, $sql);
    ?>


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
    <h2 class="heading">Transfer Money</h2>
    <div>
        <table class="table-style">
            <thead>
                <tr>
                    <th class="text-center ">Id</th>
                    <th class="text-center ">Name</th>
                    <th class="text-center ">E-Mail</th>
                    <th class="text-center">Balance</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($rows = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td class="td-style">
                    <?php echo $rows['id'] ?>
                </td>
                <td class="td-style">
                    <?php echo $rows['Name'] ?>
                </td>
                <td class="td-style">
                    <?php echo $rows['Email'] ?>
                </td>
                <td class="td-style">
                    <?php echo $rows['currentbalance'] ?>
                </td>
                <td class="td-style"><a href="transfermoney.php?id=<?php echo $rows['id']; ?>"> <button class="button-style">Transact</button></a></td>
            </tr>
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