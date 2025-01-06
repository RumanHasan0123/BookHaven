<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $card_number = htmlspecialchars($_POST["card_number"]);
    $expiry_date = htmlspecialchars($_POST["expiry_date"]);
    $cvv = htmlspecialchars($_POST["cvv"]);

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    if (!preg_match("/^\d{16}$/", $card_number)) {
        die("Invalid card number.");
    }

    if (!preg_match("/^\d{3}$/", $cvv)) {
        die("Invalid CVV.");
    }


    $payment_status = rand(0, 1) ? "success" : "failure";

    if ($payment_status === "success") {
        echo "<h1>Payment Successful!</h1>";
        echo "<p>Thank you, $name. Your payment has been processed.</p>";
    } else {
        echo "<h1>Payment Failed!</h1>";
        echo "<p>Sorry, $name. Please try again.</p>";
    }
} else {
    echo "Invalid request method.";
}
?>
