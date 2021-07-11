<?php
include 'connect.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from details where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from details where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    //Conditions
    //For negative value
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Negative value cannot be transferred !")';
        echo '</script>';
    }
    //Insufficient balance
    else if($amount > $sql1['currentbalance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Sorry! you have insufficient balance !")';
        echo '</script>';
    }
    //For 0 (zero) value
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Zero value cannot be transferred !')";
         echo "</script>";
     }


    else {
                $newbalance = $sql1['currentbalance'] - $amount;
                $sql = "UPDATE details set currentbalance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             
                $newbalance = $sql2['currentbalance'] + $amount;
                $sql = "UPDATE details set currentbalance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successfully !');
                                     window.location='transactionhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money</title>
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
<div >
    <img src="img/bank.jpg" class="img-style1" style="height:1000px;">
    <div style="position:relative;bottom:1000px;">
        <h2 class="heading">Customer Details</h2>
            <?php
                include 'connect.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  details where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table-style">
                <tr style="color : black;" class="table-primary">
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr style="color : black;">
                    <td class="td-style"><?php echo $rows['id'] ?></td>
                    <td class="td-style"><?php echo $rows['Name'] ?></td>
                    <td class="td-style"><?php echo $rows['Email'] ?></td>
                    <td class="td-style"><?php echo $rows['currentbalance'] ?></td>
                </tr>
            </table>
        </div>
        <h2 class="heading">Transer Money Here !</h2>
        <label class="label-style"><strong>Transfer To:</strong></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'connect.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM details where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['Name'] ;?> 
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label class="label-style"><strong>Amount:</strong></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div >
                <button class="button-style" name="submit" type="submit" id="myBtn" >Fill the Amount and Transfer</button>
            </div>
        </form>
            </div>
    </div>    
    <footer class="footer-style" style="bottom:1000px;">
        <p><center>&copy 2021. Made by <b>Pragati Agrawal</b><br> The Sparks Foundation</center> </p>
      </footer>
</body>

</html>