@extends('layouts.adminlayout')
@section('title', 'Admin Dashboard')

@section('content')

  <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
              <!--begin::Container-->
              <div id="kt_content_container" class="container-xxl">
                <!--begin::Row-->
                <div class="row g-5 g-xl-8">
                  <div class="col-xl-4">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-body-white hoverable card-xl-stretch mb-xl-8">
                      <!--begin::Body-->
                      <div class="card-body">
                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                        <span class="fs-2 fw-bold">
                          {{ $usercount }}
                        </span>
                        <!--end::Svg Icon-->
                        <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-2">Total Users</div>
                        <!-- <div class="fw-bold text-gray-400">Lands, Houses, Ranchos, Farms</div> -->
                      </div>
                      <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                  </div>
                  <div class="col-xl-4">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                      <!--begin::Body-->
                      <div class="card-body">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                        <span class="fs-2 text-light">
                          {{ $activepagescount }}
                        </span>
                        <!--end::Svg Icon-->
                        <div class="text-white fw-bolder fs-2 mb-2 mt-2">Active Pages </div>
                        <!-- <div class="fw-bold text-white">Flats, Shared Rooms, Duplex</div> -->
                      </div>
                      <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                  </div>
                  <div class="col-xl-4">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-dark hoverable card-xl-stretch mb-5 mb-xl-8">
                      <!--begin::Body-->
                      <div class="card-body">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
                        <span class="fs-2 text-gray-100">
                          {{ $pagescount }}
                        </span>
                        <!--end::Svg Icon-->
                        <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-2  ">Total Pages</div>
                        <!-- <div class="fw-bold text-gray-100">50% Increased for FY20</div> -->
                      </div>
                      <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                  </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row g-5 g-xl-8">
                  <div class="col-xl-6">
                    <!--begin::List Widget 7-->
                    <div class="card card-xl-stretch mb-xl-8">
                      <!--begin::Header-->
                      <div class="card-header align-items-center border-0 mt-4">
                        <h3 class="card-title align-items-start flex-column">
                          <span class="fw-bolder text-dark">Web Pages</span>
                          <span class="text-muted mt-1 fw-bold fs-7">list of all pages</span>
                        </h3>
                        <div class="card-toolbar">
                          <!--begin::Menu-->
                          <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-2">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                  <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                  <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                  <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                </g>
                              </svg>
                            </span>
                            <!--end::Svg Icon-->
                          </button>
                          <!--begin::Menu 1-->
                          <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6148588700dd8">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                              <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->
                            <!--begin::Form-->
                            <div class="px-7 py-5">
                              <!--begin::Input group-->
                              <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Status:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                  <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_6148588700dd8" data-allow-clear="true">
                                    <option></option>
                                    <option value="1">Approved</option>
                                    <option value="2">Pending</option>
                                    <option value="2">In Process</option>
                                    <option value="2">Rejected</option>
                                  </select>
                                </div>
                                <!--end::Input-->
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Member Type:</label>
                                <!--end::Label-->
                                <!--begin::Options-->
                                <div class="d-flex">
                                  <!--begin::Options-->
                                  <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                    <span class="form-check-label">Author</span>
                                  </label>
                                  <!--end::Options-->
                                  <!--begin::Options-->
                                  <label class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                    <span class="form-check-label">Customer</span>
                                  </label>
                                  <!--end::Options-->
                                </div>
                                <!--end::Options-->
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Notifications:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                  <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                  <label class="form-check-label">Enabled</label>
                                </div>
                                <!--end::Switch-->
                              </div>
                              <!--end::Input group-->
                              <!--begin::Actions-->
                              <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                              </div>
                              <!--end::Actions-->
                            </div>
                            <!--end::Form-->
                          </div>
                          <!--end::Menu 1-->
                          <!--end::Menu-->
                        </div>
                      </div>
                      <!--end::Header-->
                      <!--begin::Body-->
                      <div class="card-body pt-3">
                        <!--begin::Item-->
                        @foreach($pages as $page)
                        <div class="d-flex align-items-sm-center mb-7">
                          <!--begin::Symbol-->
                          <div class="symbol symbol-60px symbol-2by3 me-4">
                            <div class="symbol-label" style="background-image: url('{{ asset('storage/'. $page->screenshot) }}')"></div>
                          </div>
                          <!--end::Symbol-->
                          <!--begin::Title-->
                          <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                            <div class="flex-grow-1 me-2">
                              <a href="{{ route('previewEditorpage', ['id' => $page->id]) }}" class="text-gray-800 fw-bolder text-hover-primary fs-6">{{ $page->title }}</a>
                              <!-- <span class="text-muted fw-bold d-block pt-1">Size: 87KB</span> -->
                            </div>
                            @if ($page->active == 1)
                                <span class="badge badge-light-success fs-8 fw-bolder my-2">Active</span>
                            @else
                                <span class="badge badge-light-danger fs-8 fw-bolder my-2">Inactive</span>
                            @endif

                          </div>
                          <!--end::Title-->
                        </div>
											@endforeach
                        <!--end::Item-->
                      </div>
                      <!--end::Body-->
                    </div>
                    <!--end::List Widget 7-->
                  </div>
                  <div class="col-xl-6">
                    <!--begin::List Widget 6-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                      <!--begin::Header-->
                      <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">Users</h3>
                        <div class="card-toolbar">
                          <!--begin::Menu-->
                          <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-2">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                  <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                  <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                  <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                </g>
                              </svg>
                            </span>
                            <!--end::Svg Icon-->
                          </button>
                          <!--begin::Menu 3-->
                          <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                            <!--begin::Heading-->
                            <div class="menu-item px-3">
                              <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="#" class="menu-link px-3">Create Invoice</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="#" class="menu-link flex-stack px-3">Create Payment
                              <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="#" class="menu-link px-3">Generate Bill</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                              <a href="#" class="menu-link px-3">
                                <span class="menu-title">Subscription</span>
                                <span class="menu-arrow"></span>
                              </a>
                              <!--begin::Menu sub-->
                              <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                  <a href="#" class="menu-link px-3">Plans</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                  <a href="#" class="menu-link px-3">Billing</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                  <a href="#" class="menu-link px-3">Statements</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                  <div class="menu-content px-3">
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                      <!--begin::Input-->
                                      <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                      <!--end::Input-->
                                      <!--end::Label-->
                                      <span class="form-check-label text-muted fs-6">Recuring</span>
                                      <!--end::Label-->
                                    </label>
                                    <!--end::Switch-->
                                  </div>
                                </div>
                                <!--end::Menu item-->
                              </div>
                              <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-1">
                              <a href="#" class="menu-link px-3">Settings</a>
                            </div>
                            <!--end::Menu item-->
                          </div>
                          <!--end::Menu 3-->
                          <!--end::Menu-->
                        </div>
                      </div>
                      <!--end::Header-->
                      <!--begin::Body-->
                      <div class="card-body pt-0">
                        <!--begin::Item-->
                        @foreach($allusers as $suser)
                        <div class="d-flex align-items-center bg-light-success rounded p-5 mb-2">
                          <!--begin::Icon-->
                          <span class="svg-icon svg-icon-info me-5">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                            <span class="svg-icon svg-icon-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                              </svg>
                            </span>
                            <!--end::Svg Icon-->
                          </span>
                          <!--end::Icon-->
                          <!--begin::Title-->
                          <div class="flex-grow-1 me-2">
                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">{{ $suser->name }}</a>
                            <span class="text-muted fw-bold d-block">{{ $suser->email }}</span>
                          </div>
                          <!--end::Title-->
                          <!--begin::Lable-->
                          <!-- <span class="fw-bolder text-info py-1">+28%</span> -->
                          <!--end::Lable-->
                        </div>
                        @endforeach
                        <!--end::Item-->
                      </div>
                      <!--end::Body-->
                    </div>
                    <!--end::List Widget 6-->
                  </div>
                </div>
                <!--end::Row-->
              </div>
              <!--end::Container-->
            </div>
            <!--end::Post-->
          </div>

@endsection