@extends('layouts.adminlayout')
@section('title', 'Admin Dashboard')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Card-->
								<div class="card">
									<!--begin::Card body-->
									<div class="card-body pb-0">
										<!--begin::Heading-->
										<div class="card-px d-flex justify-content-between">
											<!--begin::Title-->
											<h2 class="mb-2">ADD Form </h2>
											<!-- <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Add New Page</a> -->
											<!--end::Action-->
										</div>
										<!--end::Heading-->
									</div>
									<hr>

									<div class="card-body pt-0">
										<div class="card-body pb-0">
										<form id="createsection" class="form" method="POST" enctype="multipart/form-data">
													@csrf
										<div class="mb-3">
										  <label for="exampleFormControlInput1" class="form-label">Form Heading</label>
										  <input type="text" id="heading" name="heading" class="form-control" placeholder="Form Heading" required />
										</div>
                                        <div class="mb-3">
										  <label for="exampleFormControlInput1" class="form-label">Form Slug</label>
										  <input type="text" id="slug" name="slug" class="form-control" placeholder="Form Slug" required />
										</div>
										<div id="formFields" class="mb-3">
											<label class="form-label">Form Fields</label>
											<div id="formFieldsContainer">
												<!-- Form Fields will be appended here -->
											</div>
											<button type="button" class="btn btn-secondary" id="addFormField">Add Form Field</button>
										</div>
										<input type="submit" class="btn btn-dark" value="ADD Form">
									</form>
									</div>
									</div>

									<hr>


									<!--end::Card body-->
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>



					<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header bg-success text-center">
					        <h5 class="modal-title text-light" id="successModalLabel">Success</h5>
					      </div>
					      <div class="modal-body">
					        <div class="text-center" id="successMessage">oooooooooooooo!</div>
					      </div>
					    </div>
					  </div>
					</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#type').change(function() {
        var selectedType = $(this).val();
        if (selectedType === 'form') {
            $('#formFields').show();
        } else {
            $('#formFields').hide();
        }
    });

    // Add new form field
    $('#addFormField').click(function() {
        var formFieldHtml = `
            <div class="form-group row my-2">
                <div class="col-md-5">
                    <input type="text" class="form-control field-name" placeholder="Field Name" required>
                </div>
                <div class="col-md-5">
                    <select class="form-control field-type" required>
                        <option value="">Field Type </option>
                        <option value="text">Text</option>
                        <option value="email">Email</option>
                        <option value="number">Number</option>
                        <option value="checkbox">Checkbox</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger removeField">Remove</button>
                </div>
            </div>`;
        $('#formFieldsContainer').append(formFieldHtml);
    });

    // Remove form field
    $(document).on('click', '.removeField', function() {
        $(this).closest('.form-group').remove();
    });

    $('#createsection').on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        var formFields = [];

        // Collect form fields
        $('#formFieldsContainer .form-group').each(function(index) {
            var fieldName = $(this).find('.field-name').val();
            var fieldType = $(this).find('.field-type').val();
            
            if (fieldName && fieldType) {
                formFields.push({
                    name: fieldName,
                    type: fieldType
                });
            }
        });

        // Append JSON stringified formFields array to formData
        formData.append('formFields', JSON.stringify(formFields));
        
        $.ajax({
            type: 'POST',
            url: '{{ route("createpagesection") }}',
            data: formData,
            processData: false, 
            contentType: false, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#successMessage').text(response.message); 
                $('#successModal').modal('show'); 
                setTimeout(function() {
                    $('#successModal').modal('hide');
                }, 2000); 
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                $('#successMessage').text('Error occurred: ' + xhr.responseText);
            }
        });
    });
});

</script>

