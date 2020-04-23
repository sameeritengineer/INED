@extends('admin.layouts.index')
@section('title','User')
@section('content')
<div class="app-content content container-fluid load">
  <div class="content-wrapper data">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Users</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

 <section id="basic-form-layouts">
   <div class="row match-height">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title" id="basic-layout-form">Update user</h4>
               <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-body collapse in">
               <div class="card-block">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                 <strong>Success!</strong> {!! \Session::get('success') !!}
                </div>
               @endif
                @if (\Session::has('error'))
                <div class="alert alert-danger">
                  <strong>Danger!</strong> {!! \Session::get('error') !!}
                </div>
               @endif
                  <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                     <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>User Info</h4>
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="projectinput2">Users Name <span class="required">*</span></label>
                                 <div class="controls">
                                    <input disabled="" type="text" id="contentinput1" required data-validation-required-message="This field is required" class="form-control" placeholder="user Name" name="name" value="{{ $user->name }}">
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-3">
                              <div class="form-group">
                                <label for="projectinput2">User Email<span class="required">*</span></label>
                                <div class="controls">
                                 <input disabled="" type="text" id="contentinput2" required data-validation-required-message="This field is required" class="form-control" placeholder="User Email" name="email" value="{{ $user->email }}">
                                </div>
                              </div>
                           </div>

                           <div class="col-md-3">
                              <div class="form-group">
                                <label for="projectinput2">Status<span class="required">*</span></label>
                                <div class="controls">
                                 <select data-validation-required-message="This field is required" class="form-control" placeholder="User Status" name="status" >
                                      <option value="0" {{$user->status==0?'selected':''}}>Pending</option>
                                      <option value="1"  {{$user->status==1?'selected':''}} >Active</option>
                                      <option value="2" {{$user->status==2?'selected':''}}>Deactive</option>
                                 </select>

                                </div>
                              </div>
                           </div>

                     </div>
                     <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o"></i> Update
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> 

</div>
</div>
@endsection