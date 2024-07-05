@extends('layouts.adminlayout')
@section('title', 'Admin Dashboard')

@section('content')
<style type="text/css">
	.pagecard-body{
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
	}
	
	.plane{
		position: absolute;
		width: 320px;
		height: 180px;
		background-color: #000;
		opacity: 0.6;
		z-index: -1;
	}

	.pagecard{
		width: 320px;
		height: 180px;
		/* margin: 5px; */
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		opacity: 1;
		/* z-index:999; */
		/* backdrop-filter: blur(0.8px); */
		box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
	}




	.pagecard img {
        width: 100%;
        height: 60%; /* Adjust height as per your design */
        object-fit: cover; /* Ensure the image covers the whole area */
    }

	.pcMenu{
		position: absolute;
		margin-top: -120px;
		margin-left: 250px;
/*		background-color: skyblue;*/
		padding: 5px;
	}

	.pcMenu button{
		border: none;
		border-radius: 100px;
		width:40px;
		height:40px;
		display: flex;
		justify-content: center;
		align-items:center;
		box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
	}

	.pcMenu ul {
	    display: none; 
/*		background-color: greenyellow;*/
	    list-style-type: none; /* Optional: Remove bullets */
	    margin: 5px; /* Optional: Remove default margin */
	    padding: 0; /* Optional: Remove default padding */
	}

	.pcMenu ul.visible {
	    display: block; /* Show the list when the 'visible' class is added */
	}

	.pagecard .details, .pagecard ul {
    transition: all 0.3s ease;
    list-style-type: none;
	}


	.pagecard ul.visible {
	    display: flex;
	    flex-direction: column;
	    align-items: center;
	    justify-content: end;
	    padding: 20px;
		padding-top: 30px;
/*	    flex-wrap: wrap;*/
	}

	.pagecard .innerul {
	    display: flex;
	    justify-content: center;
	    flex-wrap: wrap;
	    padding: 10px;
	}

	.pagecard .details.hidden{
		display: none;
	}

	.pagecard .details, .pagecard ul {
	    display: none;
	}

	.pagecard .details {
	    display: flex;
	    flex-direction: column;
	    justify-content: center;
	    align-items: center;
	    text-align: center;
	}

	.pagecard ul.visible {
	    display: block;
	}


</style>
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
											<h2 class="mb-2">New Page Modal </h2>
											<a href="{{ route('pageBuilder.create')}}" target="blank" class="btn btn-lg  btn-dark">Add New Page</a>
											<!--end::Action-->
										</div>
										<!--end::Heading-->
									</div>
									<hr>

									<div class="pagecard-body p-2">
										@foreach($pages as $page)
										<div class="m-2 p-0" style="background-image: url('{{ asset('storage/'. $page->screenshot) }}'); background-size: cover; background-position: center; filter: blur(0.5px);">
											<div class="plane">
											</div>
											<div class="pagecard p-0">
													<div class="pcMenu">
														<button class="toggle-menu"><i class="fa fa-bars" aria-hidden="true"></i></button>
													</div>
													<div class="details">
														<p class="fw-bolder">{{ $page->title }}</p>
														<div class="form-check form-switch">
															<input class="form-check-input checkpage bg-dark border-dark" type="checkbox" data-id="{{ $page->id }}" id="flexSwitchCheck{{ $loop->iteration }}" {{ $page->active ? 'checked' : '' }}>
														</div>
														<!-- <img src="{{ asset('storage/'. $page->screenshot) }}" width="100px" style="object-fit: cover"> -->
													</div>
													<ul>
														<div class="innerul">
															<a href="{{ route('pageBuilder.show', ['id' => $page->id]) }}" target="blank" class="btn btn-success m-1 p-5 editorpage" data-id="{{ $page->id }}" title="Design">
																	<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
															</a>
															<a href="{{ route('previewEditorpage', ['id' => $page->id]) }}" target="blank" class="btn btn-dark m-1 p-5" data-id="{{ $page->id }}" title="Preview">
																	<i class="fa fa-eye" aria-hidden="true"></i>
															</a>
															<button class="btn btn-primary m-1 p-5 editpage" data-id="{{ $page->id }}">
																<i class="fa fa-pencil" aria-hidden="true" title="Edit"></i>
															</button>
															<button class="btn btn-danger m-1 p-5 deletepage" data-id="{{ $page->id }}" title="Delete">
																<i class="fa fa-trash-o " aria-hidden="true"></i>
															</button>
														</div>
													</ul>
												</div>
											</div>
											@endforeach

									</div>

									<!--end::Card body-->
								</div>
								<!--end::Card-->
								<!--begin::Modal - New Target-->
								<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content rounded">
											<!--begin::Modal header-->
											<div class="modal-header pb-0 border-0 justify-content-end">
												<!--begin::Close-->
												<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
												<!--end::Close-->
											</div>
											<!--begin::Modal header-->
											<!--begin::Modal body-->
											<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
												<!--begin:Form-->
												<form id="createForm" class="form" method="POST" enctype="multipart/form-data">
												@csrf
												<div class="mb-13 text-center">
													<h1 class="mb-3">Edit Page Details</h1>
												</div>
												<!-- <div id="successMessage" class="text-success"></div> -->
												<input type="hidden" id="pageId" name="page_id" value="">

												<!-- Page Title -->
												<div class="d-flex flex-column mb-8 fv-row">
													<label class="d-flex align-items-center fs-6 fw-bold mb-2">
														<span class="required">Page Title</span>
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a title name for future usage and reference"></i>
													</label>
													<input type="text" class="form-control form-control-solid" placeholder="Enter Page Title" name="pageTitle" id="pageTitle" required />
												</div>

												<!-- Page Content -->
												<div class="d-flex flex-column mb-8 fv-row">
													<label class="d-flex align-items-center fs-6 fw-bold mb-2">
														<span class="required">Page Content</span>
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify content for the page"></i>
													</label>
													<textarea class="form-control form-control-solid" placeholder="Enter Page Content" name="pageContent" id="pageContent" required></textarea>
												</div>

												<!-- Page Slug -->
												<div class="d-flex flex-column mb-8 fv-row">
													<label class="d-flex align-items-center fs-6 fw-bold mb-2">
														<span class="required">Page Slug</span>
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a unique slug for URL"></i>
													</label>
													<input type="text" class="form-control form-control-solid" placeholder="Enter Page Slug" name="pageSlug" id="pageSlug" required />
												</div>

												<!-- Add Screenshot (Image Upload) -->
												<div class="d-flex flex-column mb-8 fv-row">
													<label class="d-flex align-items-center fs-6 fw-bold mb-2">
														<span class="required">Add Screenshot</span>
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Took screenshot from editor"></i>
													</label>
													<input type="file" class="form-control form-control-solid" name="imageData" id="imageData" accept="image/*" />
												</div>

												<!-- Page Status -->
												<div class="d-flex flex-stack mb-8">
													<div class="me-5">
														<label class="fs-6 fw-bold">Page Status</label>
													</div>
													<label class="form-check form-switch form-check-custom form-check-solid">
														<input class="form-check-input bg-dark border-dark" type="checkbox" name="status" id="status" value="1" checked="checked" />
														<span class="form-check-label fw-bold text-muted">Active</span>
													</label>
												</div>

												<!-- Actions -->
												<div class="text-center">
													<button type="reset" id="kt_modal_new_target_cancel" class="btn btn-danger me-3">Cancel</button>
													<button type="submit" id="submitButton" class="btn btn-dark">Submit</button>
												</div>
											</form>


												<!--end:Form-->
											</div>
											<!--end::Modal body-->
										</div>
										<!--end::Modal content-->
									</div>
									<!--end::Modal dialog-->
								</div>
								<!--end::Modal - New Target-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>



					<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
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

                    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header bg-danger text-center">
                            <h5 class="modal-title text-light" id="errorModalLabel">!Errors</h5>
                            <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center" id="errorMessage">oooooooooooooo!</div>
                          </div>
                        </div>
                      </div>
                    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// Handle Edit and Create actions in a single form
$(document).ready(function() {
    $('.editpage').on('click', function() {
        var page_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: '{{ route("editpage", ["page_id" => "__page_id__"]) }}'.replace('__page_id__', page_id),
            success: function(response) {
                if (response.status === 'success') {
                    // Populate the form fields
                    $('#pageTitle').val(response.data.title);
                    $('#pageContent').val(response.data.content);
                    $('#pageSlug').val(response.data.slug);
                    $('#pageId').val(response.data.id);
                    if (response.data.active === 1) {
                        $('#status').prop('checked', true);
                    } else {
                        $('#status').prop('checked', false);
                    }
                    $('#submitButton').text('Update');
                    $('#createForm').attr('action', '{{ route("updatepage", ["page_id" => "__page_id__"]) }}'.replace('__page_id__', page_id));
                    $('#createForm').attr('method', 'POST');
                    $('#kt_modal_new_target').modal('show');
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseText);
                console.error(xhr.responseText);
            }
        });
    });

});


    // Handle form submission for both create and update
	$(document).ready(function() {
    $('#createForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this); // Create FormData object to handle file uploads
        var pageId = $('#pageId').val();
        var csrfToken = '{{ csrf_token() }}'; // Fetch CSRF token
        
        // Append CSRF token to formData
        formData.append('_token', csrfToken);
        
        var method = pageId ? 'POST' : 'POST';
        var url = pageId ? '{{ route("updatepage", ["page_id" => "__page_id__"]) }}'.replace('__page_id__', pageId) : '{{ route("createpage") }}';
        
        $.ajax({
            type: method,
            url: url,
            data: formData,
            processData: false, // Prevent jQuery from automatically transforming the data into a query string
            contentType: false, // Prevent jQuery from setting the Content-Type header
            headers: {
                'X-CSRF-TOKEN': csrfToken // Set CSRF token in headers as well
            },
            success: function(response) {
                $('#successMessage').text(response.message);
                $('#kt_modal_new_target').modal('hide');
                $('#successModal').modal('show');
                setTimeout(function() {
                    $('#successModal').modal('hide');
                    location.reload();
                }, 2000);
            },
			error: function(response) {
                            // Check if the response has validation errors
							
							$('#kt_modal_new_target').modal('hide');
                            $('#createPageModal').modal('hide');
                            if (response.status === 422) {
                                var errors = response.responseJSON.errors;
                                var errorMessages = '';
                                
                                $.each(errors, function(key, value) {
                                    errorMessages += value[0] + '<br>';
                                });
                                
                                $('#errorMessage').html(errorMessages);
                                $('#errorModal').modal('show');
                            } else {
                                $('#errorMessage').text('An unexpected error occurred.');
                                $('#errorModal').modal('show');
                            }
                        }
        });
    });
});








// Update Status
$(document).ready(function(){
    $('.checkpage').change(function(){
        var status = $(this).prop('checked') ? 'active' : 'inactive';
        var page_id = $(this).data('id');
        $.ajax({
            url: '{{ route("pages.updateStatus") }}',
            type: 'PUT',
            data: {
            	 _token : '{{ csrf_token() }}',
                status: status,
                page_id: page_id
            },
            success: function(response) {
                $('#successMessage').text(response.message);
                $('#successModal').modal('show'); 
                setTimeout(function() {
                    $('#successModal').modal('hide');
                    location.reload();
                }, 2000); 
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseText);
            }
        });
    });
});



// Delete Page
$(document).ready(function(){
    $('.deletepage').click(function(){
        var page_id = $(this).data('id');
        $.ajax({
            url: '{{ route("deletepage", ["page_id" => "__page_id__"]) }}'.replace('__page_id__', page_id),
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#successMessage').text(response.message);
                $('#successModal').modal('show'); 
                setTimeout(function() {
                    $('#successModal').modal('hide');
					location.reload();
                }, 2000); 
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseText);
            }
        });
    });
});



$(document).ready(function() {
    $('.toggle-menu').on('click', function() {
        var pagecard = $(this).closest('.pagecard');
        var details = pagecard.find('.details');
        var menu = pagecard.find('ul');
        var icon = $(this).find('i');
        
        details.toggleClass('hidden');
        menu.toggleClass('visible');

        // Toggle the icon between bars and times
        if (icon.hasClass('fa-bars')) {
            icon.removeClass('fa-bars').addClass('fa-times');
        } else {
            icon.removeClass('fa-times').addClass('fa-bars');
        }
    });
});

</script>
