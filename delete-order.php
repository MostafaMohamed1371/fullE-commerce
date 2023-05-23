<?php require_once('header.php'); ?>

<?php
echo $_GET['id'];
// Check if the customer is logged in or not
if(!isset($_SESSION['customer'])) {
    header('location: '.BASE_URL.'logout.php');
    exit;
} else {
	$sql = "DELETE FROM tbl_payment 
WHERE (customer_email=?)
AND   (id =?)";
    // If customer is logged in, but admin make him inactive, then force logout this user.
            $statement = $pdo->prepare($sql);
            $statement->execute(array($_SESSION['customer']['cust_email'] , $_GET['id']));
        header('location: '.BASE_URL.'customer-order.php');
        exit;
}
?>