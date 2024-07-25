<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>eRem - Send Money Anywhere</title>
  </head>

  <header class="bg-red-900 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-semibold">
                <a href="home.php">RemitE</a>
            </h1>
            <nav class="space-x-4">
                <a href="login.php" class="text-white hover:underline">Logout</a>
                <a href="signup.php" class="text-white hover:underline">Register</a>
            </nav>
        </div>
    </header>

  <section
      class="transaction text-black h-72">
      <div class="row">
      <div class="container mx-auto text-center z-10"></div>
        <div class="bg-white p-8 rounded-lg shadow-md md:w-800 mx-auto my-3">
            <form id="convertForm" method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="container">
                    <h1 class="form-title text-center h5 strong">TRANSACTION<h1>
                        <form action="#">
                            <div class="row">
                                <div class="form-group col-md-6 relative">
                                    <label for = "firstName"> Sender First Name</label>
                                    <input type="text" id="senderfirstName" name="name" required>
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "lastName"> Sender Last Name</label>
                                    <input type="text" id="senderlastName" name="name" required>
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "senderPhone"> Sender Phone Number</label>
                                    <input type="phone" id="senderPhoneNumber" placeholder="233" name="phone" required>
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "mno"> Network</label>
                                    <select name="mno" id="mno">
                                        <option value="zeepay">Zeepay</option>
                                        <option value="mtn">MTN</option>
                                        <option value="vodafone">Vodafone</option>
                                        <option value="airteltigo">AirtelTigo</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "phone"> Beneficiary Phone Number</label>
                                    <input type="phone" id="benef_phone" placeholder="233" name="phone" required>
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "amount"> Amount (GHS)</label>
                                    <input type="number" id="amount" name="number" required>
                                </div>
                                <div class="form-group col-md-12 relative">
                                    <label for = "receiverfirstName">Beneficiary Name</label>
                                    <input type="text" id="receiverfirstName" name="receiverfirstName" required readonly>
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "purpose"> Purpose of Transaction</label>
                                    <input type="text" id="purpose" name="purpose" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for = "destination"> Destination</label>
                                    <input type="text" id="wallet" name="wallet" placeholder="Wallet" readonly>
                                </div>
                        <button type="submit" class="submit-button">Send Money</button>
                            
                        </form>

                </div>
                </div>
            </form>
            </div>
        </div>
    </section>


</body>



  </html>