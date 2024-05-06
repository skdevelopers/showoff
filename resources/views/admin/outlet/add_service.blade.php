@extends('admin.template.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Add Service</div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">

                            <div class="form-group">
                                <label for="image">Upload Service Picture (gif, jpg, png, jpeg)</label>
                                <div class="d-flex align-items-center">
                                    <input type="file" class="form-control jqv-input" name="image" data-role="file-image"
                                           data-preview="image-preview" accept="image/gif, image/jpeg, image/png, image/jpg" required
                                           data-parsley-required-message="Image is required"
                                           data-parsley-fileextension="jpg,png,gif,jpeg"
                                           data-parsley-fileextension-message="Only files with type jpg, png, gif, jpeg are supported"
                                           data-parsley-max-file-size="5120"
                                           data-parsley-max-file-size-message="Max file size should be 5MB">
                                    <img id="image-preview" class="img-thumbnail ml-3" style="height: 75px; width: 75px;" src="{{ $datamain->image ?? asset('admin-assets/assets/img/placeholder.jpg') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Service Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Service</button>
                                <a href="{{ url('/admin/outlet') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Preview image when a file is selected
        document.querySelector('input[name="image"]').addEventListener('change', function(event) {
            const reader = new FileReader();
            const preview = document.getElementById('image-preview');

            reader.onload = function() {
                preview.src = reader.result;
            };

            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            } else {
                preview.src = "{{ asset('admin-assets/assets/img/placeholder.jpg') }}";
            }
        });
    </script>
@endsection