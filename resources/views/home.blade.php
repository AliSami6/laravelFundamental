@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @php
                            $class = 'alert alert-danger';
                        @endphp
<x-product  :class="$class" type="fw-bold"/>
<x-brand>
    I am Sami
</x-brand>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex align-items-center">
                                <div class="mb-3">
                                    <label for="avater" class="form-label">File Upload</label>
                                    <input type="file" id="avater" class="form-control form-control-sm"
                                        name="avater">
                                </div>
                                <button class="btn btn-sm btn-primary mt-3 ms-3" type="submit">Uploaded</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
