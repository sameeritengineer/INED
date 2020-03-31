@extends('admin.layouts.index')
@section('title','Ined Library')
@section('content')
<div class="app-content content container-fluid load">
  <div class="content-wrapper data">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Library</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('libraries.index') }}"> Back</a>
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
               <h4 class="card-title" id="basic-layout-form">Update Library</h4>
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
                  <form action="{{ route('libraries.update',$libraries->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                     <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> Library Info</h4>
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="projectinput2">Content Name <span class="required">*</span></label>
                                 <div class="controls">
                                    <input type="text" id="contentinput1" required data-validation-required-message="This field is required" class="form-control" placeholder="Content Name" name="name" value="{{ $libraries->name }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                <label for="projectinput2">Content Slug <span class="required">*</span></label>
                                <div class="controls">
                                 <input type="text" id="contentinput2" required data-validation-required-message="This field is required" class="form-control" placeholder="Content Slug" name="slug" value="{{ $libraries->slug }}">
                                </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="projectinput5">Content Type <span class="required">*</span></label>
                                 <div class="controls">
                                 <select required data-validation-required-message="This field is required" id="projectinput5" name="content_type_id" class="form-control">
                                    <option value="">Select Content Type</option>
                                    @foreach($types as $type)
                                    <option {{$type->id==$library->content_type_id?'selected':''}} value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                 </select>
                                </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                                 <div class="form-group radio-form">
                                 <label class="w-100 float-left" for="projectinput5">Status</label>
                                 <!-- <input type="radio" name="status" value="1" {{$library->status==1?'checked':''}} >
                                <label for="male">Enable</label><br>
                                <input type="radio" name="status" value="0" {{$library->status==0?'checked':''}}>
                                <label for="male">Disable</label> -->
                                    <input type="radio" id="test1" name="status" value="1" {{$library->status==1?'checked':''}}>
    <label for="test1"><span>Enable</span></label>
  </span>
  <span>
    <input type="radio" id="test2" name="status" value="0" {{$library->status==0?'checked':''}}>
    <label for="test2"><span>Disable</span></label>
  </span>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="projectinput8">Content Description</label>
                                 <textarea id="summary-ckeditor" rows="5" class="form-control" name="description" placeholder="Content Description">{{ $libraries->description }}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                 <label>Subscription type: Paid/Free</label>
                                 <select name="sub_type_id" class="form-control">
                                    <option {{$library->subscription_type=='free'?'selected':''}}  value="free">Free</option>
                                    <option {{$library->subscription_type=='paid'?'selected':''}} value="paid">Paid</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput2">Url</label>
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Url" name="url" value="{{ $libraries->url }}">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <img src="{{asset('admin/upload/library/'.$libraries->image)}}" id="output"/>
                                 <label>Upload Image</label>
                                 <label id="projectinput7" class="file center-block">
                                 <input type="file" id="file" onchange="loadFile(event)" name="image">
                                 <span class="file-custom"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="projectinput2">Image Alt</label>
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Image Alt" name="alt" value="{{ $libraries->alt }}">
                              </div>
                           </div> 
                           <div class="col-md-4">
                              <div class="form-group">
                                 <a href="{{asset('admin/upload/library/video/'.$libraries->upload)}}" download>Download</a>
                                 <label>Upload Video</label>
                                 <label id="projectinput7" class="file center-block">
                                 <input type="file" name="video">
                                 <span class="file-custom"></span>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <h4 class="form-section"><i class="icon-clipboard4"></i>Library Info</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput5">Category <span class="required">*</span></label>
                                 <div class="controls">
                                 <select required data-validation-required-message="This field is required" id="category_select" name="c_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                    <option {{$cat->id==$library->category_id?'selected':''}} value="{{$cat->id}}">{{$cat->name}}</option>
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
                                    @foreach($subcategories as $subcat)
                                    <option {{$subcat->id==$library->subcategory_id?'selected':''}} value="{{$subcat->id}}">{{$subcat->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <h4 class="form-section"><i class="icon-clipboard4"></i>Meta Content Requirements</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput1">Meta Title</label>
                                 <input type="text" id="projectinput1" class="form-control" placeholder="Meta Title" name="meta_title" value="{{ $libraries->meta_title }}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput2">Meta Keyword</label>
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Meta Keyword" name="meta_keyword" value="{{ $libraries->meta_keyword }}">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="projectinput8">Meta Description</label>
                                 <textarea id="summary-ckeditor1" rows="5" class="form-control" name="meta_description" placeholder="Meta Description">{{ $libraries->meta_keyword }}</textarea>
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
    CKEDITOR.replace( 'summary-ckeditor1' );
</script>
@endsection