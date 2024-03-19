
<!-- resources/views/recharge-data.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Data Recharge</title>
</head>
<body>
    <h1>Data Recharge</h1>

    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <form method="GET" action="{{ url('/data') }}">
        @csrf

        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" id="phone"><br><br>

        <label for="network_id">Network:</label>
        <select name="network_id" id="network_id">
            <option value="mtn">MTN</option>
            <option value="glo">Glo</option>
            <option value="airtel">Airtel</option>
            <option value="etisalat">9mobile</option>
        </select><br><br>


        <label for="variation_id">Data Plan:</label>
        <select name="variation_id" id="variation_id">
            <option value="500">MTN SME Data 500MB – 30 Days</option>
            <option value="M1024"> MTN SME Data 1GB – 30 Days</option>
       </select><br><br>

        

    

        <button type="submit">Recharge</button>
    </form>
</body>
</html>
