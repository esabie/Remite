<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/styles.css" />
    <title>RemitE</title>

    <style>
    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      color: white;
    }
    .form-group input {
      width: 100%;
      padding: 0.5rem;
      margin-bottom: 1rem;
      border-radius: 0.25rem;
      border: 1px solid #d1d5db; /* border-gray-300 */
    }
    .form-group button {
      background-color: black; /* bg-blue-500 */
      color: black;
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: 0.375rem;
      cursor: pointer;
    }
    .form-group button:hover {
      background-color: #1d4ed8; /* hover:bg-blue-600 */
    }
  </style>
</head>

<body class="bg-gray-100">
    <?php
    // require '../helpers.php';
    require '../public/rates.php';

    ?>
    <!-- Header -->
    <header class="bg-red-900 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-semibold">
                <a href="home.php">RemitE</a>
            </h1>
            <nav class="space-x-4">
                <a href="login.html" class="text-white hover:underline">Login</a>
                <a href="register.html" class="text-white hover:underline">Register</a>
            </nav>
        </div>
    </header>

    <section class="bg-red-900 text-white p-4 h-72 flex items-center">
        <div class="container mx-auto text-center z-10"></div>
        <div class="bg-gray-custom p-8 rounded-lg shadow-md w-full md:w-600 mx-6">
            <form id="convertForm">
                <div class="form-group">
                    <label for="sendAmount">Send Amount:</label>
                    <input type="text" id="sendAmount" name="sendAmount" class="text-black" required>
                </div>
                <div class="form-group">
                    <label for="equivalentAmount">Equivalent Amount:</label>
                    <input type="text" id="equivalentAmount" name="equivalentAmount" readonly>
                </div>
                <button type="button" class="" onclick="convertAmount()">Convert</button>
            </form>
        </div>
    </section>

    <!-- Bottom Banner -->


    <script>
        function convertAmount() {
            const sendAmount = document.getElementById('sendAmount').value;

            if (isNaN(sendAmount) || sendAmount.trim() === '') {
                alert('Please enter a valid number for Send Amount.');
                return;
            }
            console.log(sendAmount);
            fetch(`rates.php?amount=${sendAmount}`)
            
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        document.getElementById('equivalentAmount').value = data.equivalent.toFixed(2);
                    }
                })
                .catch(error => {
                    console.error('Error fetching exchange rates:', error);
                    alert('Failed to fetch exchange rates.');
                });
        }
    </script>

</body>

</html>