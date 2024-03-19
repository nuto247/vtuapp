<!DOCTYPE html>
<html>
<head>
    <title>Verify Customer</title>
</head>
<body>
    <h2>Verify Customer</h2>
    <form method="GET" action="{{ url('/verifycustomer') }}">
        @csrf
        <label >Customer ID:</label><br>
        <input type="text"  name="customer_id"><br><br>

        <label >SmartCard/Meter Number:</label><br>
        <input type="text" name="service_id"><br><br>


        <label >Electricity Company/ Cable TV Package:</label>
        <br>
        <select name="service_id">
            <option value="abuja-electric">Abuja Electricity Distribution Company (AEDC)</option>
            <option value="eko-electric">Eko Electricity Distribution Company (EKEDC)</option>
            <option value="ibadan-electric">Ibadan Electricity Distribution Company (IBEDC)</option>
          
        </select><br><br>
       


        <label >Meter Type/ Cable TV Package:</label>
        <br>
        <select name="variation_id">
            <option value="prepaid">Prepaid</option>
            <option value="postpaid">Postpaid</option>
          
        </select><br><br>


        

        <button type="submit">Verify</button>
    </form>

    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif
</body>
</html>
