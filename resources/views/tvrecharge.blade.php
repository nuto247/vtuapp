<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    



<form action="/tvrecharge" method="POST">
    @csrf
    <select name="service" id="service">
        <option value="">Select Service</option>
        <option value="11">dstv</option>
        <!-- Populate services here -->
    </select>
    <br><br>
    <select name="tvpackage" id="tvpackage">
        <option value="">Select Variation</option>
        <!-- Variation options will be populated via AJAX -->
    </select>
    <br><br>
    <button type="submit">Submit</button>
</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#service').change(function(){
            var service_id = $(this).val();
            $.ajax({
                url: '{{ url("/getvariations") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    service_id: service_id
                },
                success: function(tvpackage){
                    $('#tvpackage').empty();
                    $.each(tvpackage, function(id, tvpackage){
                        $('#tvpackage').append('<option value="'+id+'">'+service_id+'</option>');
                    });
                }
            });
        });
    });
</script>

</body>
</html>