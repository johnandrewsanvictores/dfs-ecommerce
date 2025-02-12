<?php


session_start();
require '../vendor/autoload.php'; // Load Guzzle

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_method = $_POST['payment_method'];

    if ($payment_method == "cod") {
        echo json_encode([
            'success' => true,
            'message' => 'Payment method selected is Cash on Delivery.',
            'redirect_url' => '../pages/success_payment.php?payment=cod',
        ]);
        exit();
    }

    // If PayMongo is selected, create a checkout session
    $amount = $_POST['amount'] * 100; // Convert to cents
    $billing_info = json_decode($_POST['billing_info'], true);
    $items = json_decode($_POST['items'], true);
    $client = new \GuzzleHttp\Client();

    try {
        $response = $client->request('POST', 'https://api.paymongo.com/v1/checkout_sessions', [
            'json' => [
                "data" => [
                    "attributes" => [
                        "cancel_url" => "http://localhost:8080/dfs-ecommerce/pages/cancel_payment.php",
                        "billing" => [
                            "address" => [
                                "line1" => $billing_info['address']['line1'],
                                "line2" => $billing_info['address']['line2'],
                                "city" => $billing_info['address']['city'],
                                "state" => $billing_info['address']['state'],
                                "postal_code" => $billing_info['address']['postal_code'],
                                "country" => $billing_info['address']['country']
                            ],
                            "name" => $billing_info['name'],
                            "email" => $billing_info['email'],
                            "phone" => $billing_info['phone']
                        ],
                        "description" => "Purchase from Dream Shop Bags",
                        "line_items" => $items,
                        "payment_method_types" => ["card", "gcash", "grab_pay", "brankas_metrobank", "brankas_landbank", "dob_ubp", "dob"],
                        "reference_number" => "ORDER12345",
                        "send_email_receipt" => true,
                        "show_description" => true,
                        "show_line_items" => true,
                        "statement_descriptor" => "Dream Shop Bags",
                        "success_url" => "http://localhost:8080/dfs-ecommerce/pages/success_payment.php?payment=paymongo"
                    ]
                ]
            ],
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode($_ENV['PAYMONGO_SECRET_KEY'])
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        if (isset($data['data']['attributes']['checkout_url'])) {
            // Return JSON response with redirect URL instead of redirecting directly
            echo json_encode([
                'success' => true,
                'redirect_url' => $data['data']['attributes']['checkout_url']
            ]);
            exit();
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error creating PayMongo checkout session.'
            ]);
            exit();
        }
    } catch (\Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ]);
        exit();
    }
}
?>

