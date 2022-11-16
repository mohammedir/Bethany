<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FamilyMembers;
use App\Models\Individuals;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class FormOneAdminController extends Controller
{
    public function index(Request $request)
    {
        $data = Individuals::query()->latest()->get();
        if ($request->core_id){
            $data = Individuals::query()->where("governorate_cd", $request->core_id)->get();
            if (!$data)
                $data = Individuals::query()->where("citizenship_cd", $request->core_id)->get();
        }
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('id', function ($data) {

                    if (auth()->guard("admin")->user()->can('form one_view'))
                        return '<!--begin::Location name=-->
                                    <div class="d-flex">
                                        <div class="">
                                            <!--begin::Title-->
                                           <a class="text-gray-600 text-hover-primary fs-5 fw-bolder mb-1" 
                                           href="' . url("admin/form_one/show/" . $data->individual_id) . '">' . $data->individual_id . '
                                           </a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                <!--end::Location=-->';
                    else
                        return '<!--begin::Location name=-->
                                    <div class="d-flex">
                                        <div class="">
                                            <!--begin::Title-->
                                           <a href="" class="text-gray-600 text-hover-primary fs-5 fw-bolder mb-1" data-id="' . $data->individual_id . '" 
                                                data-status="' . $data->status . '" data-kt-ecommerce-category-filter="category_name">' . $data->individual_id . '
                                           </a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                <!--end::Location=-->';
                })
                ->addColumn('full_name', function ($data) {
                    $path_edit = "#";
                    if (auth()->guard("admin")->user()->can('form one_view'))
                        $path_edit = url("admin/form_one/show/" . $data->individual_id);
                    return '<a href="' . $path_edit . '" class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $data->full_name . '</a>';
                })
                ->addColumn('id_number', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->id_number . '">
                                    <span class="fw-bolder text-gray-600">' . $data->id_number . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('date_of_birth', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->id_number . '">
                                    <span class="fw-bolder text-gray-600">' . $data->date_of_birth . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('governorate_cd', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->id_number . '">
                                    <span class="fw-bolder text-gray-600">' . get_core($data->governorate_cd) . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('citizenship_cd', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->id_number . '">
                                    <span class="fw-bolder text-gray-600">' . get_core($data->citizenship_cd) . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('gender_cd', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->id_number . '">
                                    <span class="fw-bolder text-gray-600">' . get_core($data->gender_cd) . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('created_at', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->created_at . '">
                                    <span class="fw-bolder text-gray-600">' . Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('F Y D H:i') . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('updated_at', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->updated_at . '">
                                    <span class="fw-bolder text-gray-600">' . Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('F Y D H:i') . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('status', function ($data) {
                    $status = "";
                    switch ($data->status) {
                        case 0:
                            $status = '<!--begin::Status=-->
                                <div class=""><div class="" data-order="Inactive">';
                            if (auth()->guard("admin")->user()->can('form one_edit'))
                                $status = $status . '<div class="  form-check form-check-custom form-check-solid form-switch">
                                        <input id="message_status" class="form-check-input" data-id="' . $data->individual_id . '" 
                                        data-status="' . $data->status . '" type="checkbox" value="' . $data->status . '">
                                        <!--end::Add customer-->
                                        </div>';
                            break;
                        case 1:
                            $status = '<!--begin::Status=-->
                                <div class="text-center"><div class="" data-order="Published">';
                            if (auth()->guard("admin")->user()->can('form one_edit'))
                                $status = $status . '<span class=" form-check form-check-custom form-check-solid form-switch">
                                        <input id="message_status" checked="checked" class="form-check-input" data-id="' . $data->individual_id . '" 
                                        data-status="' . $data->status . '" type="checkbox" value="' . $data->status . '">
                                        <!--end::Add customer-->
                                        </span>';
                            break;
                    }
                    $status = $status . '</div></div>';
                    return $status;
                })
                ->addColumn('action', function ($data) {
                    $action = '<div class="text-center">
                            <div class="btn-group dropstart text-center">
                                  <button type="button" class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="svg-icon svg-icon-5 m-0">
										<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                      height="24" viewBox="0 0 24 24" fill="none">
									<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                      fill="black"/>
									</svg>
									</span>' . trans("str.Actions") . '
                                  </button>
                                  <div class="dropdown-menu">';
                    if (auth()->guard("admin")->user()->can('form one_view'))
                        $action = $action . '<div class="menu-item px-3">
                                            <a href="' . url("admin/form_one/show/" . $data->individual_id) . '"
                                               class="menu-link px-3">' . trans("str.View") . '</a>
                                        </div>';
                    if (auth()->guard("admin")->user()->can('form one_edit'))
                        $action = $action . '<div class="menu-item px-3">
                                            <a href="' . url("admin/form_one/edit/" . $data->individual_id) . '"
                                               class="menu-link px-3">' . trans("str.Edit") . '</a>
                                        </div>';
                    $action = $action . '</div></div></div>';
                    return $action;
                })
                ->rawColumns(['id'], ['full_name'], ['id_number'], ['date_of_birth'], ['place_of_birth'], ['disability_type_cd'], ['citizenship_cd'], ['gender_cd'], ['created_at'], ['updated_at'], ['status'], ['action'])
                ->escapeColumns(['id' => 'id'], ['full_name' => 'full_name'], ['id_number' => 'id_number'], ['date_of_birth' => 'date_of_birth']
                    , ['place_of_birth' => 'place_of_birth'], ['disability_type_cd' => 'disability_type_cd'], ['citizenship_cd' => 'citizenship_cd'], ['gender_cd' => 'gender_cd']
                    , ['created_at' => 'created_at'], ['updated_at' => 'updated_at'], ['status' => 'status'], ['action' => 'action'])
                ->make(true);
        }
        return view("admin.forms.form_one.list");
    }
    public function getItems(Request $request){
        $filter_by_governorate = $request->get('filter_by_governorate');
        $objects = Individuals::query()->orderBy("created_at", "desc");

        if(isset($filter_by_governorate))
            $objects = $objects->where('governorate_cd', $filter_by_governorate);

        return DataTables::of($objects)
            ->addColumn('id_number', function ($data) {
                return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->id_number . '">
                                    <span class="fw-bolder text-gray-600">' . $data->id_number . '</span>
                                </div></div>
                                <!--end::Price=-->';
            })
            ->rawColumns(['id_number'])
            ->escapeColumns(['id_number' => 'id_number'])
            ->make(true);
    }
    public function create()
    {
        return view("admin.forms.form_one.create");
    }

    public function store(Request $request)
    {
        //dd( json_encode($request->kt_docs_repeater_advanced[0]["form_two_disability_type_cd"]));
        //dd($request);
        //Validate Individuals Data and insert
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'id_number' => 'required',
            'date_of_birth' => 'required',
            'form_one_disability_type_cd' => 'required',
            'form_one_citzienship_cd' => 'required',
            'gender_cd' => 'required',
            'age' => 'required',
            'place_of_birth' => 'required',
            'governorates_cd' => 'required',
            'cities_cd' => 'required',
            'areas_cd' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'school_name' => 'required',
            'school_address' => 'required',
            'school_contact_person' => 'required',
            'school_phone' => 'required',
            'school_mobile' => 'required',
            'employment_status_cd' => 'required',
        ], [
            'full_name.required' => trans("str.This field is required"),
            'id_number.required' => trans("str.This field is required"),
            'date_of_birth.required' => trans("str.This field is required"),
            'form_one_disability_type_cd.required' => trans("str.This field is required"),
            'form_one_citzienship_cd.required' => trans("str.This field is required"),
            'gender_cd.required' => trans("str.This field is required"),
            'age.required' => trans("str.This field is required"),
            'place_of_birth.required' => trans("str.This field is required"),
            'governorates_cd.required' => trans("str.This field is required"),
            'cities_cd.required' => trans("str.This field is required"),
            'areas_cd.required' => trans("str.This field is required"),
            'address.required' => trans("str.This field is required"),
            'phone.required' => trans("str.This field is required"),
            'mobile.required' => trans("str.This field is required"),
            'school_name.required' => trans("str.This field is required"),
            'school_address.required' => trans("str.This field is required"),
            'school_contact_person.required' => trans("str.This field is required"),
            'school_phone.required' => trans("str.This field is required"),
            'school_mobile.required' => trans("str.This field is required"),
            'employment_status_cd.required' => trans("str.This field is required"),
        ]);
        //Validate Family Members
        $validatorf = Validator::make($request->all(), [
            'kt_docs_repeater_advanced.*.form_two_relationship_cd' => 'required',
            'kt_docs_repeater_advanced.*.form_two_full_name' => 'required',
            'kt_docs_repeater_advanced.*.form_two_id_number' => 'required',
            'kt_docs_repeater_advanced.*.form_two_date_of_birth' => 'required',
            'kt_docs_repeater_advanced.*.form_two_age' => 'required',
            'kt_docs_repeater_advanced.*.form_two_place_of_birth' => 'required',
            'kt_docs_repeater_advanced.*.form_two_living_status_cd' => 'required',
        ]);

        if ($validator->passes() && $validatorf->passes()) {
            $valid_id = $this->check_ID($request->id_number);
            if (!$valid_id)
                return response()->json(['error' => ["id_number" => __("str.Enter valid ID Number!")]]);
            // Store Individuals
            $individual = new Individuals();
            $individual->full_name = $request->full_name;
            $individual->id_number = $request->id_number;
            $individual->date_of_birth = $request->date_of_birth;
            $individual->place_of_birth = $request->place_of_birth;
            $individual->citizenship_cd = $request->form_one_citzienship_cd;
            $individual->gender_cd = $request->gender_cd;
            $individual->disability_type_cd = $request->form_one_disability_type_cd;
            $individual->age = $request->age;
            $individual->notes = $request->notes;
            $individual->governorate_cd = $request->governorates_cd;
            $individual->city_cd = $request->cities_cd;
            $individual->area_cd = $request->areas_cd;
            $individual->address = $request->address;
            $individual->phone = $request->phone;
            $individual->mobile = $request->mobile;
            $individual->school_name = $request->school_name;
            $individual->school_address = $request->school_address;
            $individual->school_contact_person = $request->school_contact_person;
            $individual->school_phone = $request->school_phone;
            $individual->school_mobile = $request->school_mobile;
            $individual->employment_status_cd = $request->employment_status_cd;
            $individual->employer_name = $request->employer_name;
            $individual->employer_phone = $request->employer_phone;
            $individual->employer_mobile = $request->employer_mobile;
            $individual->status = 1;
            $individual->created_at = Carbon::now();
            $individual->created_by = auth("admin")->user()->id;
            $individual->updated_at = Carbon::now();
            $individual->save();
            if ($individual) {
                $individual_id = $individual->individual_id;
                foreach ($request->kt_docs_repeater_advanced as $member) {
                    $family_members = new FamilyMembers();
                    $family_members->individual_id_fk = $individual_id;
                    $family_members->relationship_cd = $member["form_two_relationship_cd"];
                    $family_members->full_name = $member["form_two_full_name"];
                    $family_members->id_number = $member["form_two_id_number"];
                    $family_members->date_of_birth = $member["form_two_date_of_birth"];
                    $family_members->age = $member["form_two_age"];
                    $family_members->place_of_birth = $member["form_two_place_of_birth"];
                    $family_members->citizenship_cd = $member["form_two_citzienship_cd"];
                    $family_members->gender_cd = $member["form_two_gender_cd"];
                    /*foreach ($member->disability_type_cd as $type){

                    }*/
                    $family_members->disability_type_cd = json_encode($member["form_two_disability_type_cd"]);
                    $family_members->living_status_cd = $member["form_two_living_status_cd"];
                    $family_members->status = 1;
                    $family_members->created_at = Carbon::now();
                    $family_members->created_by = auth("admin")->user()->id;
                    $family_members->updated_at = Carbon::now();
                    $family_members->save();
                }
                return response()->json(['success' => 'success']);
            }
            return response()->json(['error' => ["error_failed" => __("str.Some things error!, try again")]]);
        }
        $errors = $validator->errors()->toArray();
        if (!$validatorf->passes()) {
            $errors = $errors + array("family_members" => __("str.All family data fields are required, check the entered data!"));
        }
        $valid_id = $this->check_ID($request->id_number);
        if (!$valid_id)
            $errors = $errors + array("id_number" => __("str.Enter valid ID Number!"));
        return response()->json(['error' => $errors]);
    }

    public function check_ID($ssn)
    {
        if(is_numeric($ssn)){
            $id = "1".$ssn;
            if(strlen($id) == 10){
                $b = 0;
                for($i=1 ; $i<=8 ; $i++){
                    $a = (int)substr($id, $i, 1);
                    if($i%2 == 0)
                        $a = $a * 2;
                    if($a > 9)
                        $a = $a - 9;
                    $b = $b + $a;
                }
                $b = $b%10;
                $b = (10 - $b) % 10;
                if($b != (int)(substr($id, 9, 1)))
                    return 0;
                else
                    return 1;
            }
            else
                return 0;
        }
        return 0;
    }

    public function show($id)
    {
        $form = Individuals::query()->find($id);
        return view("admin.forms.form_one.view", compact('form'));
    }

    public function edit($id)
    {
        $form = Individuals::query()->find($id);
        return view("admin.forms.form_one.edit", compact('form'));
    }

    public function status($id)
    {
        $data = Individuals::query()->find($id);
        $data->status = !$data->status;
        $data->save();
        if ($data)
            return response()->json(['success' => 'success']);
        return response()->json(['error' => 'error']);
    }

    public function update(Request $request, $id)
    {
       // dd($request);
        $individual = Individuals::query()->find($id);
        //Validate Individuals Data and insert
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'id_number' => 'required',
            'date_of_birth' => 'required',
            'form_one_disability_type_cd' => 'required',
            'form_one_citzienship_cd' => 'required',
            'gender_cd' => 'required',
            'age' => 'required',
            'place_of_birth' => 'required',
            'governorates_cd' => 'required',
            'cities_cd' => 'required',
            'areas_cd' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'school_name' => 'required',
            'school_address' => 'required',
            'school_contact_person' => 'required',
            'school_phone' => 'required',
            'school_mobile' => 'required',
            'employment_status_cd' => 'required',
        ], [
            'full_name.required' => trans("str.This field is required"),
            'id_number.required' => trans("str.This field is required"),
            'date_of_birth.required' => trans("str.This field is required"),
            'form_one_disability_type_cd.required' => trans("str.This field is required"),
            'form_one_citzienship_cd.required' => trans("str.This field is required"),
            'gender_cd.required' => trans("str.This field is required"),
            'age.required' => trans("str.This field is required"),
            'place_of_birth.required' => trans("str.This field is required"),
            'governorates_cd.required' => trans("str.This field is required"),
            'cities_cd.required' => trans("str.This field is required"),
            'areas_cd.required' => trans("str.This field is required"),
            'address.required' => trans("str.This field is required"),
            'phone.required' => trans("str.This field is required"),
            'mobile.required' => trans("str.This field is required"),
            'school_name.required' => trans("str.This field is required"),
            'school_address.required' => trans("str.This field is required"),
            'school_contact_person.required' => trans("str.This field is required"),
            'school_phone.required' => trans("str.This field is required"),
            'school_mobile.required' => trans("str.This field is required"),
            'employment_status_cd.required' => trans("str.This field is required"),
        ]);
        //Validate Family Members
        $validatorf = Validator::make($request->all(), [
            'kt_docs_repeater_advanced.*.form_two_relationship_cd' => 'required',
            'kt_docs_repeater_advanced.*.form_two_full_name' => 'required',
            'kt_docs_repeater_advanced.*.form_two_id_number' => 'required',
            'kt_docs_repeater_advanced.*.form_two_date_of_birth' => 'required',
            'kt_docs_repeater_advanced.*.form_two_age' => 'required',
            'kt_docs_repeater_advanced.*.form_two_place_of_birth' => 'required',
            'kt_docs_repeater_advanced.*.form_two_living_status_cd' => 'required',
        ]);
        if ($validator->passes() && $validatorf->passes()) {
            $valid_id = $this->check_ID($request->id_number);
            if (!$valid_id)
                return response()->json(['error' => ["id_number" => __("str.Enter valid ID Number!")]]);
            // Store Individuals
            $individual->full_name = $request->full_name;
            $individual->id_number = $request->id_number;
            $individual->date_of_birth = $request->date_of_birth;
            $individual->place_of_birth = $request->place_of_birth;
            $individual->citizenship_cd = $request->form_one_citzienship_cd;
            $individual->gender_cd = $request->gender_cd;
            $individual->disability_type_cd = $request->form_one_disability_type_cd;
            $individual->age = $request->age;
            $individual->notes = $request->notes;
            $individual->governorate_cd = $request->governorates_cd;
            $individual->city_cd = $request->cities_cd;
            $individual->area_cd = $request->areas_cd;
            $individual->address = $request->address;
            $individual->phone = $request->phone;
            $individual->mobile = $request->mobile;
            $individual->school_name = $request->school_name;
            $individual->school_address = $request->school_address;
            $individual->school_contact_person = $request->school_contact_person;
            $individual->school_phone = $request->school_phone;
            $individual->school_mobile = $request->school_mobile;
            $individual->employment_status_cd = $request->employment_status_cd;
            $individual->employer_name = $request->employer_name;
            $individual->employer_phone = $request->employer_phone;
            $individual->employer_mobile = $request->employer_mobile;
            $individual->status = 1;
            $individual->updated_at = Carbon::now();
            $individual->save();
            $old_family_members = FamilyMembers::query()->where("individual_id_fk", $id)->delete();
            $individual_id = $individual->individual_id;
            foreach ($request->kt_docs_repeater_advanced as $member) {
                $family_members = new FamilyMembers();
                $family_members->individual_id_fk = $individual_id;
                $family_members->relationship_cd = $member["form_two_relationship_cd"];
                $family_members->full_name = $member["form_two_full_name"];
                $family_members->id_number = $member["form_two_id_number"];
                $family_members->date_of_birth = $member["form_two_date_of_birth"];
                $family_members->age = $member["form_two_age"];
                $family_members->place_of_birth = $member["form_two_place_of_birth"];
                $family_members->citizenship_cd = $member["form_two_citzienship_cd"];
                $family_members->gender_cd = $member["form_two_gender_cd"];
                $family_members->disability_type_cd = json_encode($member["form_two_disability_type_cd"]);
                $family_members->living_status_cd = $member["form_two_living_status_cd"];
                $family_members->status = 1;
                $family_members->updated_at = Carbon::now();
                $family_members->save();
            }
            return response()->json(['success' => 'success']);
        }
        $errors = $validator->errors()->toArray();
        if (!$validatorf->passes()) {
            $errors = $errors + array("family_members" => __("str.All family data fields are required, check the entered data!"));
        }
        $valid_id = $this->check_ID($request->id_number);
        if (!$valid_id)
            $errors = $errors + array("id_number" => __("str.Enter valid ID Number!"));
        return response()->json(['error' => $errors]);
    }

    public function destroy($id)
    {
        //
    }

    public function filter(Request $request, $id)
    {
        $data = Individuals::query()->where("governorate_cd", $id)->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('id', function ($data) {

                    if (auth()->guard("admin")->user()->can('form one_view'))
                        return '<!--begin::Location name=-->
                                    <div class="d-flex">
                                        <div class="">
                                            <!--begin::Title-->
                                           <a class="text-gray-600 text-hover-primary fs-5 fw-bolder mb-1" 
                                           href="' . url("admin/form_one/show/" . $data->individual_id) . '">' . $data->individual_id . '
                                           </a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                <!--end::Location=-->';
                    else
                        return '<!--begin::Location name=-->
                                    <div class="d-flex">
                                        <div class="">
                                            <!--begin::Title-->
                                           <a href="" class="text-gray-600 text-hover-primary fs-5 fw-bolder mb-1" data-id="' . $data->individual_id . '" 
                                                data-status="' . $data->status . '" data-kt-ecommerce-category-filter="category_name">' . $data->individual_id . '
                                           </a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                <!--end::Location=-->';
                })
                ->addColumn('full_name', function ($data) {
                    $path_edit = "#";
                    if (auth()->guard("admin")->user()->can('form one_view'))
                        $path_edit = url("admin/form_one/show/" . $data->individual_id);
                    return '<a href="' . $path_edit . '" class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $data->full_name . '</a>';
                })
                ->addColumn('id_number', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->id_number . '">
                                    <span class="fw-bolder text-gray-600">' . $data->id_number . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('date_of_birth', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->id_number . '">
                                    <span class="fw-bolder text-gray-600">' . $data->date_of_birth . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('governorate_cd', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->id_number . '">
                                    <span class="fw-bolder text-gray-600">' . get_core($data->governorate_cd) . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('citizenship_cd', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->id_number . '">
                                    <span class="fw-bolder text-gray-600">' . get_core($data->citizenship_cd) . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('gender_cd', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->id_number . '">
                                    <span class="fw-bolder text-gray-600">' . get_core($data->gender_cd) . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('created_at', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->created_at . '">
                                    <span class="fw-bolder text-gray-600">' . Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('F Y D H:i') . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('updated_at', function ($data) {
                    return '<!--begin::Price=-->
                               <div class="text-center"> <div class=" pe-0" data-order="' . $data->updated_at . '">
                                    <span class="fw-bolder text-gray-600">' . Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('F Y D H:i') . '</span>
                                </div></div>
                                <!--end::Price=-->';
                })
                ->addColumn('status', function ($data) {
                    $status = "";
                    switch ($data->status) {
                        case 0:
                            $status = '<!--begin::Status=-->
                                <div class=""><div class="" data-order="Inactive">';
                            if (auth()->guard("admin")->user()->can('form one_edit'))
                                $status = $status . '<div class="  form-check form-check-custom form-check-solid form-switch">
                                        <input id="message_status" class="form-check-input" data-id="' . $data->individual_id . '" 
                                        data-status="' . $data->status . '" type="checkbox" value="' . $data->status . '">
                                        <!--end::Add customer-->
                                        </div>';
                            break;
                        case 1:
                            $status = '<!--begin::Status=-->
                                <div class="text-center"><div class="" data-order="Published">';
                            if (auth()->guard("admin")->user()->can('form one_edit'))
                                $status = $status . '<span class=" form-check form-check-custom form-check-solid form-switch">
                                        <input id="message_status" checked="checked" class="form-check-input" data-id="' . $data->individual_id . '" 
                                        data-status="' . $data->status . '" type="checkbox" value="' . $data->status . '">
                                        <!--end::Add customer-->
                                        </span>';
                            break;
                    }
                    $status = $status . '</div></div>';
                    return $status;
                })
                ->addColumn('action', function ($data) {
                    $action = '<div class="text-center">
                            <div class="btn-group dropstart text-center">
                                  <button type="button" class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="svg-icon svg-icon-5 m-0">
										<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                      height="24" viewBox="0 0 24 24" fill="none">
									<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                      fill="black"/>
									</svg>
									</span>' . trans("str.Actions") . '
                                  </button>
                                  <div class="dropdown-menu">';
                    if (auth()->guard("admin")->user()->can('form one_view'))
                        $action = $action . '<div class="menu-item px-3">
                                            <a href="' . url("admin/form_one/show/" . $data->individual_id) . '"
                                               class="menu-link px-3">' . trans("str.View") . '</a>
                                        </div>';
                    if (auth()->guard("admin")->user()->can('form one_edit'))
                        $action = $action . '<div class="menu-item px-3">
                                            <a href="' . url("admin/form_one/edit/" . $data->individual_id) . '"
                                               class="menu-link px-3">' . trans("str.Edit") . '</a>
                                        </div>';
                    $action = $action . '</div></div></div>';
                    return $action;
                })
                ->rawColumns(['id'], ['full_name'], ['id_number'], ['date_of_birth'], ['place_of_birth'], ['disability_type_cd'], ['citizenship_cd'], ['gender_cd'], ['created_at'], ['updated_at'], ['status'], ['action'])
                ->escapeColumns(['id' => 'id'], ['full_name' => 'full_name'], ['id_number' => 'id_number'], ['date_of_birth' => 'date_of_birth']
                    , ['place_of_birth' => 'place_of_birth'], ['disability_type_cd' => 'disability_type_cd'], ['citizenship_cd' => 'citizenship_cd'], ['gender_cd' => 'gender_cd']
                    , ['created_at' => 'created_at'], ['updated_at' => 'updated_at'], ['status' => 'status'], ['action' => 'action'])
                ->make(true);
        }
        return view("admin.forms.form_one.list");
    }
}
