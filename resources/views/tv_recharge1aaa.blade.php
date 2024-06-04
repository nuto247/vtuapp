<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Multiple Dependent Select Form</title>
    <!-- Include jQuery (you can also include it from a CDN) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <form method="GET" action="{{ url('/data') }}">
            @csrf
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input class="form-control" type="text" name="phone" id="phone" placeholder="Enter your phone number">
            </div>
            <div class="form-group">
                <label for="service_id">Service:</label>
                <select class="form-control" id="service_id" name="service_id">
                    <option value="">Select Service</option>
                    <option value="dstv">DSTV</option>
                    <option value="gotv">GOTV</option>
                    <option value="startimes">Startimes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="variation_id">Variation:</label>
                <select class="form-control" id="variation_id" name="variation_id">
                    <option value="">Select Variation</option>
                </select>
            </div>
            <div id="plan-price" style="margin-top: 10px; font-weight: bold;"></div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            // Setup CSRF token for AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Event handler for service change
            $('#service_id').change(function () {
                var serviceId = $(this).val();
                let link = '{{ route('getTVPlans') }}';
                $('#variation_id').empty().append('<option value="">Select Variation</option>'); // Clear existing options

                $.ajax({
                    url: link,
                    type: 'POST',
                    data: { service_id: serviceId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success && response.data.length > 0) {
                            let prices = {};
                            response.data.forEach(plan => {
                                prices[plan.variation_id] = plan.price;
                                $('#variation_id').append(`<option value="${plan.variation_id}">${plan.variation_id}</option>`);
                            });
                            $('#variation_id').data('prices', prices);
                        }
                    },
                    error: function () {
                        alert('Failed to load TV plans. Please try again.');
                    }
                });
            });

            // Event handler for variation change
            $('#variation_id').change(function () {
                var selectedVariationId = $(this).val();
                var prices = $(this).data('prices');

                if (prices && prices[selectedVariationId]) {
                    $('#plan-price').text('Price: ₦' + prices[selectedVariationId]);
                } else {
                    $('#plan-price').text('');
                }
            });
        });
    </script>
</body>

</html>
