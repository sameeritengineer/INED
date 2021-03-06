@extends('admin.layouts.index')
@section('title','Categories')
@section('content')
<div class="app-content content container-fluid load">
  <div class="content-wrapper data">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
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
               <h4 class="card-title" id="basic-layout-form">Update Category</h4>
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
                  <form action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                     <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> Category Info</h4>
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="projectinput2">Category Name <span class="required">*</span></label>
                                 <div class="controls">
                                    <input type="text" id="contentinput1" required data-validation-required-message="This field is required" class="form-control" placeholder="Category Name" name="cat_name" value="{{ $category->name }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                <label for="projectinput2">Category Slug <span class="required">*</span></label>
                                <div class="controls">
                                 <input type="text" id="contentinput2" required data-validation-required-message="This field is required" class="form-control" placeholder="Category Slug" name="cat_slug" value="{{ $category->slug }}">
                                </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="projectinput5">Parent category</label>
                                 <select id="projectinput5" name="cat_parent_id" class="form-control">
                                    <option value="0">Select Parent category</option>
                                    @foreach($parent_categories as $cat)
                                    <option {{$cat->id==$category->cat_parent_id?'selected':''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group radio-form">
                                 <label class="w-100 float-left" for="projectinput5">Status</label>
                                    <input type="radio" id="test1" name="status" value="1" {{$cat->status==1?'checked':''}}>
    <label for="test1"><span>Enable</span></label>
  </span>
  <span>
    <input type="radio" id="test2" name="status" value="0" {{$cat->status==0?'checked':''}}>
    <label for="test2"><span>Disable</span></label>
  </span>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="projectinput8">Category Description</label>
                                 <textarea id="summary-ckeditor" rows="5" class="form-control editor" name="cat_description" placeholder="Category Description">{{ $category->description }}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <img src="{{asset('admin/upload/category/'.$category->image)}}" id="output"/>
                                 <label>Upload Image</label>
                                 <label id="projectinput7" class="file center-block">
                                 <input type="file" id="file" onchange="loadFile(event)" name="image">
                                 <span class="file-custom"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput2">Image Alt</label>
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Image Alt" name="cat_image_alt" value="{{ $category->alt }}">
                              </div>
                           </div>
                        </div>
                        <h4 class="form-section"><i class="icon-clipboard4"></i>Meta Content Requirements</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput1">Meta Title</label>
                                 <input type="text" id="projectinput1" class="form-control" placeholder="Meta Title" name="meta_title" value="{{ $category->meta_title }}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput2">Meta Keyword</label>
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Meta Keyword" name="meta_keyword" value="{{ $category->meta_keyword }}">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="projectinput8">Meta Description</label>
                                 <textarea id="summary-ckeditor1" rows="5" class="form-control editor" name="meta_description" placeholder="Meta Description">{{ $category->meta_description }}</textarea>
                              </div>
                           </div>
                        </div>
                        <h4 class="form-section"><i class="icon-clipboard4"></i>Order On Pages</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput1">Home Page Sort</label>
                                 <input type="number" id="projectinput1" class="form-control" placeholder="Home Page Sort" name="cat_home_sort" value="{{ $category->home_sort }}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput2">INED Library Sort</label>
                                 <input type="number" id="projectinput2" class="form-control" placeholder="INED Library Sort" name="cat_ined_sort" value="{{ $category->ined_sort }}">
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
 <!--    <form action="{{ route('categories.update',$category->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $category->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form> -->
</div>
</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
$(document).ready(function(){
  $("#contentinput1").keyup(function(){
     var current = this.value;
     var slug = current.toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'');
        $("#contentinput2").val(slug);   
});
  });
</script>
@endsection