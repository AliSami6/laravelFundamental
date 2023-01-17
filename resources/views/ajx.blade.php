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
                <div class="alert-msg">

                </div>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" id="submit">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">name</label>
                                <input type="text" name="name" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control form-control-sm">
                            </div>



                            <button type="button" class="btn btn-sm btn-primary submit-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var _token = "{{ csrf_token() }}";
        $(document).ready(function() {
            $('button.submit-btn').click(function() {
                let forms = document.getElementById('submit');
                let form_data =new FormData(forms);
                $.ajax({
                  url:"{{ route('form.store') }}",
                  type:"POST",
                 
                  success: function(response) {
                    $('form')[0].reset();
                    $('.alert-msg').append('<span class="alert alert-success d-block">'+response+'</span>')
                  }
                })
            });
        });
    </script>

</body>

</html>
