@extends('admin.layout.main')
@section('title',__("str.Form One"))
@section('description',__("str.Form One"))
@section('author',__("str.Form One"))
@section('keywords',__("str.Form One"))
@section('copyright',__("str.Form One"))
@section('css')
@endsection
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                     class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('str.Form One')}}</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{url("admin")}}"
                               class="text-muted text-hover-primary">{{__("str.Dashboard")}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-dark">{{__('str.Form One')}}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <!--end::Actions-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Forms-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-4">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                              height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                              fill="black"/>
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                              fill="black"/>
													</svg>
												</span>
                                <!--end::Svg Icon-->
                            </div>
                            <input id="search" type="text" data-kt-ecommerce-forms-filter="search"
                                   class="form-control form-control-solid w-250px ps-14"
                                   placeholder="@lang('str.Search Here')"/>
                            <!--end::Search-->
                        </div>
                        <div id="filter_perant" class="card-toolbar flex-row-fluid justify-content-end gap-5"
                             data-kt-forms-table-toolbar="base">
                            <!--begin::Filter-->
                            {{--<a href="#" class="btn btn-icon bg-gray-100">
                                <span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
													</svg>
												</span>
                            </a>--}}
                            {{--<div class=" badge badge-warning badge-sm">
                                {{__("str.Filter by")}}
                                --}}{{--<i class="las la-angle-double-right text-light"></i>--}}{{--
                            </div>--}}
                            <div class="w-100 mw-150px">
                                <!--begin::Input-->
                                <select id="filter_by_governorate" class="filter_data form-select form-select-solid"
                                        data-control="select2" name="filter_by_governorate"
                                        data-placeholder="{{__("str.Filter by governorate")}}" data-hide-search="true">
                                    <option></option>
                                    @foreach(get_core_lookups(23) as $core)
                                        <option value="{{$core->lookup_id}}">{{lang($core)}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="w-100 mw-150px">
                                <!--begin::Input-->
                                <select id="filter_by_citizenship" class="filter_data form-select form-select-solid"
                                        data-control="select2" name="filter_by_citizenship"
                                        data-placeholder="{{__("str.Filter by citizenship")}}" data-hide-search="true">
                                    <option></option>
                                    @foreach(get_core_lookups(4) as $k=>$core)
                                        <option value="{{lang($core)}}">{{lang($core)}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="w-100 mw-150px">
                                <!--begin::Input-->
                                <select id="filter_by_gender" class="filter_data form-select form-select-solid"
                                        data-control="select2" name="filter_by_gender"
                                        data-placeholder="{{__("str.Filter by gender")}}" data-hide-search="true">
                                    <option></option>
                                    @foreach(get_core_lookups(1) as $core)
                                        <option value="{{lang($core)}}">{{lang($core)}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            {{--<div class="w-100 mw-150px">
                                <div class="input-group">
                                    <input name="filter_by_date_of_birth" id="filter_by_date_of_birth"
                                           class="filter_data filter_by_date_of_birth form-control form-control-solid mb-3 mb-lg-0"
                                           data-kt-repeater="datepicker"
                                           placeholder="@lang("str.Filter by date of birth")"/>
                                    <span class="input-group-text border-0"><i
                                                class="text-dark la la-calendar"></i></span>
                                </div>
                            </div>--}}
                            <!--end::Filter-->
                            <!--begin::Add forms-->
                            <!--begin::Card toolbar-->
                            <a id="reset" class="btn btn-light-danger">
                                {{__("str.Reset")}}
                                {{--<i class="las la-angle-double-right text-light"></i>--}}
                            </a>

                                <a href="{{url("/admin/form_one/create")}}"
                                   class="btn btn-primary">{{__("str.Add Form")}}</a>

                        <!--end::Card toolbar-->
                            <!--end::Add forms-->
                        </div>

                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_forms_table">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="text-start">{{__('str.ID')}}</th>
                                <th class="text-start ps-2">{{__('str.Name')}}</th>
                                <th class="text-center">{{__('str.ID number')}}</th>
                                <th class="text-center">{{__('str.Date of birth')}}</th>
                                <th class="text-center">{{__('str.Governorate')}}</th>
                                <th class="text-center">{{__('str.Citzienship')}}</th>
                                <th class="text-center">{{__('str.Gender')}}</th>
                                <th class="text-center">{{__('str.Created at')}}</th>
                                <th class="text-center">{{__('str.Updated at')}}</th>
                                <th class="text-center">{{__("str.Status")}}</th>
                                <th class="text-center">{{__('str.Actions')}}</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600"></tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Forms-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('js')
    <script src="{{ asset('assets/js/forms/form_one/list.js') }}" defer></script>
@endsection
