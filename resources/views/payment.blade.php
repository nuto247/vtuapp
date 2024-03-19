<!DOCTYPE html>
<html lang="en">
<head>

    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monnify Payment Gateway</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        form{
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label{
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],

        button{
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button{
            background-color: #c0d5ec;
            background-color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover{
            background-color: rgb(25, 219, 233);
        }

       
    </style>
</head>
<body>

<br><br><br>
    <form id="paymentForm">

<label for="amount">Amount</label>
<input type="text" id="amount" name="amount" required>

<label for="customerName">Customer Name</label>
<input type="text" id="customerName" name="customerName" required>

<label for="customerEmail">Customer Email</label>
<input type="text" id="customerEmail" name="customerEmail" required>

<label for="customerPhone">Customer Phone</label>
<input type="tel" id="customerPhone" name="customerPhone" required>
<button type="button" onclick="payWithMonnify()">Pay with Monnify</button>
    </form>


    <script>

        function payWithMonnify(){

       
        //get the form data
        const amount = document.getElementById("amount").value;
        const customerName = document.getElementById("customerName").value;
        const customerEmail = document.getElementById("customerEmail").value;
        const customerPhone = document.getElementById("customerPhone").value;

        //grab the payload

        MonnifySDK.initialize({

            amount: amount,
            currency: "NGN",
            reference: "REV" + Math.floor((Math.random()*1000000000) +1),
            customerName: customerName,
            customerEmail: customerEmail,
            customerPhone: customerPhone,
            //redirectUrl: "https://revolutpay.ng",
            apiKey: "MK_TEST_JXFEXXWU10",
            contractCode: "0886255806",
            paymentDescription: "Test Monnify",
            isTestMode: true,
            onComplete: function(response){

                //Implement what happens if payment completes
                console.log(response);

                const paymentSuccessful = true;

                if(paymentSuccessful){

                    
        });
    });

                }else{
                    //Redirect to an error page if payment was not successfull 
                }
            },

            onClose: function(data){
                //Implement what happens when customer click the close button

                console.log(data);


            }

        });


    }
    </script>
</body>

</html>