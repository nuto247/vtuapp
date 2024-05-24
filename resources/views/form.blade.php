@extends('layouts.app')

@section('content')
<div class="container">
    <form>
        <div class="form-group">
            <label for="variation_id">Variation</label>
            <select class="form-control" id="variation_id" name="variation_id">
                <option value="">Select Variation</option>
                @foreach($variations as $variation)
                    <option value="{{ $variation->id }}">{{ $variation->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="network">Network</label>
            <input type="text" class="form-control" id="network" name="network" readonly>
        </div>
        <div class="form-group">
            <label for="plan">Plan</label>
            <input type="text" class="form-control" id="plan" name="plan" readonly>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" readonly>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('variation_id').addEventListener('change', function() {
        var variationId = this.value;
        if (variationId) {
            fetch(`/getDetails/${variationId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('network').value = data.network ? data.network.name : '';
                    document.getElementById('plan').value = data.plan ? data.plan.name : '';
                    document.getElementById('price').value = data.price ? data.price.amount : '';
                })
                .catch(error => console.error('Error:', error));
        } else {
            document.getElementById('network').value = '';
            document.getElementById('plan').value = '';
            document.getElementById('price').value = '';
        }
    });
</script>
@endsection
