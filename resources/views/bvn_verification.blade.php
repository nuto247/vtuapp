<!-- resources/views/bvn_verification.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BVN Verification</title>
</head>

<body>

    <h1>BVN Verification</h1>

    <form action="{{ route('verify-bvn') }}" method="post">

        @csrf

        <label for="bvn">Enter BVN:</label>
        <input type="text" id="bvn" value="{{ old('bvn') }}" name="bvn" required >
        @error('bvn')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <br><br>

        <label for="account_name" >Account Name:</label>
        <input type="text" id="account_name" value="{{ old('account_name') }}" name="account_name" required>
        @error('account_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <br><br>

        <label for="dob" >Date Of Birthday:</label>
        <input type="text" id="dob" name="dob" value="{{ old('dob') }}" required>
        @error('dob')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <br><br>

        <label for="phone">Mobile No:</label>
        <input type="text" id="phone" value="{{ old('phone') }}" name="phone" required>
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <br><br>

        <button type="submit">Verify</button>

    </form>

    @isset($verificationData)
        <h2>Verification Result</h2>
        <p><strong>Status:</strong> {{ $verificationData['status'] }}</p>
        <p><strong>Message:</strong> {{ $verificationData['message'] }}</p>
        <!-- You can display other relevant verification data here -->
    @endisset

</body>

</html>
