@extends('layouts.adminLayout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">New Category</h1>
        </div>

        <!-- Content Row -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Details</h6>
                </div>
                <div class="card-body">

                    <!-------contact info telephone email ...-->
                    <form  id="pageForm">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Category Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                            <small id="image_error" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category name</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Category name">
                            <small id="title_error" class="form-text text-danger"></small>
                        </div>
                        <div class="mb-3 text-center">
                            <small class="alert alert-success" id="success_msg" style="display: none">
                                will Done !! Message added
                            </small>
                        </div>

                        <div class="form-group text-center">
                            <button id="save_page" class="btn btn-success">Ajoter</button>
                        </div>

                    </form>
                    <!-------/contact info telephone email ...-->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@stop

@section('script')
    <script>
        $(document).on('click','#save_page',function (e){
            e.preventDefault();
            $('#image_error').text('');
            $('#title_error').text('');
            var formData = new FormData($('#pageForm')[0]);
            $.ajax({
                type:'post',
                enctype: 'multipart/form-data',
                url    : "{{route('stor.category')}}",
                data   :formData,
                processData : false,
                contentType : false,
                cache  : false,
                success: function(data){
                    if (data.status == true){
                        $('#success_msg').show();
                    }

                },error: function (reject){
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });
    </script>
@stop

