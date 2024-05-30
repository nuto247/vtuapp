@include('logo')

@if($user->usertype=='admin')
    @include('adminsidebar')
    @else
    @include('sidebar')
    @endif
           
@include('logo1')
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Buy Airtime</h3>
                                        </div><!-- .nk-block-head-content -->

                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Wallet Balance</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"> ₦{{ $user->balance }}.00</div>
                                                                <div class="nk-ecwg6-ck">

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Refferal Bonus</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">NGN 0.00</div>
                                                                <div class="nk-ecwg6-ck">

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->




                                    </div><!-- .row -->
                                </div><!-- .nk-block -->

                                <div class="container">
                                    <div class="row">
                                        <div class="col">

                                        </div>
                                        <div class="col-6">

                                        </div>
                                        <div class="col">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1">

                                        </div>
                                        <div class="col-10">
                                            <div class="card-body table-responsive p-0">

                                                @include('partials.alert-messages')

                                                <!DOCTYPE html>
                                                <html lang="en">

                                                <head>
                                                    <meta charset="UTF-8">
                                                    <meta name="viewport"
                                                        content="width=device-width, initial-scale=1.0">
                                                    <title>Multiple Dependent Select Form</title>
                                                </head>

                                                <body>

                                                    <div class="container mt-5">

                                                    
                                                        <form method="GET" action="{{ url('/data') }}">
                                                            @csrf

                                                         



                                                            <label for="phone">Phone Number:</label>
                                                            <div class="form-group">
                                                                <input class="form-control" type="text"
                                                                    name="phone" id="phone"
                                                                    placeholder="Enter your phone number">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="country">Network:</label>
                                                                <select class="form-control" id="network_id"
                                                                    name="network_id">
                                                                    <option value="">Select Network</option>
                                                                    <option value="mtn">MTN</option>
                                                                    <option value="airtel">Airtel</option>
                                                                    <option value="glo">Glo</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="city">Data Plan:</label>
                                                                <select class="form-control" id="data-plans"
                                                                    name="variation_id">
                                                                    <option value="">Select Data Plan</option>
                                                                </select>
                                                            </div>

                                                            <div id="plan-price" style="margin-top: 10px; font-weight: bold;"></div>

                                                            <br>
                                                            <button type="submit"
                                                                class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>

                                                </body>

                                                </html>





                                            </div>
                                        </div>
                                        <div class="col-1">

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2022 DashLite. Template by <a
                                    href="https://softnio.com" target="_blank">Softnio</a>
                            </div>
                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->

    <script src="./assets/js/bundle.js?ver=3.1.2"></script>
    <script src="./assets/js/scripts.js?ver=3.1.2"></script>
    <script src="./assets/js/charts/chart-ecommerce.js?ver=3.1.2"></script>

    <script>
  $(document).ready(function() {
    // Set up AJAX headers to include CSRF token for security
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Event listener for when the network dropdown value changes
    $('#network_id').change(function() {
        var network = $(this).val(); // Get the selected network value

        // URL for the AJAX request using a named route
        let link = '{{ route('getRechargeDataPlans') }}';

        // Clear the data-plans dropdown before populating with new options
        $('#data-plans').empty().append('<option value="">Select Data Plan</option>');

        // Make the AJAX request to fetch data plans
        $.ajax({
            url: link,
            type: 'POST',
            data: { network: network },
            dataType: 'json',
            success: function(response) {
                if (response.data && response.data.length > 0) {
                    let prices = {}; // Object to store prices with variation_id as key
                    response.data.forEach(plan => {
                        prices[plan.variation_id] = plan.price; // Store price with variation_id as key
                        $('#data-plans').append(`<option value="${plan.variation_id}">${plan.plan}</option>`);
                    });
                    $('#data-plans').data('prices', prices); // Store prices for later use
                }
            },
            error: function() {
                alert('Failed to load data plans. Please try again.');
            }
        });
    });

    // Event listener for when a plan is selected
    $('#data-plans').change(function() {
        var selectedVariationId = $(this).val(); // Get the selected variation_id
        var prices = $(this).data('prices'); // Retrieve the prices object

        if (prices && prices[selectedVariationId]) {
            $('#plan-price').text('Price: ₦' + prices[selectedVariationId]); // Display the price
        } else {
            $('#plan-price').text(''); // Clear the price display if no plan is selected
        }
    });
});

</script>



</body>

</html>
