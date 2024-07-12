<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                <a href="login.php" class="text-white hover:underline">Login</a>
                <a href="signup.php" class="text-white hover:underline">Register</a>
            </nav>
        </div>
    </header>

  <section
      class="transaction text-black ">
      <div class="container mx-auto text-center z-10"></div>
        <div class="bg-white p-8 rounded-lg shadow-md md:w-800 mx-auto my-3">
            <form id="convertForm" method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="container">
                    <h1 class="form-title text-center ">TRANSACTION<h1>
                        <form action="#">
                            <div class="form-group text-black">
                                <label for = "firstName"> Sender First Name</label>
                                <input type="text" id="senderfirstName" name="secondfirstName" required>
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName"> Sender Last Name</label>
                                <input type="text" id="senderlastName" name="secondlastName" required>
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName"> First Name</label>
                                <input type="text" id="firstName" name="firstName" readonly>
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName">Last Name</label>
                                <input type="text" id="secondName" name="secondName">
                            </div>
                            <div class="form-group text-black">
                                <label for = "phone"> Sender Phone Number</label>
                                <input type="phone" id="sender_phone" name="phone" required>
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName"> Receiver Phone Number</label>
                                <input type="text" id="phone" name="phone" required>
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName"> Amount</label>
                                <input type="text" id="amount" name="amount" required>
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName"> Network</label>
                                <input type="text" id="firstName" name="firstName">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 relative">
                                    <label for = "firstName"> Network</label>
                                    <input type="text" id="firstName" name="firstName">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for = "firstName"> Colombia</label>
                                    <input type="text" id="firstName" name="firstName">
                                </div>
                            </div>
                        </form>

                </div>

                <button type="submit" class="submit-button">Send Money</button>
            </form>
        </div>
    </section>


</body>



  </html>