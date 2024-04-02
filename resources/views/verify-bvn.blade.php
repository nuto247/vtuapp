<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify BVN</title>
</head>
<body>
    <h1>Verify BVN</h1>
    <form method="POST" action="{{ route('verify-bvn') }}">
        @csrf
        <label for="bvn">Enter BVN:</label>
        <input type="text" id="bvn" name="bvn" required>
        <button type="submit">Verify</button>
    </form>

    @isset($verificationResult)
        <div>
            <h2>Verification Result</h2>
            @if($verificationResult['success'])
                <p>BVN: {{ $verificationResult['data']['bvn'] }}</p>
                <p>Full Name: {{ $verificationResult['data']['full_name'] }}</p>
                <!-- Display other relevant information -->
            @else
                <p>Error: {{ $verificationResult['error'] }}</p>
            @endif
        </div>
    @endisset
</body>
</html>
