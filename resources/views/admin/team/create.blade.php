@extends('admin.layouts.index')
@section('title','Team')
@section('content')
<div class="app-content content container-fluid load">
  <div class="content-wrapper data">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('team.index') }}"> Back</a>
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
               <h4 class="card-title" id="basic-layout-form">Add New Team member</h4>
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
                  <form action="{{ route('team.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data" novalidate>
                  	@csrf
                     <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> Team member Info</h4>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="projectinput2">Name <span class="required">*</span></label>
                                 <div class="controls">
                                    <input type="text" id="contentinput1" required data-validation-required-message="This field is required" class="form-control" placeholder="Name" name="name">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                              	<label for="projectinput2">Slug <span class="required">*</span></label>
                              	<div class="controls">
                                 <input type="text" id="contentinput2" required data-validation-required-message="This field is required" class="form-control" placeholder="Slug" name="slug">
                                </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group radio-form">
                                <label class="w-100 float-left" for="projectinput5">Status</label>
                               <span>
                              <input type="radio" id="test1" name="status" value="1" checked>
                              <label for="test1"><span>Enable</span></label>
                            </span>
                               <span>
                              <input type="radio" id="test2" name="status" value="0">
                              <label for="test2"><span>Disable</span></label>
                              </span>
                              </div>
                           </div>
                         </div>
                         <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="projectinput2">Designation</label>
                                <div class="controls">
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Designation" name="designation">
                                </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="projectinput2">Education</label>
                                <div class="controls">
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Education" name="education">
                                </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="projectinput2">Location</label>
                                <div class="controls">
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Location" name="location">
                                </div>
                              </div>
                           </div>

                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="projectinput8">Description</label>
                                 <textarea id="summary-ckeditor" rows="5" class="form-control editor" name="description" placeholder=" Description"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                              	 <img id="output"/>
                                 <label>Upload Image</label>
                                 <label id="projectinput7" class="file center-block">
                                 <input type="file" id="file" onchange="loadFile(event)" name="image">
                                 <span class="file-custom"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="projectinput2">Image Alt</label>
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Image Alt" name="alt">
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="projectinput1">Sort</label>
                                 <input type="number" id="projectinput1" class="form-control" placeholder="Sort" name="sort">
                              </div>
                           </div>
                        </div>
                        <h4 class="form-section"><i class="icon-clipboard4"></i>Category Info</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput5">Category</label>
                                 <div class="controls">
                                 <select id="category_select" name="c_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                 </select>
                               </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput5">Sub-Category</label>
                                 <select id="subcategory_select" name="s_id" class="form-control">
                                    <option value="">Sub-Category</option>
                                    
                                 </select>
                              </div>
                           </div>
                        </div>
                        <h4 class="form-section"><i class="icon-clipboard4"></i>Meta Content Requirements</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput1">Meta Title</label>
                                 <input type="text" id="projectinput1" class="form-control" placeholder="Meta Title" name="meta_title">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput2">Meta Keyword</label>
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Meta Keyword" name="meta_keyword">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="projectinput8">Meta Description</label>
                                 <textarea id="summary-ckeditor1" rows="5" class="form-control editor" name="meta_description" placeholder="Meta Description"></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o"></i> Save
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
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<script>
$(document).ready(function(){
  $("#contentinput1").keyup(function(){
     var current = this.value;
     var slug = current.toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'');
        $("#contentinput2").val(slug);

     
});
  $('#category_select').on('change', function() {
    var c_id = this.value;
    if(c_id == ''){
        $("#subcategory_select").html('<option value="null">Sub-Category</option>');
    }else{
         $.ajax({
            url: "{{route('subcategories')}}",
            type: "POST",
            data: {
                "_token": "{{csrf_token()}}",
                "c_id": c_id,
            },
            success: function(response) {
             $("#subcategory_select").html(response);
            },
        });
    }
  });
});
</script>
@endsection