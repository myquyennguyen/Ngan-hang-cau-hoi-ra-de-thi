<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Autocomplete</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
<div id="container" class="container">
    <div class="form-group">
        <div>Tìm kiếm</div>
        <input class="form-control" id="keyword" type="text" placeholder="Search" aria-label="Search">
    </div>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
{{--jquery.autocomplete.js--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.js"></script>


<script>
    $(function () {
        $("#keyword").autocomplete({
            serviceUrl:'/search',
            paramName: "keyword",
            onSelect: function(suggestion) {
                $("#keyword").val(suggestion.value);
            },
            transformResult: function(response) {
                return {
                    suggestions: $.map($.parseJSON(response), function(item) {
                        return {
                            value: item.name,
                        };
                    })
                };
            },
        });
    })
</script>
</html>
{{--custom css item suggest search--}}
<style>
    .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
    .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
    .autocomplete-selected { background: #F0F0F0; }
    /*.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }*/
    .autocomplete-group { padding: 2px 5px; }
    .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
</style>
