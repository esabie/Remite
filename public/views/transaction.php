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

if (isset($_GET['validate-button'])) {
    if (!empty($_GET['phone'])) {
        $msisdn = $_GET['phone'];
        $sender_first_name = $_GET['firstname'];

        // API endpoint URL
        $url = 'https://test.digitaltermination.com/api/payouts/account-verification';

        // Data to be sent in the request body
        $body = array(
            'service_type' => 'Wallet',
            'mobile_number' => $msisdn,
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
                'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImJmYmVhMGM2NDY5NmIxMzI0ZTZlYmQ4NzZjNTVkYzhlYmI1MTk2Mjc2NzVhNWJjNzc1ZjkxOThlYjcyNmJlMzc1ZDQxZDg4M2ViMzRhZTQwIn0.eyJhdWQiOiI4NiIsImp0aSI6ImJmYmVhMGM2NDY5NmIxMzI0ZTZlYmQ4NzZjNTVkYzhlYmI1MTk2Mjc2NzVhNWJjNzc1ZjkxOThlYjcyNmJlMzc1ZDQxZDg4M2ViMzRhZTQwIiwiaWF0IjoxNzIwMDkzMjAzLCJuYmYiOjE3MjAwOTMyMDMsImV4cCI6MTc1MTYyOTIwMywic3ViIjoiMTQxIiwic2NvcGVzIjpbXX0.dtvN0oXNeagkEFcZd1rE8YrbDCDPtVpiXt0qhWDm1KHcww8Ck2USxTBdJL-kqd21RN5AEozUWVuP0KDTl8_maovDyJTk8wANf5M2kWhjiiWC19wnrNQCzZ4Zs6MnqZnJnefTMeP5gMvhoEdCRp2jSYn4FAfrr7fVDSfnbpUp9WgESFtBYTTCQ5_GGxNtQd4fZQj-na2oRg_36R1HO7P0PZGlNcMU7Nep3w5raFZ_Kg304ocBeMaBT5nGK_V20JlGQ-MmFsl6FKeP3i1x5zDtc6isD2YeX8EHt7C5HmsTJdcRrAA_NK7Msty72n9IzguNuVtBNML_ihQVG8vrXS4uWSSz0ziHyyur_ETv1TqC4nT_oC4jCnPvB-w_D6T5HjNFp0KqL2c1lIzRHWEJRRv8fQ8ieuJCxAVdE2KhNepUsM6DcTLBJMh-z_59JCSJ_K500CIOEEHVjPvbm_2OAzVs7Q0QFQzuxZkaEKyAwmYIy4Wx72J_3sSeKP2Y6PHIFwSOlnYy3sruXKNvu3zRiBPKHpDf3LAsl2glCl4G93dCNrcRQQ4aS7b3RTyqEAgVBLRWYfdjFwQnqgEd5IdjS1LxleGlc3cG3CNOyX1iYF-xh-EZNmfuunL88mRsYj0EuRHoVYJkGINv20huBs_syrBSr_QBU96eSc78KJKpoGS17CA',
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
?>

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
                                    <input type="text" id="senderfirstName" name="firstname" required value="<?php echo isset($firstname) ? htmlspecialchars($firstname) : ''; ?>">
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "lastName"> Sender Last Name</label>
                                    <input type="text" id="senderlastName" name="lastname" required>
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "senderPhone"> Sender Phone Number</label>
                                    <input type="phone" id="senderPhoneNumber" placeholder="233" name="phone" required>
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "purpose"> Purpose of Transaction</label>
                                    <input type="text" id="purpose" name="purpose" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for = "destination"> Destination</label>
                                    <input type="text" id="wallet" name="wallet" placeholder="Wallet" readonly>
                                </div>
                                <div class="form-group col-md-6 relative">
                                    <label for = "amount"> Amount (GHS)</label>
                                    <input type="number" id="amount" name="number" required>
                                </div>
                                <div class="form-group col-md-8 relative">
                                    <label for = "phone"> Beneficiary Phone Number</label>
                                    <input type="phone" id="benef_phone" placeholder="233" name="phone" required>
                                </div>
                                <button type="submit" name="validate-button">Validate</button>

                                <div class="form-group col-md-8 relative">
                                    <label for = "receiverfirstName">Beneficiary Name</label>
                                    <input type="text" id="receiverfirstName" name="receiverfirstName" required readonly value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
                                </div>
                                <div class="form-group col-md-4 relative">
                                    <label for = "mno"> Network </label>
                                    <input type="text" id="network" name="purpose" required readonly value="<?php echo isset($mno) ? htmlspecialchars($mno) : ''; ?>" >
                                </div>


                        <button type="submit" name="submit-button">Send Money</button>

                        </form>

                </div>
                </div>
            </form>
            </div>
        </div>
    </section>



</body>



  </html>