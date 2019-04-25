<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pricing Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body class="text-center m-4">
  <h1>Monthly Membership</h1>
  <hr>
  <h4><b>DEMO MODE</b></h4>
  <p><b>Enter Credit Card Details:</b></p>
  <p><b>#:</b> 4242 4242 4242 4242</p>
  <p><b>Exp:</b> Any future date</p>
  <p><b>CVC:</b> 123</p>
    <div class="container mb-5">
    <div class="row">
      <div class="col-md-4">
        <div class="card mx-auto">
          <div class="card-header text-center">
            <h2 class="price">
              <span class="currency">$</span>15
            </h2>
          </div>
          <div class="card-body">
            <h1 class="text-center">Starter</h1>
            <ul class="list-group">
              <li class="list-group-item">14-Day Free Trial</li>
              <li class="list-group-item">Feature 2</li>
              <li class="list-group-item">Feature 3</li>
            </ul>
          </div>
          <div class="card-footer text-center">
            <form action="payment_process.php?prodId=1" method="POST">
              <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_a1D8NQroGjSKbWzT16v4WZnq"
                data-amount="1500"
                data-name="Brandon Winger-Air"
                data-description="Widget"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="cad">
              </script>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mx-auto">
          <div class="card-header text-center">
            <h2 class="price">
              <span class="currency">$</span>30
            </h2>
          </div>
          <div class="card-body">
            <h1 class="text-center">Pro</h1>
            <ul class="list-group">
              <li class="list-group-item">Feature 1</li>
              <li class="list-group-item">Feature 2</li>
              <li class="list-group-item">Feature 3</li>
            </ul>
          </div>
          <div class="card-footer text-center">
            <form action="payment_process.php?prodId=2" method="POST">
              <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_a1D8NQroGjSKbWzT16v4WZnq"
                data-amount="3000"
                data-name="Brandon Winger-Air"
                data-description="Widget"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="cad">
              </script>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mx-auto">
          <div class="card-header text-center">
            <h2 class="price">
              <span class="currency">$</span>50
            </h2>
          </div>
          <div class="card-body">
            <h1 class="text-center">Elite</h1>
            <ul class="list-group">
              <li class="list-group-item">Feature 1</li>
              <li class="list-group-item">Feature 2</li>
              <li class="list-group-item">Feature 3</li>
            </ul>
          </div>
          <div class="card-footer text-center">
            <form action="payment_process.php?prodId=3" method="POST">
              <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_a1D8NQroGjSKbWzT16v4WZnq"
                data-amount="5000"
                data-name="Brandon Winger-Air"
                data-description="Widget"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="cad">
              </script>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <h5>Monthly Membership &copy; 2019</h5>
</body>
</html>