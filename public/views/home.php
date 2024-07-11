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
  <body class="bg-gray-100">
    <!-- Nav -->
    <header class="bg-red-900 text-white p-4">
      <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
          <a href="/">RemitE</a>
        </h1>
        <nav class="space-x-4">
          <a
          base href="./views/register.php" method="post"
            class="bg-whites hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300"
            ><i class="fa-solid fa-money-bills"></i> Send Money Now</a>
        </nav>
      </div>
    </header>


    <!-- Showcase -->
    <section
      class="showcase relative bg-cover bg-center bg-no-repeat h-72 flex items-center">
      <div class="container mx-auto text-center z-10"></div>
    </section>

    <!-- Top Banner -->
    <section class="bg-red-900 text-white py-6 text-center">
      <div class="container mx-auto">
        <h2 class="text-3xl font-semibold">Easier than the bank</h2>
        <p class="text-lg mt-2">
        Sending money to Ghana with RemitE is cheap and simple. Better than paying e-levy to Addo-D.
        </p>
      </div>
    </section>

    <!-- Services -->
    <section>
      <div class="container mx-auto p-4 mt-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
          <!-- Send Money -->
          <div class="rounded-lg shadow-md bg-white">
          <div class="sendsymbol relative bg-cover bg-center bg-no-repeat h-30 flex items-center">
            </div>
          </div>

          <!-- Receive Money -->
        <div class="rounded-lg shadow-md bg-white">
        <div class="receivesymbol relative bg-cover bg-center bg-no-repeat h-30 flex items-center">
          </div>
        </div>

        <!-- Receive Money 2 -->
        <div class="rounded-lg shadow-md bg-white">
        <div class="cash-pickupsymbol relative bg-cover bg-center bg-no-repeat h-20 flex items-center">

        </div>


      </section>

       <!-- Bottom Banner -->
      <section class="container mx-auto my-6">
      <div
        class="bg-blue-800 text-white rounded p-4 flex items-center justify-between"
      >
        <div>
          <p class="text-gray-200 text-lg mt-2">
          This service reduces the risk of paying e-levy to Addo-D.
          </p>
        </div>
        <a
          href="signup.php"
          class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300"
        >
          <i class="fa-solid fa-user-plus"></i> Sign Up
        </a>
      </div>
    </section>

  </body>
</html>
