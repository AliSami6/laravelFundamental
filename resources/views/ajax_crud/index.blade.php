<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Laravel & Ajax CRUD Application!</title>
    <style>
        .img {
            height: 60px;
            width: 60px;
        }
    </style>
</head>

<body>
    <header class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1> Laravel & Ajax CRUD Application! </h1>
                    <hr>
                </div>
            </div>
        </div>
    </header>
    <section class="body">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="alert-msg">

                    </div>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">Alll Task</h3>
                            <button type="button" class="btn btn-primary btn-sm"
                                onclick="saveBtn('New Student','Save Change')">Add New</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Name </th>
                                        <th> Profile </th>
                                        <th> Email </th>
                                        <th> Phone </th>
                                        <th> Roll </th>
                                        <th> Registration </th>
                                        <th> Board </th>
                                        <th style="width:150px"> Action </th>
                                    </tr>
                                </thead>
                                <tbody id="taskTableBody">



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('ajax_crud.modal')

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var _token = "{{ csrf_token() }}";
        // student modal
        const student_modal = new bootstrap.Modal('#studentModal', {
            keyboard: false,
            backdrop: 'static'
        });
        // button and modal title
        function saveBtn(modal_title, save_btn_txt) {
            $('h5#modal-title').text(modal_title);
            $('button.save-btn').text(save_btn_txt);
            student_modal.show();
        }
        // store data
        $(document).on('submit', 'form#submitForm', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('form.table') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 'success') {
                        student_data_fetch();
                        $('form#submitForm')[0].reset();
                        student_modal.hide();
                        $('.alert-msg').append('<div class="alert alert-success py-2">' + response
                            .message + '</div>')

                    } else {
                        $('.alert-msg').append('<div class="alert alert-danger py-2">' + response
                            .message + '</div>')

                    }
                }
            })
        });
        // get student data from database
        function student_data_fetch() {
            $.ajax({
                url: "{{ route('student.getData') }}",
                type: "post",
                dataType: "json",
                data: {
                    _token: _token
                },
                success: function(response) {
                    $('tbody#taskTableBody').html(response);
                }
            })
        }
        student_data_fetch();
        // student edit data
        $(document).on('click', 'button.edit-btn', function() {
            let student_id = $(this).data('id');
        });

        // student delete data
        $(document).on('click', 'button.del-btn', function() {
            let student_id = $(this).data('id');
            $.ajax({
                url: "{{ route('student.delete') }}",
                type: "post",
                dataType: "json",
                data: {
                    _token: _token,
                    student_id: student_id
                },
                success: function(response) {
                    if (response.status == 'success') {
                        student_data_fetch();
                        $('.alert-msg').append('<div class="alert alert-success py-2">' + response.message + '</div>')
                    }else{
                         $('.alert-msg').append('<div class="alert alert-danger py-2">' + response.message + '</div>')
                    }
                }
            })
        });
    </script>
</body>

</html>
