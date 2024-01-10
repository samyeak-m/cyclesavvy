<html>
<head>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>
<body>
    <?php 
$prodID='';
$amountbook=8;
?>
    ...
    <!-- Place this where you need payment button -->
    <button id="payment-button">Pay with Khalti</button>
    <!-- Place this where you need payment button -->
    <!-- Paste this code anywhere in you body tag -->
    <script>
        var amountbook  = '<?php echo $amountbook*1000;?>';
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_052955d2323d4f89b8f263be8096dd78",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "https://www.prime.edu.np", //PRODUCTURL AFTER SUCCESSFUL PAYMENT
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: amountbook});
        }
    </script>
    <!-- Paste this code anywhere in you body tag -->
    ...
</body>
</html>