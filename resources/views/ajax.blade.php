<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Laravel ajax</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <p id="para">Lorem ipsum dolor sit amet consectetur .</p>
                        <button class="btn btn-sm btn-outline-primary click-btn p-1 mt-2">Click ME</button>
                        <h2></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            const para = $('p#para').text();
            $('.click-btn').click(function() {
                $.ajax({
                    url: "{{ route('ajax.request') }}",
                    type: "get",
                    data: {para_text:para},
                    success: function(response) {
                    // $('h2').text(response.data)
                    //console.log(response);
                    }
                });
            });

        });
    </script>

</body>

</html>
