@extends('admin.layout.main')
@section('title','Welcome Page')
@section('description','main')
@section('author','main')
@section('keywords','main')
@section('copyright','main')
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__("str.Form One")}}</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{url("/admin")}}"
                               class="text-muted text-hover-primary">{{__("str.Dashboard")}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">{{__("str.Form One")}}</li>
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
                <div id="kt_ecommerce_edit_form" class="form d-flex flex-column flex-lg-row"
                     data-kt-redirect="">
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options One-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{__("str.Form One Part One")}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="row card-body pt-0 pb-0">
                                <!--begin::Input group-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                    <!--begin::Label-->
                                    <label for="full_name"
                                           class="required form-label">{{__("str.Full Name")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="full_name" type="text" name="full_name"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->full_name}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="full_name_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="id_number"
                                           class="required form-label">{{__("str.ID number")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="id_number" type="number" name="id_number"
                                           class="text-start form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->id_number}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="id_number_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <label for="date_of_birth"
                                           class="required form-label">{{__("str.Date of birth")}}</label>
                                    <div class="input-group">
                                        <input name="date_of_birth" id="date_of_birth"
                                               class="form_two_date_of_birth form-control form-control-solid mb-3 mb-lg-0"
                                               data-kt-repeater="datepicker"
                                               placeholder="@lang("str.Pick a date")" value="{{$form->date_of_birth}}"/>
                                        <span class="input-group-text border-0"><i
                                                    class="text-dark la la-calendar"></i></span>
                                    </div>
                                    <!--begin::Error-->
                                    <strong id="date_of_birth_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="age"
                                           class="required form-label">{{__("str.Age")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="age" type="number" name="age"
                                           class="required text-start form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->age}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="age_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="place_of_birth"
                                           class="required form-label">{{__("str.Place of Birth")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="place_of_birth" type="text" name="place_of_birth"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->place_of_birth}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="place_of_birth_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group SelectorMultiChoiceInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="form_one_disability_type_cd"
                                           class="required form-label">{{__("str.Disability type")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Select2-->
                                    <select id="form_one_disability_type_cd" class="form-select form-select-solid"
                                            data-control="select2" name="form_one_disability_type_cd"
                                            data-placeholder="{{__("str.Select an option")}}"
                                            multiple="multiple">
                                        <option></option>
                                        @foreach(get_core_lookups(7) as $core)
                                            <option value="{{$core->lookup_id}}" {{$form->disability_type_cd == $core->lookup_id ? "selected":""}}>{{lang($core)}}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Select2-->
                                    <!--begin::Error-->
                                    <strong id="form_one_disability_type_cd_error"
                                            class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group RadioInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="form_one_citzienship_cd"
                                           class="required form-label ">{{__("str.Citzienship")}}</label>
                                    <!--end::Label-->
                                    <div class="form-control form-control-solid">
                                        <!--begin::Input row-->
                                        <div class="d-flex flex-column fv-row">
                                            <div class="row">
                                            @foreach(get_core_lookups(4) as $k=>$core)
                                                <!--begin::Radio-->
                                                    <div class="col-6 form-check form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form_one_citzienship_cd form-check-input me-3"
                                                               name="form_one_citzienship_cd"
                                                               type="radio" {{$form->citizenship_cd == $core->lookup_id ? "checked":""}}
                                                               value="{{$core->lookup_id}}"/>
                                                        <!--end::Input-->

                                                        <!--begin::Label-->
                                                        <label class="form-check-label"
                                                               for="form_one_citzienship_cd">
                                                            {{lang($core)}}
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Radio-->
                                                @endforeach
                                            </div>
                                        </div>
                                        <!--end::Input row-->
                                    </div>
                                    <!--begin::Error-->
                                    <strong id="form_one_citzienship_cd_error"
                                            class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group RadioInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="gender_cd"
                                           class="required form-label ">{{__("str.Gender")}}</label>
                                    <!--end::Label-->
                                    <div class="form-control form-control-solid">

                                        <!--begin::Input row-->
                                        <div class="d-flex flex-column fv-row">
                                            <div class="row">
                                            @foreach(get_core_lookups(1) as $k=>$core)
                                                <!--begin::Radio-->
                                                    <div class="col-6 form-check form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input me-3" name="gender_cd"
                                                               type="radio" {{$form->gender_cd == $core->lookup_id ? "checked":""}}
                                                               value="{{$core->lookup_id}}"
                                                               id="gender_cd"/>
                                                        <!--end::Input-->

                                                        <!--begin::Label-->
                                                        <label class="form-check-label"
                                                               for="gender_cd">
                                                            {{lang($core)}}
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Radio-->
                                                @endforeach
                                            </div>
                                        </div>
                                        <!--end::Input row-->
                                    </div>
                                    <!--begin::Error-->
                                    <strong id="gender_cd_error"
                                            class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group TextAreaInput-->
                                <div class="col-sm-12 col-md-6 col-lg-12 mb-10">
                                    <!--begin::Input group TextAreaInput-->
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <!--begin::Label-->
                                        <label for="notes"
                                               class="form-label">{{__("str.Notes")}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea rows="3" id="notes" type="text"
                                                  name="notes"
                                                  class="form-control form-control-solid mb-3 mb-lg-0"
                                                  placeholder="{{__("str.Enter Here")}}">{{$form->notes}}</textarea>
                                        <!--end::Input-->
                                        <!--begin::Error-->
                                        <strong id="notes_error"
                                                class="errors text-danger fs-7"></strong>
                                        <!--end::Error-->

                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::General options-->
                        <!--begin::General options Two-->
                        <!--begin::Repeater-->
                        <div id="kt_docs_repeater_advanced" class="card card-flush py-4">
                            <!--begin::Form group-->
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{__("str.Form Two Part Two")}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <div data-repeater-list="kt_docs_repeater_advanced">
                                @foreach($form->members as $member)
                                    <div data-repeater-item>
                                        <div class="row card-body pt-0 pb-0">
                                            <!--begin::Input group-->
                                            <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                                <!--begin::Label-->
                                                <label for="form_two_relationship_cd"
                                                       class="required form-label">{{__("str.Relationship")}}</label>
                                                <!--end::Label-->
                                                <select class="form_two_relationship_cd form-select form-select-solid"
                                                        data-kt-repeater="select2"
                                                        data-placeholder="{{__("str.Select an option")}}"
                                                        name="form_two_relationship_cd"
                                                        data-hide-search="true">
                                                    <option></option>
                                                    @foreach(get_core_lookups(13) as $core)
                                                        <option value="{{$core->lookup_id}}" {{$member->relationship_cd == $core->lookup_id ? "selected":""}}>{{lang($core)}}</option>
                                                    @endforeach
                                                </select>
                                                <!--begin::Error-->
                                                <strong id="form_two_relationship_cd_error"
                                                        class="errors text-danger fs-7"></strong>
                                                <!--end::Error-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="col-sm-12 col-md-6 col-lg-3 mb-10">
                                                <!--begin::Label-->
                                                <label for="form_two_full_name"
                                                       class="required form-label">{{__("str.Full Name")}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="form_two_full_name"
                                                       class="form_two_full_name form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="{{__("str.Enter Here")}}"
                                                       value="{{$member->full_name}}"/>
                                                <!--end::Input-->
                                                <!--begin::Error-->
                                                <strong id="form_two_full_name_error"
                                                        class="errors text-danger fs-7"></strong>
                                                <!--end::Error-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="col-sm-12 col-md-6 col-lg-3 mb-10">
                                                <!--begin::Label-->
                                                <label for="form_two_id_number"
                                                       class="required form-label">{{__("str.ID number")}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" name="form_two_id_number"
                                                       class="form_two_id_number text-start form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="{{__("str.Enter Here")}}"
                                                       value="{{$member->id_number}}"/>
                                                <!--end::Input-->
                                                <!--begin::Error-->
                                                <strong id="form_two_id_number_error"
                                                        class="errors text-danger fs-7"></strong>
                                                <!--end::Error-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                                <label for="form_two_date_of_birth"
                                                       class="required form-label">{{__("str.Date of birth")}}</label>
                                                <div class="input-group">
                                                    <input name="form_two_date_of_birth"
                                                           class="form_two_date_of_birth form-control form-control-solid mb-3 mb-lg-0"
                                                           data-kt-repeater="datepicker"
                                                           placeholder="@lang("str.Pick a date")"
                                                           value="{{$member->date_of_birth}}"/>
                                                    <span class="input-group-text border-0"><i
                                                                class="text-dark la la-calendar"></i></span>
                                                </div>
                                                <!--begin::Error-->
                                                <strong id="form_two_date_of_birth_error"
                                                        class="errors text-danger fs-7"></strong>
                                                <!--end::Error-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                                <!--begin::Label-->
                                                <label for="form_two_age"
                                                       class="required form-label">{{__("str.Age")}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" name="form_two_age"
                                                       class="form_two_age required text-start form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="{{__("str.Enter Here")}}"
                                                       value="{{$member->age}}"/>
                                                <!--end::Input-->
                                                <!--begin::Error-->
                                                <strong id="form_two_age_error" class="errors text-danger fs-7"></strong>
                                                <!--end::Error-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                                <!--begin::Label-->
                                                <label for="form_two_place_of_birth"
                                                       class="required form-label">{{__("str.Place of Birth")}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="form_two_place_of_birth"
                                                       class="form_two_place_of_birth form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="{{__("str.Enter Here")}}"
                                                       value="{{$member->place_of_birth}}"/>
                                                <!--end::Input-->
                                                <!--begin::Error-->
                                                <strong id="form_two_place_of_birth_error"
                                                        class="errors text-danger fs-7"></strong>
                                                <!--end::Error-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="col-sm-12 col-md-6 col-lg-3 mb-10">
                                                <!--begin::Label-->
                                                <label for="form_two_disability_type_cd"
                                                       class="required form-label">{{__("str.Disability type")}}</label>
                                                <!--end::Label-->
                                                <select class="form_two_disability_type_cd form-select form-select-solid"
                                                        data-kt-repeater="select2" name="form_two_disability_type_cd"
                                                        data-placeholder="{{__("str.Select an option")}}"
                                                        data-allow-clear="true" multiple="multiple" data-hide-search="true">
                                                    <option></option>
                                                    @foreach(get_core_lookups(7) as $core)
                                                        <option value="{{$core->lookup_id}}"
                                                        @foreach(json_decode($member->disability_type_cd) as $type)
                                                                @endforeach
                                                                {{$type == $core->lookup_id ? "selected":""}}>{{lang($core)}}</option>
                                                    @endforeach
                                                </select>
                                                <!--begin::Error-->
                                                <strong id="form_two_disability_type_cd_error"
                                                        class="errors text-danger fs-7"></strong>
                                                <!--end::Error-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                                <!--begin::Label-->
                                                <label for="form_two_living_status_cd"
                                                       class="required form-label">{{__("str.Living Status")}}</label>
                                                <!--end::Label-->
                                                <select class="form_two_living_status_cd form-select form-select-solid"
                                                        data-kt-repeater="select2" name="form_two_living_status_cd"
                                                        data-placeholder="{{__("str.Select an option")}}"
                                                        data-hide-search="true">
                                                    <option></option>
                                                    @foreach(get_core_lookups(20) as $core)
                                                        <option value="{{$core->lookup_id}}" {{$member->living_status_cd == $core->lookup_id ? "selected":""}}>{{lang($core)}}</option>
                                                    @endforeach
                                                </select>
                                                <!--begin::Error-->
                                                <strong id="form_two_living_status_cd_error"
                                                        class="errors text-danger fs-7"></strong>
                                                <!--end::Error-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group RadioInput-->
                                            <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                                <!--begin::Label-->
                                                <label for="form-check-input"
                                                       class="required form-label ">{{__("str.Citzienship")}}</label>
                                                <!--end::Label-->
                                                <div class="form-control form-control-solid">
                                                    <!--begin::Input row-->
                                                    <div class="d-flex flex-column fv-row">
                                                        <div class="row">
                                                        @foreach(get_core_lookups(4) as $k=>$core)
                                                            <!--begin::Radio-->
                                                                <div class="col-6 form-check form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form_two_citzienship_cd form-check-input me-3"
                                                                           name="form_two_citzienship_cd"
                                                                           type="radio" {{$member->citizenship_cd == $core->lookup_id ? "checked":""}}
                                                                           value="{{$core->lookup_id}}"
                                                                    />
                                                                    <!--end::Input-->

                                                                    <!--begin::Label-->
                                                                    <label class="form-check-label"
                                                                           for="form_two_citzienship_cd">
                                                                        {{lang($core)}}
                                                                    </label>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!--end::Radio-->
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!--end::Input row-->
                                                    <!--begin::Error-->
                                                    <strong id="citzienship_cd_error"
                                                            class="errors text-danger fs-7"></strong>
                                                    <!--end::Error-->
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group RadioInput-->
                                            <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                                <!--begin::Label-->
                                                <label for="form-check-input"
                                                       class="required form-label ">{{__("str.Gender")}}</label>
                                                <!--end::Label-->
                                                <div class="form-control form-control-solid">

                                                    <!--begin::Input row-->
                                                    <div class="d-flex flex-column fv-row">
                                                        <div class="row">
                                                        @foreach(get_core_lookups(1) as $k=>$core)
                                                            <!--begin::Radio-->
                                                                <div class="col-6 form-check form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form_two_gender_cd form-check-input me-3"
                                                                           name="form_two_gender_cd"
                                                                           type="radio" {{$member->gender_cd == $core->lookup_id ? "checked":""}}
                                                                           value="{{$core->lookup_id}}"
                                                                    />
                                                                    <!--end::Input-->

                                                                    <!--begin::Label-->
                                                                    <label class="form-check-label"
                                                                           for="form_two_gender_cd">
                                                                        {{lang($core)}}
                                                                    </label>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!--end::Radio-->
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!--end::Input row-->
                                                    <!--begin::Error-->
                                                    <strong id="gender_cd_error"
                                                            class="errors text-danger fs-7"></strong>
                                                    <!--end::Error-->
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                            <div class="separator col-sm-12 col-md-12 col-lg-12 mb-10"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--begin::Error-->
                            <strong id="family_members_error"
                                    class="card-footer mt-0 pt-0 errors text-danger fs-7"></strong>
                            <!--end::Error-->
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <!--end::Form group-->
                        </div>
                        <!--end::Repeater-->
                        <!--end::General options-->
                        <!--begin::General options Three-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{__("str.Form Three Part Three")}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="row card-body pt-0">
                                <!--begin::Input group SelectorOneChoiceInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="governorates_cd"
                                           class="required form-label">{{__("str.Governorate")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select id="governorates_cd" name="governorates_cd"
                                            class="form-select form-select-solid" data-control="select2"
                                            data-placeholder="{{__("str.Select an option")}}" data-hide-search="true">
                                        <option></option>
                                        @foreach(get_core_lookups(23) as $core)
                                            <option value="{{$core->lookup_id}}" {{$form->governorate_cd == $core->lookup_id ? "selected":""}}>{{lang($core)}}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="governorates_cd_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group SelectorOneChoiceInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="cities_cd"
                                           class="required form-label">{{__("str.City")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select id="cities_cd" class="form-select form-select-solid"
                                            data-control="select2" name="cities_cd"
                                            data-placeholder="{{__("str.Select an option")}}" data-hide-search="true">
                                        <option></option>
                                        @foreach(get_core_lookups(29) as $core)
                                            <option value="{{$core->lookup_id}}" {{$form->city_cd == $core->lookup_id ? "selected":""}}>{{lang($core)}}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="cities_cd_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group SelectorOneChoiceInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="areas_cd"
                                           class="required form-label">{{__("str.Area")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select id="areas_cd" class="form-select form-select-solid"
                                            data-control="select2" name="areas_cd"
                                            data-placeholder="{{__("str.Select an option")}}" data-hide-search="true">
                                        <option></option>
                                        @foreach(get_core_lookups(35) as $core)
                                            <option value="{{$core->lookup_id}}" {{$form->area_cd == $core->lookup_id ? "selected":""}}>{{lang($core)}}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="areas_cd_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group RequiredInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="address"
                                           class="required form-label">{{__("str.Address")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="address" type="text" name="address"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->address}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="address_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group NumberInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="phone"
                                           class="required form-label">{{__("str.Phone")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="phone" type="number" name="phone"
                                           class="text-start form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->phone}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="phone_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group NumberInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="mobile"
                                           class="required form-label">{{__("str.Mobile")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="mobile" type="number" name="mobile"
                                           class="text-start form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->mobile}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="mobile_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::General options-->
                        <!--begin::General options Four-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{__("str.Form Three Part Four")}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="row card-body pt-0">
                                <!--begin::Input group RequiredInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="school_name"
                                           class="required form-label">{{__("str.School name")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="school_name" type="text" name="school_name"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->school_name}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="school_name_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group RequiredInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="school_address"
                                           class="required form-label">{{__("str.School Address")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="school_address" type="text" name="school_address"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->school_address}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="school_address_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group RequiredInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="school_contact_person"
                                           class="required form-label">{{__("str.Contact person")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="school_contact_person" type="text" name="school_contact_person"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->school_contact_person}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="school_contact_person_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group NumberInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="school_phone"
                                           class="required form-label">{{__("str.Phone")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="school_phone" type="number" name="school_phone"
                                           class="text-start form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->school_phone}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="school_phone_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group NumberInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="school_mobile"
                                           class="required form-label">{{__("str.Mobile")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="school_mobile" type="number" name="school_mobile"
                                           class="text-start form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->school_mobile}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="school_mobile_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::General options-->
                        <!--begin::General options Five-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{__("str.Form Three Part Five")}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="row card-body pt-0">
                                <!--begin::Input group SelectorOneChoiceInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="employment_status_cd"
                                           class="required form-label">{{__("str.Employment status")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select id="employment_status_cd" class="form-select form-select-solid"
                                            data-control="select2" name="employment_status_cd"
                                            data-placeholder="{{__("str.Select an option")}}" data-hide-search="true">
                                        <option></option>
                                        @foreach(get_core_lookups(38) as $core)
                                            <option value="{{$core->lookup_id}}" {{$form->employment_status_cd == $core->lookup_id ? "selected":""}}>{{lang($core)}}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="employment_status_cd_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group NumberInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="employer_name"
                                           class="form-label">{{__("str.Employer Name")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="employer_name" type="text" name="employer_name"
                                           class="text-start form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->employer_name}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="employer_name_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group NumberInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="employer_phone"
                                           class="form-label">{{__("str.Phone")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="employer_phone" type="number" name="employer_phone"
                                           class="text-start form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->employer_phone}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="employer_phone_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group RequiredInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="employer_mobile"
                                           class="form-label">{{__("str.Mobile")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="employer_mobile" type="number" name="employer_mobile"
                                           class="text-start form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value="{{$form->employer_mobile}}"/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="employer_mobile_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group RequiredInput-->
                                <div class="col-sm-12 col-md-6 col-lg-2 mb-10">
                                    <!--begin::Label-->
                                    <label for="created_by"
                                           class="form-label">{{__("str.Applicant name")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <p class="form-control form-control-solid mb-3 mb-lg-0">{{$form->create_by->name}}</p>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="created_by_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="row card-body pt-0">
                                <!--begin::Input group RadioInput-->

                                <!--end::Input group-->
                                <!--begin::Input group TextAreaInput-->

                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::General options-->
                    </div>
                    <!--end::Main column-->
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <!--end::Content-->
@endsection
@section('js')
    <script src="{{ asset('assets/js/forms/form_one/view.js') }}" defer></script>
@endsection
