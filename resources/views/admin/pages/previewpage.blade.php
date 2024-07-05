@extends('layouts.adminlayout')
@section('title', $page->title . ' Preview')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Card-->
								<div class="d-flex flex-wrap flex-stack mb-6">
									<!--begin::Heading-->
									<h3 class="fw-bolder my-2">{{ $page->title }} Preview 
									<span class="fs-6 text-gray-400 fw-bold ms-1"></span></h3>
									<!--end::Heading-->
									<!--begin::Actions-->
									<div class="d-flex flex-wrap my-2">
										<a class="btn btn-dark btn-sm" href="{{ route('editpagesection', ['page_id' => $page->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
									</div>
									<!--end::Actions-->
								</div>
								<div class="card">
									<!--begin::Card body-->
								@foreach($pagesections as $pagesection)
									@if($pagesection->type === "contentwithbg")
									 <div class="row p-0 d-flex justify-content-center align-items-center" 
								         style="background-color:{{ $pagesection->background_color }};
								                background: url('{{ $pagesection->background_image ? asset('storage/' . $pagesection->background_image) : asset('images/default-bg.jpg') }}');
								                background-size: cover; background-position: center center;">
								        <div class="d-flex justify-content-center align-items-center  p-5" style="width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
								            <div class="col-md-6 p-2 ">
								                <h6 class="py-5 text-center" style="color: white;">{{ $pagesection->heading }}</h6>
								                <p class="py-5 text-center" style="color: white;">{!! $pagesection->content !!}</p>

								            </div>
								        </div>
								    </div>
								    @elseif($pagesection->type === "rightcontent")
								    <div class="row p-0 d-flex justify-content-center " 
								         style="background-color:{{ $pagesection->background_color }};">
								        <div class="d-flex justify-content-center p-5" style="width: 100%; height: 100%;">
								            <div class="col-md-5 p-0 ">
								               <img src="{{ asset('storage/'. $pagesection->background_image) }}" class="img-fluid">
								            </div>
								            <div class="col-md-6 p-2 d-flex flex-column justify-content-center align-items-center">
								                <h6 class="p-5 text-center" style="color: #000;">{{ $pagesection->heading }}</h6>
								                <p class="p-5 text-center" style="color: #000;">{!! $pagesection->content !!}</p>
								            </div>
								        </div>
								    </div>

								    @elseif($pagesection->type === "leftcontent")
								    <div class="row p-0 d-flex justify-content-center " 
								         style="background-color:{{ $pagesection->background_color }};">
								        <div class="d-flex justify-content-center p-5" style="width: 100%; height: 100%;">
								            <div class="col-md-6 p-2 d-flex flex-column justify-content-center align-items-center">
								                <h6 class="p-5 text-center" style="color: #000;">{{ $pagesection->heading }}</h6>
								                <p class="p-5 text-center" style="color: #000;">{!! $pagesection->content !!}</p>
								            </div>
								            <div class="col-md-5 p-0 ">
								               <img src="{{ asset('storage/'. $pagesection->background_image) }}" class="img-fluid">
								            </div>
								        </div>
								    </div>

									@elseif($pagesection->type === "form")
									<div class="row p-0 d-flex justify-content-center " 
								         style="background-color:{{ $pagesection->background_color }};">
								        <div class="d-flex justify-content-center p-5" style="width: 100%; height: 100%;">
								            <div class="col-md-6 p-2 ">
								                <h6 class="p-5 text-center" style="color: #000;">{{ $pagesection->heading }}</h6>
								                <p class="p-5 text-center" style="color: #000;">{!! $pagesection->content !!}</p>
												<form method="post" action="{{ url('/your-form-submit-url') }}">
												@csrf <!-- CSRF Token for form submission security -->
												@if($pagesection->form_fields)
													@php
														$fields = json_decode($pagesection->form_fields, true);
													@endphp
													@foreach($fields as $field)
														<div class="mb-3">
															@if($field['type'] == 'textarea')
																<label class="form-label">{{ $field['name'] }}</label>
																<textarea name="" id="" placeholder="{{ $field['name'] }}" class="form-control"></textarea>
															@elseif($field['type'] == 'checkbox')
															<div class="form-check">
																<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
																<label class="form-check-label" for="flexCheckDefault">
																{{ $field['name'] }}
																</label>
															</div>
															@else
																<label class="form-label">{{ $field['name'] }}</label>
																<input type="{{ $field['type'] }}" placeholder="{{ $field['name'] }}" class="form-control" name="{{ strtolower(str_replace(' ', '_', $field['name'])) }}">
															@endif
														</div>
													@endforeach
												@endif
												<button type="submit" class="btn btn-dark">Submit</button>
											</form>
											<!-- End of Form -->
								            </div>
								        </div>
								    </div>

									@else
								    <div class="row p-0 d-flex justify-content-center " 
								         style="background-color:{{ $pagesection->background_color }};">
								        <div class="d-flex justify-content-center p-5" style="width: 100%; height: 100%;">
								            <div class="col-md-6 p-2 ">
								                <h6 class="p-5 text-center" style="color: #000;">{{ $pagesection->heading }}</h6>
								                <p class="p-5 text-center" style="color: #000;">{!! $pagesection->content !!}</p>

								            </div>
								        </div>
								    </div>
								    @endif
								@endforeach




									<!--end::Card body-->
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>



@endsection

