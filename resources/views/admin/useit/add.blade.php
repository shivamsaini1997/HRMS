@include('admin.includes.header')

@include('admin.includes.sidebar')

<style>
    .form-group0 .btn-danger {
        display: block;
        float: right;
    }
</style>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row ">

                <div class="col-md-12">

                    <div class="card card-primary">

                        <div class="card-header">

                            @if(!empty($id))

                            <h3 class="card-title">Edit Useit Page Info</h3>

                            @else

                            <h3 class="card-title">Add Useit Page Info</h3>

                            @endif

                        </div>

                        <!-- /.card-header -->

                        @include('flash/flash-message')

                        <!-- form start -->

                        <form action="{{url('admin/use-it/store')}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="id" value="@if(!empty($id)){{$id}}@endif">

                            <div class="card-body">

                                <div>
                                    <div class="form-group">

                                        <label for="toolkit-category">Toolkit Category</label>

                                        <select class="form-select form-control" name="toolkit_category" aria-label="Default select example">
                                            <option selected>Select Toolkit Category</option>
                                            <option value="Vision Building Tools"> Vision Building Tools</option>
                                            <option value="Behaviour Design"> Behaviour Design</option>
                                            <option value="Foundation"> Foundation</option>
                                            <option value="Discovery"> Discovery</option>
                                            <option value="Analysis"> Analysis</option>
                                            <option value="Ideation and Prototying"> Ideation and Prototying</option>
                                            <option value="Strategic Planning"> Strategic Planning</option>
                                            <option value="Network Building"> Network Building</option>
                                        </select>

                                    </div>

                                </div>

                                <div>
                                    <div class="form-group">

                                        <label for="toolkit-title">Toolkit Title</label>

                                        <input type="text" name="toolkit_title" class="form-control" id="toolkit-title" placeholder="Page Title" value="@if($response !=''){{ $response->toolkit_title}}@endif" required>

                                    </div>

                                    <div class="form-group">

                                        <label for="toolkit-title-discription">Toolkit Title Description</label>

                                        <textarea class="summernote" id="toolkit-title-discription" name="toolkit_title_discription" required>@if($response !=''){{ $response->toolkit_title_desc}}@endif</textarea>

                                    </div>

                                    <div class="form-group">

                                        <label for="what-is-it-discription">What Is It</label>

                                        <textarea class="summernote" id="what-is-it-discription" name="what_is_it_discription" required>@if($response !=''){{ $response->what_is_it}}@endif</textarea>

                                    </div>

                                    <div class="form-group">

                                        <label for="how-it-helps-discription">How It Helps</label>

                                        <textarea class="summernote" id="how-it-helps-discription" name="how_it_helps_discription" required>@if($response !=''){{ $response->how_it_helps}}@endif</textarea>

                                    </div>


                                    <div class="form-group">

                                        <label for="use-cases-discription">Use Cases Description</label>

                                        <textarea class="summernote" id="use-cases-discription" name="use_cases_discription" required>@if($response !=''){{ $response->use_cases_desc}}@endif</textarea>

                                    </div>

                                    <div class="form-group">

                                        <label for="limitation-discription">Limitation Description</label>

                                        <textarea class="summernote" id="limitation-discription" name="limitation_discription" required>@if($response !=''){{ $response->limitations_desc}}@endif</textarea>

                                    </div>

                                    <div class="form-group">

                                        <label for="step-by-step-discription">Step By Step Description</label>

                                        <textarea class="summernote" id="step-by-step-discription" name="step_by_step_discription" required>@if($response !=''){{ $response->sbs_desc}}@endif</textarea>

                                    </div>

                                    <div class="d-flex">
                                        <div class="form-group w-50 p-2">

                                            <label for="table-img">Table Image</label>

                                            <input type="file" name="table_img" id="table-img" class="form-control" value="@if($response !=''){{ $response->table_img}}@endif"/>

                                        </div>
                                        <div class="form-group w-50 p-2">

                                            <label for="example-img">Example Image</label>

                                            <input type="file" name="example_img" id="example-img" class="form-control" value="@if($response !=''){{ $response->exmp_img}}@endif"/>

                                        </div>
                                    </div>

                                    <div class="p-2 border rounded">
                                        <label for="step-by-step-discription">Understanding the Tool</label>

                                        <div class="form-group0" id="containerDiv">
                                            <label for="card-content-1">Card Content 1</label>
                                            <textarea class="summernote" id="card-content-1" name="card_content_1">@if($response !=''){!! json_decode($response->understanding_the_tool)->card_content_1 !!}@endif</textarea>
                                        </div>

                                        <div class="form-group0" id="containerDiv">
                                            <label for="card-content-2">Card Content 2</label>
                                            <textarea class="summernote" id="card-content-2" name="card_content_2">@if($response !=''){!! json_decode($response->understanding_the_tool)->card_content_2 !!}@endif</textarea>
                                        </div>

                                        <div class="form-group0" id="containerDiv">
                                            <label for="card-content-3">Card Content 3</label>
                                            <textarea class="summernote" id="card-content-3" name="card_content_3">@if($response !=''){!! json_decode($response->understanding_the_tool)->card_content_3 !!}@endif</textarea>
                                        </div>

                                        <div class="form-group0" id="containerDiv">
                                            <label for="card-content-4">Card Content 4</label>
                                            <textarea class="summernote" id="card-content-4" name="card_content_4">@if($response !=''){!! json_decode($response->understanding_the_tool)->card_content_4 !!}@endif</textarea>
                                        </div>

                                        <div class="form-group0" id="containerDiv">
                                            <label for="card-content-5">Card Content 5</label>
                                            <textarea class="summernote" id="card-content-5" name="card_content_5">@if($response !=''){!! json_decode($response->understanding_the_tool)->card_content_5 !!}@endif</textarea>
                                        </div>

                                        <div class="form-group0" id="containerDiv">
                                            <label for="card-content-6">Card Content 6</label>
                                            <textarea class="summernote" id="card-content-6" name="card_content_6">@if($response !=''){!! json_decode($response->understanding_the_tool)->card_content_6 !!}@endif</textarea>
                                        </div>

                                    </div>

                                    <div>
                                        <div class="form-group">

                                            <label for="upload-document">Upload Document</label>

                                            <input type="file" name="upload_document" id="upload-document" class="form-control" value="@if($response !=''){{ $response->toolkit_doc}}@endif"/>

                                        </div>
                                    </div>

                                </div>

                                <!-- /.card-body -->

                                <div class="card-footer">

                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info">

                                        Submit

                                    </button>

                                </div>

                        </form>

                    </div>

                </div>



            </div>

            <!-- /.row -->

        </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

</div>



@include('admin.includes.footer')



<!--<script>-->



<!--  $("#header_logo").on("change", function () {-->

<!--    if (this.files && this.files[0]) {-->

<!--      var reader = new FileReader();-->

<!--      reader.onload = function (e) {-->

<!--        $("#header_logo_preview").attr("src", e.target.result);-->

<!--        $("#header_logo_preview").show();-->

<!--      };-->

<!--      reader.readAsDataURL(this.files[0]);-->

<!--    }-->

<!--  });-->





<!--  $("#footer_logo").on("change", function () {-->

<!--    if (this.files && this.files[0]) {-->

<!--      var reader = new FileReader();-->

<!--      reader.onload = function (e) {-->

<!--        $("#footer_logo_preview").attr("src", e.target.result);-->

<!--        $("#footer_logo_preview").show();-->

<!--      };-->

<!--      reader.readAsDataURL(this.files[0]);-->

<!--    }-->

<!--  });-->

<!--</script>-->



<script>
    // Display header logo preview on file selection

    $(document).on('change', '#header_logo', function() {

        const headerLogoPreview = $('#header_logo_preview');

        if (this.files && this.files[0]) {

            const reader = new FileReader();

            reader.onload = function(e) {

                headerLogoPreview.attr('src', e.target.result).show();

            };

            reader.readAsDataURL(this.files[0]);

        } else {

            headerLogoPreview.hide();

        }

    });

    // Display footer logo preview on file selection

    $(document).on('change', '#footer_logo', function() {

        const footerLogoPreview = $('#footer_logo_preview');

        if (this.files && this.files[0]) {

            const reader = new FileReader();

            reader.onload = function(e) {

                footerLogoPreview.attr('src', e.target.result).show();

            };

            reader.readAsDataURL(this.files[0]);

        } else {

            footerLogoPreview.hide();

        }

    });
</script>