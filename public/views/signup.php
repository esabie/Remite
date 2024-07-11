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
            <form id="convertForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                <div class="logo" ></div>
                <h6 class="text-center">Create an Account. It's free!</h6>
                <h1 class="text-center text-muted smalls">Already have an account?
                    <a href="login.php"> Login</a>
                </h1>
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="text-black" placeholder="First name" required>
                    <input type="text" name="name" class="text-black" placeholder="Last name" required>
                    <input type="email" name="email" class="text-black" placeholder="Email Address" required>
                    <input type="text" name="phone" class="text-black" placeholder="Phone number" required>
                    <input type="password" name="psw" class="text-black" placeholder="Password" required>
                    <input type="password" name="psw" class="text-black" placeholder="Confirm Password" required>

                </div>
                <button type="submit" class="submit-button">Continue
                <i class="fa-solid fa-lock"></i>
                </button>
            </form>
        </div>
    </section>


</body>





    </html>