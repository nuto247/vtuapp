<!DOCTYPE html>
<html lang="en">

<head>

    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monnify Payment Gateway</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],

        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #c0d5ec;
            background-color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: rgb(25, 219, 233);
        }
    </style>
</head>

<body>

    <br><br><br>

    <form id="paymentForm" action="{{ route('processWalletFunding') }}" method="post">
        @csrf
        <label for="amount">Amount</label>
        <input type="text" id="amount" name="amount" required>

        <button type="submit">Fund Wallet</button>
    </form>

</body>

</html>