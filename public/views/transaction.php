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

  <section
      class="transaction text-black ">
      <div class="container mx-auto text-center z-10"></div>
      <div class="container mx-auto text-center z-10"></div>
        <div class="bg-white p-8 rounded-lg shadow-md md:w-350 mx-auto my-3">
            <form id="convertForm" method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="container">
                    <h1 class="form-title text-center ">TRANSACTION<h1>
                        <form action="#">
                            <div class="form-group text-black">
                                <label for = "firstName"> Sender First Name</label>
                                <input type="text"
                                       id="senderfirstName"
                                       name="firstName">
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName"> Sender Last Name</label>
                                <input type="text"
                                       id="senderlastName"
                                       name="firstName">
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName"> First Name</label>
                                <input type="text"
                                       id="firstName"
                                       name="firstName">
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName"> First Name</label>
                                <input type="text"
                                       id="firstName"
                                       name="firstName">
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName"> First Name</label>
                                <input type="text"
                                       id="firstName"
                                       name="firstName">
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName"> First Name</label>
                                <input type="text"
                                       id="firstName"
                                       name="firstName">
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName"> First Name</label>
                                <input type="text"
                                       id="firstName"
                                       name="firstName">
                            </div>
                            <div class="form-group text-black">
                                <label for = "firstName"> First Name</label>
                                <input type="text"
                                       id="firstName"
                                       name="firstName">
                            </div>
                        </form>

                </div>

                <button type="submit" class="submit-button">Send Money</button>
            </form>
        </div>
    </section>


</body>



  </html>