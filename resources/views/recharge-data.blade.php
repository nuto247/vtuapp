<div>
    <label for="variation_id">Variation ID:</label>
    <select name="variation_id" id="variation_id">
        <option value="">Select Variation ID</option>
        @foreach($variations as $variation)
            <option value="{{ $variation->id }}">{{ $variation->name }}</option>
        @endforeach
    </select>
</div>

<div>
    <label for="network">Network:</label>
    <select name="network" id="network">
        <option value="">Select Network</option>
        @foreach($networks as $network)
            <option value="{{ $network->id }}">{{ $network->name }}</option>
        @endforeach
    </select>
</div>

<div>
    <label for="plan">Plan:</label>
    <select name="plan" id="plan">
        <option value="">Select Plan</option>
        @foreach($plans as $plan)
            <option value="{{ $plan->id }}">{{ $plan->name }}</option>
        @endforeach
    </select>
</div>

<div>
    <label for="price">Price:</label>
    <input type="text" name="price" id="price" readonly>
</div>

<script>
    $(document).ready(function() {
        $('#variation_id').change(function() {
            var variation_id = $(this).val();
            if (variation_id != '') {
                $.ajax({
                    url: '/get-networks',
                    type: 'GET',
                    data: { variation_id: variation_id },
                    success: function(data) {
                        $('#network').html(data);
                    }
                });
            }
        });

        $('#network').change(function() {
            var network_id = $(this).val();
            if (network_id != '') {
                $.ajax({
                    url: '/get-plans',
                    type: 'GET',
                    data: { network_id: network_id },
                    success: function(data) {
                        $('#plan').html(data);
                    }
                });
            }
        });

        $('#plan').change(function() {
            var plan_id = $(this).val();
            if (plan_id != '') {
                $.ajax({
                    url: '/get-price',
                    type: 'GET',
                    data: { plan_id: plan_id },
                    success: function(data) {
                        $('#price').val(data);
                    }
                });
            }
        });
    });
</script>

