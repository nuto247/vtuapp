<!DOCTYPE html>
<html>
<head>
    <title>Dependent Select Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h2>Dependent Select Form</h2>
    <form action="#" method="post">
        @csrf
        <div>
            <label for="category">Select Category:</label>
            <select name="category" id="category">
                <option value="">-- Select Category --</option>
                @foreach($dataprices as $category)
                    <option value="{{ $category->id }}">{{ $category->network }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="subcategory">Select Subcategory:</label>
            <select name="subcategory" id="subcategory" multiple>
                <option value="">-- Select Subcategory --</option>
            </select>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        $(document).ready(function(){
            $('#category').on('change', function(){
                var category_id = $(this).val();
                $('#subcategory').empty();
                if(category_id){
                    $.ajax({
                        url: '{{ route("getSubcategories") }}',
                        type: 'GET',
                        data: {category_id: category_id},
                        dataType: 'json',
                        success: function(data){
                            $.each(data, function(key, value){
                                $('#subcategory').append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    });
                } else {
                    $('#subcategory').append('<option value="">-- Select Subcategory --</option>');
                }
            });
        });
    </script>
</body>
</html>
