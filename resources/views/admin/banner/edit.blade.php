@extends('admin.layouts.index')
@section('title','Our Banner')
@section('content')
<div class="app-content content container-fluid load">
  <div class="content-wrapper data">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('banner.index') }}"> Back</a>
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
               <h4 class="card-title" id="basic-layout-form">Update banner</h4>
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
                  <form action="{{ route('banner.update',$banners->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                     <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> Banner Info</h4>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="projectinput8">Description</label>
                                 <textarea id="summary-ckeditor" rows="5" class="form-control editor" name="description" placeholder=" Description">{{ $banners->description }}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <img src="{{asset('admin/upload/banner/'.$banners->image)}}" id="output"/>
                                 <label>Upload Image</label>
                                 <label id="projectinput7" class="file center-block">
                                 <input type="file" id="file"  accept="image/*"  onchange="loadFile(event)" name="image">
                                 <span class="file-custom"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="projectinput2">Image Alt</label>
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Image Alt" name="alt" value="{{ $banners->alt }}">
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="projectinput1">Sort</label>
                                 <input type="number" id="projectinput1" class="form-control" placeholder="Sort" name="sort" value="{{ $banners->sort }}">
                              </div>
                           </div>
                        </div>
                        <h4 class="form-section"><i class="icon-clipboard4"></i>Meta Content Requirements</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput1">Meta Title</label>
                                 <input type="text" id="projectinput1" class="form-control" placeholder="Meta Title" name="meta_title" value="{{ $banners->meta_title }}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput2">Meta Keyword</label>
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Meta Keyword" name="meta_keyword" value="{{ $banners->meta_keyword }}">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="projectinput8">Meta Description</label>
                                 <textarea id="summary-ckeditor1" rows="5" class="form-control editor" name="meta_description" placeholder="Meta Description">{{ $banners->meta_description }}</textarea>
                              </div>
                           </div>
                        </div>
                       <div class="row">
                           <div class="col-md-4">
                              <div class="form-group radio-form">
                                <label class="w-100 float-left" for="projectinput5">Status</label>
                               <span>
                              <input type="radio" id="test1" name="status" value="1" {{$banners->status==1?'checked':''}}>
                              <label for="test1"><span>Enable</span></label>
                            </span>
                               <span>
                              <input type="radio" id="test2" name="status" value="0" {{$banners->status==0?'checked':''}}>
                              <label for="test2"><span>Disable</span></label>
                              </span>
                              </div>
                           </div>
                         </div>


                          <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput1">Redirect URL</label>
                                 <input type="text" id="redirect_url" class="form-control" placeholder="Redirect URL" value="{{ $banners->redirect_url }}" name="redirect_url">
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
});
</script>
@endsection