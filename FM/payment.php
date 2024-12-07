<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout Form</title>
<style>
  body {
    font-family: Arial, sans-serif;
    font-size: 16px;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
  }

  .container {
    max-width: 600px;
    margin: 50px auto;
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
  }

  label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
  }

  input[type="text"], input[type="email"], input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .row {
    display: flex;
    gap: 10px;
  }

  .col {
    flex: 1;
  }

  .btn {
    display: block;
    width: 100%;
    padding: 12px;
    background-color: #28a745;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
  }

  .btn:hover {
    background-color: #218838;
  }

  .error {
    color: red;
    font-size: 14px;
    margin-top: -10px;
    margin-bottom: 10px;
  }

  .success {
    text-align: center;
    color: green;
    font-weight: bold;
    margin-top: 20px;
  }
</style>
</head>
<body>

<div class="container">
  <h2>Checkout Form</h2>
  <form id="checkoutForm" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <!-- <form id="checkoutForm" action="https://www.sandbox.paypal.com/signin?returnUri=https%3A%2F%2Fwww.sandbox.paypal.com%2Fmep%2F" method="POST"> -->
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="jultranet-facilitator@gmail.com">
    <input type="hidden" name="currency_code" value="INR">
    <input type="hidden" name="item_name" value="Product Name">
    <input type="hidden" name="amount" value="100.00">

    <!-- Customer Details -->
    <label for="fullname">Full Name</label>
    <input type="text" id="fullname" name="fullname" placeholder="John Doe" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="john.doe@example.com" required>

    <label for="address">Address</label>
    <input type="text" id="address" name="address" placeholder="1234 Main St" required>

    <label for="city">City</label>
    <input type="text" id="city" name="city" placeholder="New York" required>

    <div class="row">
      <div class="col">
        <label for="state">State</label>
        <input type="text" id="state" name="state" placeholder="NY" required>
      </div>
      <div class="col">
        <label for="zip">Zip Code</label>
        <input type="number" id="zip" name="zip" placeholder="10001" required>
      </div>
    </div>

    <!-- Payment Information -->
    <h3>Payment</h3>
    <label for="cardname">Name on Card</label>
    <input type="text" id="cardname" name="cardname" placeholder="John Doe" required>

    <label for="cardnumber">Card Number</label>
    <input type="text" id="cardnumber" name="cardnumber" placeholder="1111-2222-3333-4444" required>

    <div class="row">
      <div class="col">
        <label for="expmonth">Exp Month</label>
        <input type="text" id="expmonth" name="expmonth" placeholder="MM" required>
      </div>
      <div class="col">
        <label for="expyear">Exp Year</label>
        <input type="number" id="expyear" name="expyear" placeholder="YYYY" required>
      </div>
    </div>

    <label for="cvv">CVV</label>
    <input type="text" id="cvv" name="cvv" placeholder="123" required>

    <button type="submit" class="btn">Pay with PayPal</button>
  </form>
  <!-- <div class="success" id="successMessage" style="display: none;">
    Payment Successful! Thank you for your purchase.
  </div> -->
</div>

<script>
  const form = document.getElementById('checkoutForm');
  form.addEventListener('submit', function (e) {
    e.preventDefault(); 

    const fullname = document.getElementById('fullname').value.trim();
    const email = document.getElementById('email').value.trim();
    const address = document.getElementById('address').value.trim();
    const city = document.getElementById('city').value.trim();
    const state = document.getElementById('state').value.trim();
    const zip = document.getElementById('zip').value.trim();
    const cardname = document.getElementById('cardname').value.trim();
    const cardnumber = document.getElementById('cardnumber').value.trim();
    const expmonth = document.getElementById('expmonth').value.trim();
    const expyear = document.getElementById('expyear').value.trim();
    const cvv = document.getElementById('cvv').value.trim();

    if (
      !fullname ||
      !email ||
      !address ||
      !city ||
      !state ||
      !zip ||
      !cardname ||
      !cardnumber ||
      !expmonth ||
      !expyear ||
      !cvv
    ) {
      alert('Please fill out all fields.');
      return;
    }

    if (cardnumber.length !== 16 || isNaN(cardnumber)) {
      alert('Invalid card number. Card number should be 16 digits.');
      return;
    }

    if (cvv.length !== 3 || isNaN(cvv)) {
      alert('Invalid CVV. CVV should be 3 digits.');
      return;
    }

    if (isNaN(expmonth) || expmonth < 1 || expmonth > 12) {
      alert('Invalid expiration month. Enter a value between 01 and 12.');
      return;
    }

    if (isNaN(expyear) || expyear < new Date().getFullYear()) {
      alert('Invalid expiration year. Enter a valid future year.');
      return;
    }

    // document.getElementById('successMessage').style.display = 'block';
    form.submit(); 
  });
</script>

</body>
</html>
