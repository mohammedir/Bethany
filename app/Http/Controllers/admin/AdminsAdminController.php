<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\FamilyMembers;
use App\Models\Individuals;
use App\Models\Places;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\DataTables;

class AdminsAdminController extends Controller
{
    public function index(Request $request)
    {
        $data = Admin::query()->latest()->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('id', function ($data) {

                    if (auth()->guard("admin")->user()->can('form one_view'))
                        return '<!--begin::Location name=-->
                                    <div class="d-flex">
                                        <div class="">
                                            <!--begin::Title-->
                                           <a class="text-gray-600 text-hover-primary fs-5 fw-bolder mb-1"
                                           href="' . url("admin/form_one/show/" . $data->id) . '">' . $data->id . '
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
                                           <a href="" class="text-gray-600 text-hover-primary fs-5 fw-bolder mb-1" data-id="' . $data->id . '"
                                                data-status="' . $data->status . '" data-kt-ecommerce-category-filter="category_name">' . $data->id . '
                                           </a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                <!--end::Location=-->';
                })
                ->addColumn('full_name', function ($data) {
                    return  $data->full_name ;
                })
                ->addColumn('mobile', function ($data) {
                    return  $data->mobile ;
                })
                ->addColumn('email', function ($data) {
                    return  $data->email ;
                })
                ->addColumn('address', function ($data) {
                    return  $data->address ;
                })
                ->addColumn('user_name', function ($data) {
                    return  $data->user_name ;
                })
                ->addColumn('status', function ($data) {
                    return  $data->status ;
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
                                            <a href="' . url("admin/form_one/show/" . $data->id) . '"
                                               class="menu-link px-3">' . trans("str.View") . '</a>
                                        </div>';
                    if (auth()->guard("admin")->user()->can('form one_edit'))
                        $action = $action . '<div class="menu-item px-3">
                                            <a href="' . url("admin/form_one/edit/" . $data->id) . '"
                                               class="menu-link px-3">' . trans("str.Edit") . '</a>
                                        </div>';
                    $action = $action . '</div></div></div>';
                    return $action;
                })
                ->rawColumns(['id'], ['full_name'], ['action' => 'action'])
                ->make(true);
        }
        return view("admin.forms.admins.list");
    }

}
