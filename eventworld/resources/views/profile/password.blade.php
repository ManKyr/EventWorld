@extends('layouts.app')
@section('title')
    ΕventWorld | User Edit Profile
@endsection
@section('content')  
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container"style="padding-top:190px;padding-bottom:190px;">
<div class="row flex-lg-nowrap">
    <form class="w-100" method="POST" action="/profile/password" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Current Password</label>
                              <input class="form-control" name ="oldpassword" type="password" placeholder="••••••">
                              @error('oldpassword')
                                <div class="text-danger">{{  $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" name ="newpassword1" type="password" placeholder="••••••">
                              @error('newpassword1')
                                <div class="text-danger">{{  $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" name ="newpassword2" type="password" placeholder="••••••"></div>
                              @error('newpassword2')
                                <div class="text-danger">{{  $message }}</div>
                              @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-success" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>

              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </form>
  </div>
</div>
</div>
@endsection