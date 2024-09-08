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

  <?php

// PHP logic for fetching wallet information and processing form submission

if (isset($_POST['validate-button'])) {
    if (!empty($_POST['phone'])) {
        $msisdn = $_POST['sender_phone'];
        $sender_first_name = $_POST['firstname'];
        $sender_last_name = $_POST['lastname'];
        $msisdn = $_POST['sender_phone'];
        $purpose = $_POST['purpose'];
        $amount = $_POST['amount'];
        $receiver_msisdn = $_POST['phone'];
        $sender_msisdn = $_POST['sender_phone'];

        // API endpoint URL
        $url = 'https://test.digitaltermination.com/api/payouts/account-verification';

        // Data to be sent in the request body
        $body = array(
            'service_type' => 'Wallet',
            'mobile_number' => $receiver_msisdn,
            'receiving_country' => 'GHA',
        );

        // Encode the data as JSON
        $postData = json_encode($body);

        // Initialize cURL session
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://test.digitaltermination.com/api/payouts/account-verification',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ',
            ),
        ));

        // Execute the GET request
        $response = curl_exec($curl);

        // Close the cURL session
        curl_close($curl);
        echo "<script>
        var requestData = " . json_encode($postData) . ";
        var responseData = " . json_encode($response) . ";
        console.log('Request Data:', requestData);
        console.log('Response Data:', responseData);
      </script>";

        // Check if response is successful
        if ($response) {
            $data = json_decode($response, true);

            // Check if the expected data structure is present
            if (isset($data['response']['registered_name'])) {
                $name = $data['response']['registered_name'];
                //echo $name;
            }

            if (isset($data['response']['mno'])) {
                $mno = $data['response']['mno'];
                //echo $mno;
            } else {
                echo '<p>Error: Failed to validate number.</p>';
            }
        } else {
            echo '<p>Error: Failed to validate number.</p>';
        }
    } else {
        echo '<p>Error: Amount is required.</p>';
    }
}

if (isset($_POST['send-money-button'])) {

    if (!empty($_POST['mno']) && !empty($_POST['amount']) && !empty($_POST['phone'])) {
        $customerName = 'Eugene Osei';
        $mno = 'Zeepay';
        $amount = $_POST['amount'];
        $msisdn = $_POST['phone'];
        $description = 'Merchant';
        $reference = uniqid(); // Generate a unique reference, replace with $guid logic if available
        $callback_url = 'https://webhook.site/4830445f-aac7-4afd-9658-2819d4051a56';

        // API endpoint URL
        $url = 'https://test.digitaltermination.com/api/instntmny-local/transactions/wallets/debit-wallet';

        // Data to be sent in the request body
        $body = array(
            'customerName' => $customerName,
            'mno' => $mno,
            'amount' => $amount,
            'msisdn' => $msisdn,
            'description' => $description,
            'reference' => $reference,
            'callback_url' => $callback_url,
        );

        // Encode the data as JSON
        $postData = json_encode($body);

        // Initialize cURL session
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ',
            ),
        ));

        // Execute the request and get the response
        $response = curl_exec($curl);

        // Close the cURL session
        curl_close($curl);

        // Check if response is successful and log the request and response
        echo "<script>
        var requestData = " . json_encode($body) . ";
        var responseData = " . json_encode($response) . ";
        console.log('Request Data:', requestData);
        console.log('Response Data:', responseData);
        </script>";

        if ($response) {
            $data = json_decode($response, true);

            // Process response data as needed
            if (isset($data['code']) && $data['code'] == 411) {
                //echo "<p>Transaction submitted Successfully: " . htmlspecialchars($data['message']) . "</p>";
                echo "<script>
                alert('Payment Confirmation: Transaction has been submitted successfully for processing.');
                window.location.href = '../views/transaction.php'; // Redirect to confirmation page
                </script>";
            } else {
                echo "<p>Transaction Failed: " . htmlspecialchars($data['message']) . "</p>";
            }
        } else {
            echo "<p>Error: Failed to initiate debit request.</p>";
        }
    } else {
        echo '<p>Error: All fields are required.</p>';
    }
}

?>

  <header class="transaction text-black p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-semibold">
                <a href="../views/home.php">RemitE</a>
            </h1>
            <nav class="space-x-4">
                <button type="submit" class="logout-button">
                    <a href="../views/login.php" class="text-white">Logout</a>
                </button>
            </nav>
        </div>
    </header>

  <section
      class="transaction text-black h-72 w-full">
      <div class="row">
      <div class="container mx-auto text-center z-10"></div>
        <div class="bg-white p-8 rounded-lg shadow-md md:w-800 mx-auto my-3">
            <form id="convertForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="container">
                    <h1 class="form-title text-center h5 strong">TRANSACTION<h1>
                        <form action="#">
                            <div class="row">
                                <div class="form-group col-md-6 relative">
                                    <label for = "firstName"> Sender First Name</label>
                                    <input type="text" id="senderfirstName" name="firstname" required value="<?php echo isset($sender_first_name) ? htmlspecialchars($sender_first_name) : ''; ?>">
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "lastName"> Sender Last Name</label>
                                    <input type="text" id="senderlastName" name="lastname" required value="<?php echo isset($sender_last_name) ? htmlspecialchars($sender_last_name) : ''; ?>">
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "senderPhone"> Sender Phone Number</label>
                                    <input type="phone" id="senderPhoneNumber" placeholder="233" name="sender_phone" required value="<?php echo isset($msisdn) ? htmlspecialchars($msisdn) : ''; ?>">
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "purpose"> Purpose of Transaction</label>
                                    <input type="text" id="purpose" name="purpose" value="<?php echo isset($purpose) ? htmlspecialchars($purpose) : ''; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for = "destination"> Destination</label>
                                    <input type="text" id="wallet" name="wallet" placeholder="Wallet" readonly>
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "amount"> Amount (GHS)</label>
                                    <input type="number" id="amount" name="amount" required value="<?php echo isset($amount) ? htmlspecialchars($amount) : ''; ?>">
                                </div>
                                <div class="form-group col-md-10 relative">
                                    <label for = "phone"> Beneficiary Phone Number</label>
                                    <input type="phone" id="benef_phone" placeholder="233" name="phone" required value="<?php echo isset($receiver_msisdn) ? htmlspecialchars($receiver_msisdn) : ''; ?>">
                                </div>
                                <button type="submit" class="text-blue-500 hover:underline" name="validate-button">Validate</button>

                                <div class="form-group col-md-8 relative">
                                    <label for = "receiverfirstName">Beneficiary Name</label>
                                    <input type="text" id="receiverfirstName" name="receiverfirstName" required readonly value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
                                </div>
                                <div class="form-group col-md-4 relative">
                                    <label for = "mno"> Network </label>
                                    <input type="text" id="network" name="mno" required readonly value="<?php echo isset($mno) ? htmlspecialchars($mno) : ''; ?>" >
                                </div>

                                <button type="submit" name="send-money-button" class="submit-button">Send Money
                                <i class="fa-solid fa-money-bills"></i>
                                </button>

                        </form>

                </div>
                </div>
            </form>
            </div>
        </div>
    </section>



</body>



  </html>