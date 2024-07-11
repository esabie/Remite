<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/styles.css" />
    <title>RemitE</title>

</head>
<body>

    <!-- Showcase -->
    <section
      class="signup  ">
      <div class="container mx-auto text-center  z-10"></div>
      <div class="container mx-auto text-center z-10"></div>
        <div class="bg-white p-8 rounded-lg shadow-md md:w-350 mx-auto my-3">
            <form id="convertForm" method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                <div class="logo" ></div>
                <h6 class="text-center">Login to your account</h6>
                <h1 class="text-center text-muted smalls">Don't have an account?
                    <a href="home.php"> Here</a>
                </h1>
                    <input type="text" name="phone" class="text-black" placeholder="Phone number" required>
                </div>
                <div class="form-group">
                    <input type="password" name="psw" class="text-black" placeholder="Password" required>

                </div>
                <button type="submit" class="submit-button">Log in
                <i class="fa-solid fa-lock"></i>
                </button>
            </form>
        </div>
    </section>


</body>


   


    </html>