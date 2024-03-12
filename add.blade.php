@include('admin.includes.header')

@include('admin.includes.sidebar')

<style>

  



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

                  <h3 class="card-title">Edit Challenge Information</h3>

			          @else

				          <h3 class="card-title">Add Challenge Information</h3>

			          @endif

              </div>

              <!-- /.card-header -->

			        @include('flash/flash-message')



        <!-- form start -->

        <form action="{{ url('admin/add-challenge/store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="id" value="@if(!empty($id)){{$id}}@endif">

            <div class="card-body">

                <div class="form-group">

                    <label for="projecttitle">Challenge Banner Image</label>

                    <input type="file" name="logo" id="logo" class="form-control" value="@if($response !=''){{ $response->logo}}@endif" required>

                    @error('logo')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                    @if($response != '')

                        <img id="logo_preview" src="{{url('public/uploads/challenge-logo')}}/{{ $response->logo }}" alt="Header Logo Preview" style="max-width: 200px; display: block;" />

                    @else

                        <img id="logo_preview" src="" alt="Logo Preview" style="max-width: 200px; display: none;" />

                    @endif

                </div>

                <div class="form-group">

                    <label for="projecttitle">Challenge Title</label>

                    <input type="text" name="challenge_title" class="form-control" value="@if($response !=''){{ $response->challenge_title}}@endif" required>

                    @error('challenge_title')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                <div class="form-group">

                    <label for="exampleorg_name">Organization Name</label>

                   <input type="text" name="org_name" class="form-control" value="@if($response !=''){{ $response->org_name}}@endif" required>

                   @error('org_name')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                

                <div class="form-group">

                    <label for="examplehashtags">Hash Tags</label>

                   <input type="text" name="hashtags" class="form-control" value="@if($response !=''){{ $response->hashtags}}@endif" required>

                   @error('hashtags')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div> 

           

            </div>

            

            <div class="row p-3">

                <div class="col-sm-2 form-group">

                    <label for="examplereg_fee">Registration Fess</label>

                    <input type="text" name="reg_fee" class="form-control" value="@if($response !=''){{ $response->reg_fee}}@endif" required>

                    @error('reg_fee')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                <div class="col-sm-2 form-group">

                    <label for="exampleprize_amount">Total Prize Money</label>

                   <input type="text" name="prize_amount" class="form-control" value="@if($response !=''){{ $response->prize_amount}}@endif" required>

                   @error('prize_amount')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                <div class="col-sm-2 form-group">

                    <label for="examplechallenge_date">Challenge Date</label>

                   <input type="date" name="challenge_date" class="form-control" value="@if($response !=''){{ $response->challenge_date}}@endif" required>

                   @error('challenge_date')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                <div class="col-sm-3 form-group">

                    <label for="examplemax_member">Max number of Team member</label>

                   <input type="text" name="max_member" class="form-control" value="@if($response !=''){{ $response->max_member}}@endif" required>

                   @error('max_member')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                <div class="col-sm-3 form-group">

                    <label for="exampleeligibility">Eligibility</label>

                   <input type="text" name="eligibility" class="form-control" value="@if($response !=''){{ $response->eligibility}}@endif" required>

                   @error('eligibility')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                

            </div>

            <div class="card-body">

                <div class="form-group">

                    <label for="projecttitle">About Company</label>

                    <textarea class="form-control" name="aboutcompany" required>@if($response !=''){{ $response->about}}@endif</textarea>

                    @error('aboutcompany')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                <div class="form-group">

                    <label for="exampleorg_name">About Challenge</label>

                    <textarea class="form-control"  name="aboutchallenge" required>@if($response !=''){{ $response->about}}@endif</textarea>

                    @error('aboutchallenge')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                <div class="form-group">

                    <label for="exampleorg_name">Challenge Idea</label>

                    <textarea class="form-control"  name="idea" required>@if($response !=''){{ $response->idea}}@endif</textarea>

                    @error('idea')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                

                <div class="form-group">

                    <div id="stages-container" class="position-relative">

                        <div class="d-flex justify-content-between">

                            <label for="examplestage">Stages</label>

                            

                        </div>

                       

                        <!-- Initial stage fields -->

                        <div class="stage position-relative">

                            <div class="col-sm-12 form-group">

                                <label>Stage 1 Title</label>

                                <input type="text" name="stage_title[]" class="form-control" required>

                                @error('stage_title')

                                    <div class="text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                            <div class="col-sm-12 form-group">

                                <label>Stage 1 Date</label>

                                <input type="date" name="stage_date[]" class="form-control" required>

                                @error('stage_date')

                                    <div class="text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                            <div class="col-sm-12 form-group">

                                <label>Stage 1 About</label>

                                <textarea class="form-control" name="stage_about[]" required></textarea>

                                @error('stage_about')

                                    <div class="text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                            <div class="d-flex justify-content-end align-items-center">

                                <button type="button" class="btn btn-success add-stage">Add Stage</button>

                                <button type="button" class="btn btn-danger remove-stage d-none">Remove Stage</button>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <label for="exampleorg_name">Challenge Guidelines</label>

                    <textarea class="form-control" name="guidelines" required>@if($response !=''){{ $response->guidelines}}@endif</textarea>

                    @error('guidelines')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                

                <div class="form-group">

                    <label for="exampleorg_name">Challenge Rewards</label>

                    <textarea class="form-control" name="rewards" required>@if($response !=''){{ $response->rewards}}@endif</textarea>

                    @error('rewards')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                <div class="form-group">

                    <div id="important-dates-container" class="position-relative">

                        <div class="d-flex justify-content-between">

                            <label for="examplestage">Important Dates</label>

                            

                        </div>

                       

                        <!-- Initial importantdates fields -->

                        <div class="importantdates position-relative">

                            <div class="col-sm-12 form-group">

                                <label>Importantdates 1 Title</label>

                                <input type="text" name="importantdates_title[]" class="form-control" required>

                                @error('importantdates_title')

                                    <div class="text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                            <div class="col-sm-12 form-group">

                                <label>Importantdates 1 Date</label>

                                <input type="date" name="importantdates_date[]" class="form-control" required>

                                @error('importantdates_date')

                                    <div class="text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                            <div class="d-flex justify-content-end align-items-center">

                                <button type="button" class="btn btn-success add-importantdates">Add Important Date</button>

                                <button type="button" class="btn btn-danger remove-importantdates d-none">Remove Important Dates</button>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-sm-12 form-group">

                    <label for="exampleeligibility">Challenges Contact Details</label>

                   <input type="text" name="contact_details" class="form-control" value="@if($response !=''){{ $response->contact_details}}@endif" required>

                   @error('contact_details')

                        <div class="text-danger">{{ $message }}</div>

                    @enderror

                </div>

                



            </div>

            



            <!-- ... your existing code ... -->

            <div class="card-footer">

              <button id="sub-button" type="submit" class="btn btn-lg btn-info">

				Submit

			  </button>

            </div>

        </form>

    </section>

    <!-- ... your existing code ... -->

</div>



@include('admin.includes.footer')

<script>

$(document).on('change', '#logo', function() {

        const headerLogoPreview = $('#logo_preview');

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



$(document).ready(function() {

    // Add new stage

    $(document).on("click", ".add-stage", function() {

        var newStage = $(".stage").first().clone();



        // Find all input and textarea elements within the new stage

        newStage.find("input[type=text], input[type=date], textarea").val("");



        // Update labels and names to indicate the stage number

        var stageNumber = $(".stage").length + 1;

        newStage.find("label:contains('Stage 1 Title')").text("Stage " + stageNumber + " Title");

        newStage.find("label:contains('Stage 1 Date')").text("Stage " + stageNumber + " Date");

        newStage.find("label:contains('Stage 1 About')").text("Stage " + stageNumber + " About");

        

        newStage.find("input[name^='stage_title']").attr("name", "stage_title[" + (stageNumber - 1) + "]");

        newStage.find("input[name^='stage_date']").attr("name", "stage_date[" + (stageNumber - 1) + "]");

        newStage.find("textarea[name^='stage_about']").attr("name", "stage_about[" + (stageNumber - 1) + "]");



        $("#stages-container").append(newStage);



        // Show "Remove Stage" button for all stages except the first one

        $(".stage").each(function(index) {

            $(this).find(".remove-stage").toggleClass("d-none", index === 0);

        });

    });



    // Remove stage (except the first one)

    $(document).on("click", ".remove-stage", function() {

        if ($(this).closest(".stage").index() !== 0) {

            $(this).closest(".stage").remove();

        }

        // Update visibility of "Remove Stage" buttons

        $(".stage").each(function(index) {

            $(this).find(".remove-stage").toggleClass("d-none", index === 0);

        });

    });

    

    $(document).on("click", ".add-importantdates", function() {

        var newImportantDate = $(".importantdates").first().clone();



        // Find all input elements within the new important date

        newImportantDate.find("input[type=text], input[type=date]").val("");



        // Update labels and names to indicate the important date number

        var importantDateNumber = $(".importantdates").length + 1;

        newImportantDate.find("label:contains('Importantdates 1 Title')").text("Importantdates " + importantDateNumber + " Title");

        newImportantDate.find("label:contains('Importantdates 1 Date')").text("Importantdates " + importantDateNumber + " Date");

        

        newImportantDate.find("input[name^='importantdates_title']").attr("name", "importantdates_title[" + (importantDateNumber - 1) + "]");

        newImportantDate.find("input[name^='importantdates_date']").attr("name", "importantdates_date[" + (importantDateNumber - 1) + "]");



        $("#important-dates-container").append(newImportantDate);



        // Show "Remove Important Dates" button for all important dates except the first one

        $(".importantdates").each(function(index) {

            $(this).find(".remove-importantdates").toggleClass("d-none", index === 0);

        });

    });



    // Remove important dates (except the first one)

    $(document).on("click", ".remove-importantdates", function() {

        if ($(this).closest(".importantdates").index() !== 0) {

            $(this).closest(".importantdates").remove();

        }

        // Update visibility of "Remove Important Dates" buttons

        $(".importantdates").each(function(index) {

            $(this).find(".remove-importantdates").toggleClass("d-none", index === 0);

        });

    });

    

});







    </script>

    





