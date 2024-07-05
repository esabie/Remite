<?php

function fetchExchangeRates() {
    try {
        // Get the amount from the request
        $amount = isset($_GET['amount']) ? $_GET['amount'] : null;
        if ($amount === null) {
            echo json_encode(['error' => 'Amount is required']);
            http_response_code(400);
            return;
        }

        // Fetch exchange rates from the API
        $url = 'https://rates.myzeepay.com/api/rates/1/GBP/GHS/24-05-29';
        $response = file_get_contents($url);

        // Log the raw response (for debugging purposes)
        error_log($response);

        if ($response !== false) {
            $data = json_decode($response, true);

            if (isset($data['rates']['rate'])) {
                $rate = $data['rates']['rate'];
                $equivalent = $amount * $rate;

                // Log the exchange rate and equivalent amount
                error_log("Exchange rate fetched successfully. Rate: $rate, Equivalent: $equivalent");

                echo json_encode(['rate' => $rate, 'equivalent' => $equivalent]);
                http_response_code(200);
                return;
            } else {
                error_log("[RatesEndpointController][FetchExchangeRates] Invalid response structure");
                echo json_encode(['error' => 'Failed to fetch exchange rates']);
                http_response_code(500);
                return;
            }
        } else {
            error_log("[RatesEndpointController][FetchExchangeRates] Failed to fetch exchange rates");
            echo json_encode(['error' => 'Failed to fetch exchange rates']);
            http_response_code(500);
            return;
        }
    } catch (Throwable $e) {
        // Log the error message
        error_log("[RatesEndpointController][FetchExchangeRates] " . $e->getMessage());
        echo json_encode(['error' => 'Failed to fetch exchange rates: ' . $e->getMessage()]);
        http_response_code(500);
        return;
    }
}