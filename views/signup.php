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

   


</body>


    <!-- Showcase -->
    <section
      class="signup ">
      <div class="container mx-auto text-center z-10"></div>
      <div class="container mx-auto text-center z-10"></div>
        <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-600 mx-6">
            <form id="convertForm" method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <label for="sendAmount">Currency Pair:</label>
                    <input type="text" id="currencyPair" name="sendAmount" class="text-black" readonly value="<?php echo htmlspecialchars('GBP / GHS'); ?>">
                </div>
                <div class="form-group">
                    <label for="sendAmount">Send Amount:</label>
                    <input type="text" id="sendAmount" name="sendAmount" class="text-black" required value="<?php echo htmlspecialchars($sendAmount ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label for="equivalentAmount">Equivalent Amount:</label>
                    <input type="text" id="equivalentAmount" name="equivalentAmount" readonly value="<?php echo htmlspecialchars($equivalent); ?>">
                </div>
                <button type="submit" name="convert">Convert</button>
            </form>
        </div>
    </section>


    </html>