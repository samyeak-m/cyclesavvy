<html>

<head>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>

<body>
    <?php
    $prodID = '';
    $amountbook = 11;
    $BookId = isset($insertedBookId) ? $insertedBookId : '';
    $userName = isset($userName) ? $userName : '';
    $cycleName = isset($cycleName) ? $cycleName : '';
    $bookingDate = isset($bookingDate) ? $bookingDate : '';
    // $amountbook = isset($price) ? $price : '';
    ?>

    <!-- Place this where you need payment button -->
    <button id="payment-button">Pay with Khalti</button>
    <!-- Place this where you need payment button -->
    <!-- Paste this code anywhere in you body tag -->
    <script>
        var BookId = '<?php echo $BookId; ?>';
        var userName = '<?php echo $userName; ?>';
        var cycleName = '<?php echo $cycleName; ?>';
        var bookingDate = '<?php echo $bookingDate; ?>';
        var amountbook = '<?php echo $amountbook * 100; ?>';
        var url = window.location.href;
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_052955d2323d4f89b8f263be8096dd78",
            "productIdentity": BookId,
            "productName": cycleName,
            "productUrl": url, 
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
            ],
            "eventHandler": {
                onSuccess(payload) {
                    console.log(payload);
                    let token = payload.token;
                    let amount = payload.amount / 100;
                    let bookid = payload.product_identity;
                    let name = payload.product_name;

                    console.log(token,amount,bookid,name)

                    sessionStorage.setItem('token', token);
                    sessionStorage.setItem('amount', amount);
                    sessionStorage.setItem('bookid', bookid);
                    sessionStorage.setItem('name', name);

                    window.location.href = 'payment.php';
                },
                onError(error) {
                    console.log(error);
                },
                onClose() {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            checkout.show({ amount: amountbook });
        }
    </script>
    
</body>

</html>