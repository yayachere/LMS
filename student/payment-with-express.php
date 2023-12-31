<?php include('../session.php');?>
<!Doctype html>
<html>
    <title>Payment</title>
    <style>
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 50%;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: black;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
  color: papayawhip;
}

.active {
  background-color: #04AA6D;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
* {
  box-sizing: border-box;
}


/* Center website */
.main {
  max-width: 1000px;
  margin: auto;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 8px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
  padding: 8px;
}

/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 24%;
  margin-left: 7px;
  box-shadow: 4px 7px 7px lightgray;
}
.column:hover {
    cursor: pointer;
    box-shadow: 2px 3px 3px lightgray;
}
/* Clear floats after rows */ 
.row:after {
  content: "";
  display: table;
  clear: both;
}
a {
    text-decoration: none;
    color: white;
}
a:hover {
    color: papayawhip;
}
/* Content */
.content {
  background-color: white;
  padding: 10px;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 900px) {
  .column {
    width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
</style>
    <body>
        <div class="navbar">
  <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="#"><i class="fa fa-fw fa-user"></i> Order</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
  <a href="logout.php"><i class="fa fa-fw fa-user"></i> Logout</a>
</div>
            <?php
      include '../dbConfig.php';
      $id = $_GET['id'];
      $prefix = "EWD";
      $tx_ref = $prefix . '_' . bin2hex(random_bytes(5)) . '_' .  date('d-m-y_h-i-s');

      $sql = mysqli_query($conn, "SELECT * FROM product WHERE id = '$id'");
      while ($row = mysqli_fetch_assoc($sql)) {
          $id = $row['id'];
          $pname = $row['name'];
          $pprice = $row['price'];
      }


    ?>
        <h2>Pay with Yenepay </h2>
        <a href="payment-with-cart.php">Go try with Cart</a><br><br>
        <form method="post" action="https://www.yenepay.com/checkout/">
            <input type="hidden" name="process" value="Express">
            <input type="hidden" name="successUrl" value="http://localhost/payment-with-yenepay/customer/success.php">
            <input type="hidden" name="ipnUrl" value="http://localhost/payment-with-yenepay/customer/ipn.php">
            <input type="hidden" name="cancelUrl" value="http://localhost/payment-with-yenepay/customer/index.php">
            <input type="hidden" name="merchantId" value="17506">
            <input type="hidden" name="merchantOrderId" value="<?= $tx_ref;?>">
            <input type="hidden" name="expiresAfter" value="24">
            <input type="hidden" name="itemId" value="<?= $id;?>">
            <input type="hidden" name="itemName" value="<?= $pname;?>">
            <input type="hidden" name="unitPrice" value="<?= $pprice;?>">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="discount" value="0">
            <input type="hidden" name="handlingFee" value="0">
            <input type="hidden" name="deliveryFee" value="0">
            <input type="hidden" name="tax1" value="0">
            <input type="hidden" name="tax2" value="0">
            <button type="submit">Pay with express</button>
        </form>
    </body>
</html>