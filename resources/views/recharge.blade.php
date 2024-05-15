<!-- resources/views/recharge.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Airtime Recharge</title>
</head>
<body>
    <h1>Airtime Recharge</h1>

    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <form method="GET" action="{{ url('/recharge-airtime') }}">
        @csrf


        <input type="hidden" name="username" id="username" value="revolutpayng"><br><br>


        <input type="hidden" name="password" id="password" value="revolutpay123+"><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" id="phone"><br><br>

        <label for="network_id">Network:</label>
        <select name="network_id" id="network_id">
            <option value="mtn">MTN</option>
            <option value="glo">Glo</option>
            <option value="airtel">Airtel</option>
            <option value="etisalat">9mobile</option>
        </select><br><br>

        

        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount"><br><br>

        <button type="submit">Recharge</button>
    </form>
</body>
</html>
