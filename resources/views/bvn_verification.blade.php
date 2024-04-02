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
        <input type="text" id="bvn" name="bvn" required>
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
