<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BVN Premium Information</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>BVN Premium Information</h1>
        <form id="bvnForm">
            <div class="form-group">
                <label for="bvnNumber">Enter BVN Number:</label>
                <input type="text" id="bvnNumber" name="bvnNumber" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div id="bvnResult" class="mt-4"></div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.getElementById('bvnForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let bvnNumber = document.getElementById('bvnNumber').value;
            
            fetch(`/v1/ng/identities/bvn-premium/${bvnNumber}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        document.getElementById('bvnResult').innerHTML = `
                            <h2>BVN Details:</h2>
                            <p><strong>First Name:</strong> ${data.data.first_name}</p>
                        `;
                    } else {
                        document.getElementById('bvnResult').innerHTML = `<p>${data.message}</p>`;
                    }
                })
                .catch(error => {
                    document.getElementById('bvnResult').innerHTML = `<p>Error fetching BVN details. Please try again.</p>`;
                });
        });
    </script>
</body>
</html>
