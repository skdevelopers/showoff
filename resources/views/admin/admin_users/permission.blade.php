@extends('admin.template.layout')
@section('content')
@php
$privileges = \App\Models\UserPrivileges::join('users', 'users.id', 'user_privileges.user_id')
->join('admin_designation', 'admin_designation.id', '=', 'users.designation_id')->where(['users.id' => $id, 'user_privileges.designation_id' => \App\Models\User::where('id', $id)->pluck('designation_id')->first()])->pluck('privileges')->first();
$privileges = json_decode($privileges, true);
@endphp
<div class="card">
   <div class="card-body">
      <div class="col-xs-12 col-sm-12">
         <form method="post" id="admin-form" action="{{ url('admin/save_privilege') }}" enctype="multipart/form-data"
            data-parsley-validate="true">
            <input type="hidden" name="id" value="{{ $id }}">
            @csrf()
            <div class="form-group">
               <fieldset>
                  <legend>Access Rights</legend>
                  <div class="form-group row mt-0 mb-3" style="display:none;">
                     <label class="col-sm-2 col-form-label">Admin Users</label>
                     <div class="col-sm-10">
                        <div class="row">
                           <div class="col-8" role="access-group-row">
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input adminusers" name="access_groups[adminusers][View]" @if( isset($privileges['adminusers']['View']) && $privileges['adminusers']['View'] == 1 )
                                 checked
                                 @endif value="1"> View                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input adminusers" name="access_groups[adminusers][Create]" @if( isset($privileges['adminusers']['Create']) && $privileges['adminusers']['Create'] == 1 )
                                 checked
                                 @endif value="1"> Create                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input adminusers" name="access_groups[adminusers][Edit]" @if( isset($privileges['adminusers']['Edit']) && $privileges['adminusers']['Edit'] == 1 )
                                 checked
                                 @endif value="1"> Edit                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input adminusers" name="access_groups[adminusers][ChangePassword]" @if( isset($privileges['adminusers']['ChangePassword']) && $privileges['adminusers']['ChangePassword'] == 1 )
                                checked
                                @endif value="1"> Change Password                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input adminusers" name="access_groups[adminusers][UpdatePermission]" @if( isset($privileges['adminusers']['UpdatePermission']) && $privileges['adminusers']['UpdatePermission'] == 1 )
                                checked
                                @endif value="1"> Update Permission                                                        <i class="input-helper"></i></label>
                             </div>
                              <div class="form-check form-check-inline mr-5">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input adminusers" name="access_groups[adminusers][Delete]" @if( isset($privileges['adminusers']['Delete']) && $privileges['adminusers']['Delete'] == 1 )
                                 checked
                                 @endif value="1"> Delete                                                        <i class="input-helper"></i></label>
                              </div>
                           </div>
                           <div class="col-4 pt-1">
                              <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="adminusers">Set All</button>
                              <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="adminusers">Reset</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row mt-0 mb-0" style="display:none;">
                     <label class="col-sm-2 col-form-label">Admin User Designation</label>
                     <div class="col-sm-10">
                        <div class="row">
                           <div class="col-8" role="access-group-row">
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input admin_user_desig" name="access_groups[admin_user_desig][View]" @if( isset($privileges['admin_user_desig']['View']) && $privileges['admin_user_desig']['View'] == 1 )
                                 checked
                                 @endif value="1" > View                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input admin_user_desig" name="access_groups[admin_user_desig][Create]" @if( isset($privileges['admin_user_desig']['Create']) && $privileges['admin_user_desig']['Create'] == 1 )
                                 checked
                                 @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input admin_user_desig" name="access_groups[admin_user_desig][Edit]" @if( isset($privileges['admin_user_desig']['Edit']) && $privileges['admin_user_desig']['Edit'] == 1 )
                                 checked
                                 @endif value="1" > Edit                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input admin_user_desig" name="access_groups[admin_user_desig][Delete]" @if( isset($privileges['admin_user_desig']['Delete']) && $privileges['admin_user_desig']['Delete'] == 1 )
                                 checked
                                 @endif value="1" > Delete                                                        <i class="input-helper"></i></label>
                              </div>
                           </div>
                           <div class="col-4 pt-1">
                              <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="admin_user_desig">Set All</button>
                              <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="admin_user_desig">Reset</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row mt-0 mb-0">
                     <label class="col-sm-2 col-form-label">Customers</label>
                     <div class="col-sm-10">
                        <div class="row">
                           <div class="col-8" role="access-group-row">
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input customers" name="access_groups[customers][View]" @if( isset($privileges['customers']['View']) && $privileges['customers']['View'] == 1 )
                                 checked
                                 @endif value="1" > View                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input customers" name="access_groups[customers][Create]" @if( isset($privileges['customers']['Create']) && $privileges['customers']['Create'] == 1 )
                                 checked
                                 @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input customers" name="access_groups[customers][Edit]" @if( isset($privileges['customers']['Edit']) && $privileges['customers']['Edit'] == 1 )
                                 checked
                                 @endif value="1" > Edit                                                        <i class="input-helper"></i></label>
                              </div>

                              <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input customers" name="access_groups[customers][ChangePassword]" @if( isset($privileges['customers']['ChangePassword']) && $privileges['customers']['ChangePassword'] == 1 )
                                checked
                                @endif value="1" > Change Password                                                        <i class="input-helper"></i></label>
                             </div>


                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input customers" name="access_groups[customers][Delete]" @if( isset($privileges['customers']['Delete']) && $privileges['customers']['Delete'] == 1 )
                                 checked
                                 @endif value="1" > Delete                                                        <i class="input-helper"></i></label>
                              </div>
                           </div>
                           <div class="col-4 pt-1">
                              <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="customers">Set All</button>
                              <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="customers">Reset</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row mt-0 mb-3">
                     <label class="col-sm-2 col-form-label">Outlet</label>
                     <div class="col-sm-10">
                        <div class="row">
                           <div class="col-8" role="access-group-row">
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input vendor" name="access_groups[vendor][View]" @if( isset($privileges['vendor']['View']) && $privileges['vendor']['View'] == 1 )
                                 checked
                                 @endif value="1" > View                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input vendor" name="access_groups[vendor][Create]" @if( isset($privileges['vendor']['Create']) && $privileges['vendor']['Create'] == 1 )
                                 checked
                                 @endif value="1"> Create                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input vendor" name="access_groups[vendor][Edit]" @if( isset($privileges['vendor']['Edit']) && $privileges['vendor']['Edit'] == 1 )
                                 checked
                                 @endif value="1"> Edit                                                        <i class="input-helper"></i></label>
                              </div>



                              <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input vendor" name="access_groups[vendor][ChangePassword]" @if( isset($privileges['vendor']['ChangePassword']) && $privileges['vendor']['ChangePassword'] == 1 )
                                checked
                                @endif value="1"> Change Password                                                        <i class="input-helper"></i></label>
                             </div>
                           



                              <div class="form-check form-check-inline mr-5">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input vendor" name="access_groups[vendor][Delete]" @if( isset($privileges['vendor']['Delete']) && $privileges['vendor']['Delete'] == 1 )
                                 checked
                                 @endif value="1"> Delete                                                        <i class="input-helper"></i></label>
                              </div>
                           </div>
                           <div class="col-4 pt-1">
                              <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="vendor" >Set All</button>
                              <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="vendor">Reset</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  
                  <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">Coupons</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input coupon" name="access_groups[coupon][View]" @if( isset($privileges['coupon']['View']) && $privileges['coupon']['View'] == 1 )
                                checked
                                @endif value="1" > View                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input coupon" name="access_groups[coupon][Create]" @if( isset($privileges['coupon']['Create']) && $privileges['coupon']['Create'] == 1 )
                                checked
                                @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input coupon" name="access_groups[coupon][Edit]" @if( isset($privileges['coupon']['Edit']) && $privileges['coupon']['Edit'] == 1 )
                                checked
                                @endif value="1" > Edit                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input coupon" name="access_groups[coupon][Delete]" @if( isset($privileges['coupon']['Delete']) && $privileges['coupon']['Delete'] == 1 )
                                checked
                                @endif value="1" > Delete                                                        <i class="input-helper"></i></label>
                             </div>
                          </div>
                          <div class="col-4 pt-1">
                             <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="coupon">Set All</button>
                             <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="coupon">Reset</button>
                          </div>
                       </div>
                    </div>
                 </div>
                  
                  <div class="form-group row mt-0 mb-0">
                     <label class="col-sm-2 col-form-label">Category</label>
                     <div class="col-sm-10">
                        <div class="row">
                           <div class="col-8" role="access-group-row">
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input category" name="access_groups[category][View]" @if( isset($privileges['category']['View']) && $privileges['category']['View'] == 1 )
                                 checked
                                 @endif value="1" > View                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input category" name="access_groups[category][Create]" @if( isset($privileges['category']['Create']) && $privileges['category']['Create'] == 1 )
                                 checked
                                 @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input category" name="access_groups[category][Edit]" @if( isset($privileges['category']['Edit']) && $privileges['category']['Edit'] == 1 )
                                 checked
                                 @endif value="1"  > Edit                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input category" name="access_groups[category][Delete]" @if( isset($privileges['category']['Delete']) && $privileges['category']['Delete'] == 1 )
                                 checked
                                 @endif value="1"  > Delete                                                        <i class="input-helper"></i></label>
                              </div>
                           </div>
                           <div class="col-4 pt-1">
                              <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="category">Set All</button>
                              <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="category">Reset</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                 <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">Country</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input country" name="access_groups[country][View]" @if( isset($privileges['country']['View']) && $privileges['country']['View'] == 1 )
                                checked
                                @endif value="1" > View                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input country" name="access_groups[country][Create]" @if( isset($privileges['country']['Create']) && $privileges['country']['Create'] == 1 )
                                checked
                                @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input country" name="access_groups[country][Edit]" @if( isset($privileges['country']['Edit']) && $privileges['country']['Edit'] == 1 )
                                checked
                                @endif value="1"  > Edit                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input country" name="access_groups[country][Delete]" @if( isset($privileges['country']['Delete']) && $privileges['country']['Delete'] == 1 )
                                checked
                                @endif value="1"  > Delete                                                        <i class="input-helper"></i></label>
                             </div>
                          </div>
                          <div class="col-4 pt-1">
                             <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="country">Set All</button>
                             <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="country">Reset</button>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">States</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input states" name="access_groups[states][View]" @if( isset($privileges['states']['View']) && $privileges['states']['View'] == 1 )
                                checked
                                @endif value="1" > View                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input states" name="access_groups[states][Create]" @if( isset($privileges['states']['Create']) && $privileges['states']['Create'] == 1 )
                                checked
                                @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input states" name="access_groups[states][Edit]" @if( isset($privileges['states']['Edit']) && $privileges['states']['Edit'] == 1 )
                                checked
                                @endif value="1"  > Edit                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input states" name="access_groups[states][Delete]" @if( isset($privileges['states']['Delete']) && $privileges['states']['Delete'] == 1 )
                                checked
                                @endif value="1"  > Delete                                                        <i class="input-helper"></i></label>
                             </div>
                          </div>
                          <div class="col-4 pt-1">
                             <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="states">Set All</button>
                             <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="states">Reset</button>
                          </div>
                       </div>
                    </div>
                 </div>

                 <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">Cities</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input cities" name="access_groups[cities][View]" @if( isset($privileges['cities']['View']) && $privileges['cities']['View'] == 1 )
                                checked
                                @endif value="1" > View                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input cities" name="access_groups[cities][Create]" @if( isset($privileges['cities']['Create']) && $privileges['cities']['Create'] == 1 )
                                checked
                                @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input cities" name="access_groups[cities][Edit]" @if( isset($privileges['cities']['Edit']) && $privileges['cities']['Edit'] == 1 )
                                checked
                                @endif value="1"  > Edit                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input cities" name="access_groups[cities][Delete]" @if( isset($privileges['cities']['Delete']) && $privileges['cities']['Delete'] == 1 )
                                checked
                                @endif value="1"  > Delete                                                        <i class="input-helper"></i></label>
                             </div>
                          </div>
                          <div class="col-4 pt-1">
                             <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="cities">Set All</button>
                             <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="cities">Reset</button>
                          </div>
                       </div>
                    </div>
                 </div>
                 
                 
                  <div class="form-group row mt-0 mb-0">
                     <label class="col-sm-2 col-form-label">Banners</label>
                     <div class="col-sm-10">
                        <div class="row">
                           <div class="col-8" role="access-group-row">
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input banners" name="access_groups[banners][View]" @if( isset($privileges['banners']['View']) && $privileges['banners']['View'] == 1 )
                                 checked
                                 @endif value="1" > View                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input banners" name="access_groups[banners][Create]" @if( isset($privileges['banners']['Create']) && $privileges['banners']['Create'] == 1 )
                                 checked
                                 @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input banners" name="access_groups[banners][Edit]" @if( isset($privileges['banners']['Edit']) && $privileges['banners']['Edit'] == 1 )
                                 checked
                                 @endif value="1" > Edit                                                        <i class="input-helper"></i></label>
                              </div>
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input banners" name="access_groups[banners][Delete]" @if( isset($privileges['banners']['Delete']) && $privileges['banners']['Delete'] == 1 )
                                 checked
                                 @endif value="1" > Delete                                                        <i class="input-helper"></i></label>
                              </div>
                           </div>
                           <div class="col-4 pt-1">
                              <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="banners">Set All</button>
                              <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="banners">Reset</button>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">CMS Pages</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input cms" name="access_groups[cms][View]" @if( isset($privileges['cms']['View']) && $privileges['cms']['View'] == 1 )
                                checked
                                @endif value="1" > View                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input cms" name="access_groups[cms][Create]" @if( isset($privileges['cms']['Create']) && $privileges['cms']['Create'] == 1 )
                                checked
                                @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input cms" name="access_groups[cms][Edit]" @if( isset($privileges['cms']['Edit']) && $privileges['cms']['Edit'] == 1 )
                                checked
                                @endif value="1"  > Edit                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input cms" name="access_groups[cms][Delete]" @if( isset($privileges['cms']['Delete']) && $privileges['cms']['Delete'] == 1 )
                                checked
                                @endif value="1"  > Delete                                                        <i class="input-helper"></i></label>
                             </div>
                          </div>
                          <div class="col-4 pt-1">
                             <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="cms">Set All</button>
                             <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="cms">Reset</button>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">FAQ</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input faq" name="access_groups[faq][View]" @if( isset($privileges['faq']['View']) && $privileges['faq']['View'] == 1 )
                                checked
                                @endif value="1" > View                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input faq" name="access_groups[faq][Create]" @if( isset($privileges['faq']['Create']) && $privileges['faq']['Create'] == 1 )
                                checked
                                @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input faq" name="access_groups[faq][Edit]" @if( isset($privileges['faq']['Edit']) && $privileges['faq']['Edit'] == 1 )
                                checked
                                @endif value="1"  > Edit                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input faq" name="access_groups[faq][Delete]" @if( isset($privileges['faq']['Delete']) && $privileges['faq']['Delete'] == 1 )
                                checked
                                @endif value="1"  > Delete                                                        <i class="input-helper"></i></label>
                             </div>
                          </div>
                          <div class="col-4 pt-1">
                             <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="faq">Set All</button>
                             <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="faq">Reset</button>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">Help</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input help" name="access_groups[help][View]" @if( isset($privileges['help']['View']) && $privileges['help']['View'] == 1 )
                                checked
                                @endif value="1" > View                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input help" name="access_groups[help][Create]" @if( isset($privileges['help']['Create']) && $privileges['help']['Create'] == 1 )
                                checked
                                @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input help" name="access_groups[help][Edit]" @if( isset($privileges['help']['Edit']) && $privileges['help']['Edit'] == 1 )
                                checked
                                @endif value="1"  > Edit                                                        <i class="input-helper"></i></label>
                             </div>
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input help" name="access_groups[help][Delete]" @if( isset($privileges['help']['Delete']) && $privileges['help']['Delete'] == 1 )
                                checked
                                @endif value="1"  > Delete                                                        <i class="input-helper"></i></label>
                             </div>
                          </div>
                          <div class="col-4 pt-1">
                             <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="help">Set All</button>
                             <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="help">Reset</button>
                          </div>
                       </div>
                    </div>
                 </div>

                 <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">Contact Details</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input contact_settings" name="access_groups[contact_settings][Edit]" @if( isset($privileges['contact_settings']['Edit']) && $privileges['contact_settings']['Edit'] == 1 )
                                checked
                                @endif value="1"  > Edit                                                        <i class="input-helper"></i></label>
                             </div>
                          </div>
                          <div class="col-4 pt-1">
                             <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="contact_settings">Set All</button>
                             <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="contact_settings">Reset</button>
                          </div>
                       </div>
                    </div>
                 </div>

                 <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">Settings</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             
                             <div class="form-check form-check-inline mr-5">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input settings" name="access_groups[settings][Edit]" @if( isset($privileges['settings']['Edit']) && $privileges['settings']['Edit'] == 1 )
                                checked
                                @endif value="1"  > Edit                                                        <i class="input-helper"></i></label>
                             </div>
                          </div>
                          <div class="col-4 pt-1">
                             <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="settings">Set All</button>
                             <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="settings">Reset</button>
                          </div>
                       </div>
                    </div>
                 </div>

            {{--     <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">Customer Report</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input cust_rep" name="access_groups[cust_rep][View]" @if( isset($privileges['cust_rep']['View']) && $privileges['cust_rep']['View'] == 1 )
                                checked
                                @endif value="1" > View                                                        <i class="input-helper"></i></label>
                             </div>
                          </div>
                          <div class="col-4 pt-1">
                             <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="cust_rep">Set All</button>
                             <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="cust_rep">Reset</button>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">Outlet Report</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input vendor_rep" name="access_groups[vendor_rep][View]" @if( isset($privileges['vendor_rep']['View']) && $privileges['vendor_rep']['View'] == 1 )
                                checked
                                @endif value="1" > View                                                        <i class="input-helper"></i></label>
                             </div>
                          </div>
                          <div class="col-4 pt-1">
                             <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="vendor_rep">Set All</button>
                             <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="vendor_rep">Reset</button>
                          </div>
                       </div>
                    </div>
                 </div>--}}

                

                 <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">Notification</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input notifications" name="access_groups[notification][View]" @if( isset($privileges['notification']['View']) && $privileges['notification']['View'] == 1 )
                                checked
                                @endif value="1" > View                                                        <i class="input-helper"></i></label>
                             </div>

                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input notifications" name="access_groups[notification][Create]" @if( isset($privileges['notification']['Create']) && $privileges['notification']['Create'] == 1 )
                                checked
                                @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                             </div>
                 
                             <div class="form-check form-check-inline mr-5 ">
                               <label class="form-check-label">
                               <input type="checkbox" class="form-check-input notifications" name="access_groups[notification][Delete]" @if( isset($privileges['notification']['Delete']) && $privileges['notification']['Delete'] == 1 )
                               checked
                               @endif value="1" > Delete                                                        <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-4 pt-1">
                            <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="notifications">Set All</button>
                            <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="notifications">Reset</button>
                         </div>
                       </div>
                    </div>
                 </div>
                 <div class="form-group row mt-0 mb-0">
                    <label class="col-sm-2 col-form-label">Videos</label>
                    <div class="col-sm-10">
                       <div class="row">
                          <div class="col-8" role="access-group-row">
                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input videos" name="access_groups[videos][View]" @if( isset($privileges['videos']['View']) && $privileges['videos']['View'] == 1 )
                                checked
                                @endif value="1" > View                                                        <i class="input-helper"></i></label>
                             </div>

                             <div class="form-check form-check-inline mr-5 ">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input videos" name="access_groups[videos][Create]" @if( isset($privileges['videos']['Create']) && $privileges['videos']['Create'] == 1 )
                                checked
                                @endif value="1" > Create                                                        <i class="input-helper"></i></label>
                             </div>
                 
                             <div class="form-check form-check-inline mr-5 ">
                               <label class="form-check-label">
                               <input type="checkbox" class="form-check-input videos" name="access_groups[videos][Delete]" @if( isset($privileges['videos']['Delete']) && $privileges['videos']['Delete'] == 1 )
                               checked
                               @endif value="1" > Delete                                                        <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-4 pt-1">
                            <button type="button" class="btn btn-mini btn-outline-success" role="access-set-all" target="videos">Set All</button>
                            <button type="button" class="btn btn-mini btn-outline-warning ml-2" role="access-reset-all" target="videos">Reset</button>
                         </div>
                       </div>
                    </div>
                 </div>
                  
                  <div class="form-group row mt-0 mb-0">
                     <label class="col-sm-2 col-form-label">Reports</label>
                     <div class="col-sm-10">
                        <div class="row">
                           <div class="col-8" role="access-group-row">
                              <div class="form-check form-check-inline mr-5 ">
                                 <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input" name="access_groups[report][View]" value="1" @if( isset($privileges['report']['View']) && $privileges['report']['View'] == 1 )
                                 checked
                                 @endif data-parsley-multiple="access_groups1041" > View                                                        <i class="input-helper"></i></label>
                              </div>
                           </div>
                           <div class="col-4 pt-1">
                           </div>
                        </div>
                     </div>
                  </div> 
               </fieldset>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
      </div>
      <div class="col-xs-12 col-sm-6">
      </div>
   </div>
</div>
@stop
@section('script')
<script>
   App.initFormView();
   $('body').off('submit', '#admin-form');
   $('body').on('submit', '#admin-form', function(e) {
       e.preventDefault();
       var $form = $(this);
       var formData = new FormData(this);
       $(".invalid-feedback").remove();
   
       App.loading(true);
       $form.find('button[type="submit"]')
           .text('Saving')
           .attr('disabled', true);
   
       $.ajax({
           type: "POST",
           enctype: 'multipart/form-data',
           url: $form.attr('action'),
           data: formData,
           processData: false,
           contentType: false,
           cache: false,
           dataType: 'json',
           timeout: 600000,
           success: function(res) {
               App.loading(false);
   
               if (res['status'] == 0) {
                   if (typeof res['errors'] !== 'undefined') {
                       var error_def = $.Deferred();
                       var error_index = 0;
                       jQuery.each(res['errors'], function(e_field, e_message) {
                           if (e_message != '') {
                               $('[name="' + e_field + '"]').eq(0).addClass('is-invalid');
                               $('<div class="invalid-feedback">' + e_message + '</div>')
                                   .insertAfter($('[name="' + e_field + '"]').eq(0));
                               if (error_index == 0) {
                                   error_def.resolve();
                               }
                               error_index++;
                           }
                       });
                       error_def.done(function() {
                           var error = $form.find('.is-invalid').eq(0);
                           $('html, body').animate({
                               scrollTop: (error.offset().top - 100),
                           }, 500);
                       });
                   } else {
                       var m = res['message'];
                       App.alert(m, 'Oops!');
                   }
               } else {
                   App.alert(res['message']);
                   setTimeout(function() {
                       window.location.href = App.siteUrl('/admin/admin_users/update_permission/{{ $id }}');
                   }, 1500);
               }
   
               $form.find('button[type="submit"]')
                   .text('Save')
                   .attr('disabled', false);
           },
           error: function(e) {
               App.loading(false);
               $form.find('button[type="submit"]')
                   .text('Save')
                   .attr('disabled', false);
               App.alert(e.responseText, 'Oops!');
           }
       });
   });
   $('body').off('click', '[role="access-set-all"]');
   $('body').on('click', '[role="access-set-all"]', function(e) {
       var traget = $(this).attr('target');
       $('.'+traget).attr('checked', 'checked');
   });
   $('body').off('click', '[role="access-reset-all"]');
   $('body').on('click', '[role="access-reset-all"]', function(e) {
       var traget = $(this).attr('target');
       $('.'+traget).attr('checked', false);
   });
</script>
@stop