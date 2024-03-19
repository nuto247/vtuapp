<!DOCTYPE html>
<html>
<head>
    <title>TV Recharge</title>
</head>
<body>
    <h2>TV Recharge</h2>
    <form method="GET" action="{{ url('/tvrecharge') }}">
        @csrf
        <label >Enter your phone number:</label><br>
        <input type="text"  name="phone"><br><br>
        <label >Cable TV Network:</label>
        <br>
        <select name="service_id">
            <option value="dstv">DSTV</option>
            <option value="gotv">GoTV</option>
            <option value="startimes">Startimes</option>
          
        </select><br><br>
        <label >Smart Card Number:</label><br>
        <input type="text" name="smartcard_number"><br><br>


        <label >Cable TV Package:</label>
        <br>
        <select name="variation_id">
            <option value="dstv-padi">DStv Padi</option>
            <option value="dstv-yanga">DStv Yanga</option>
            <option value="dstv-confam">DStv Confam</option>
          
        </select><br><br>

        <button type="submit">Recharge</button>
    </form>

    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif
</body>
</html>
