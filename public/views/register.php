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

<body class="bg-gray-100">

    <?php
// PHP logic for fetching rates and processing form submission
$equivalent = "";
if (isset($_GET['convert'])) {
    if (!empty($_GET['sendAmount'])) {
        $sendAmount = $_GET['sendAmount'];

        // Fetch exchange rates from the API
        $url = 'https://rates.myzeepay.com/api/rates/7/GBP/GHS/05-07-24';

        // Initialize cURL session
        $curl = curl_init($url);

        // Set the CURLOPT_RETURNTRANSFER option to true to return the result as a string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute the GET request
        $response = curl_exec($curl);

        // Close the cURL session
        curl_close($curl);

        // Check if response is successful
        if ($response) {
            $data = json_decode($response, true);

            // Check if the expected data structure is present
            if (isset($data['rates']['rate'])) {
                $rate = $data['rates']['rate'];
                $equivalent = $sendAmount * $rate;
                //echo $equivalent;
            } else {
                echo '<p>Error: Failed to fetch exchange rates.</p>';
            }
        } else {
            echo '<p>Error: Failed to fetch exchange rates.</p>';
        }
    } else {
        echo '<p>Error: Amount is required.</p>';
    }
}
?>

    <!-- Header -->
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

    <section class="bg-red-900 text-black p-4 h-72 flex items-center">
        <div class="container mx-auto text-center z-10">
            <img src="/images/1.png" class="h-1"/>
        </div>
        <div class="bg-gray-custom p-8 rounded-lg shadow-md w-full md:w-600 mx-6">
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

    <!-- Bottom Banner -->

</body>



</html>
