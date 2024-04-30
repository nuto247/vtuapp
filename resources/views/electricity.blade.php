<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Payment</title>
</head>
<body>
    <h2>Electricity Bill Payment</h2>
    <form method="GET" action="{{ url('/electricity') }}">
        @csrf
        <label >Enter your phone number:</label><br>
        <input type="text"  name="phone"><br><br>

        <label >Meter Number:</label><br>
        <input type="text" name="meternumber"><br><br>

        <label >Amount:</label><br>
        <input type="text" name="amount"><br><br>


        <label >Electricity Company:</label>
        <br>
        <select name="service_id">
            <option value="abuja-electric">Abuja Electricity Distribution Company (AEDC)</option>
            <option value="eko-electric">Eko Electricity Distribution Company (EKEDC)</option>
            <option value="ibadan-electric">Ibadan Electricity Distribution Company (IBEDC)</option>
          
        </select><br><br>
       


        <label >Meter Type:</label>
        <br>
        <select name="variation_id">
            <option value="prepaid">Prepaid</option>
            <option value="postpaid">Postpaid</option>
          
        </select><br><br>


  

        <button type="submit">Recharge</button>
    </form>

    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif
</body>
</html>
