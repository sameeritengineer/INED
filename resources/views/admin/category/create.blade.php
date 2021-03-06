@extends('admin.layouts.index')
@section('title','Category')
@section('content')
<style>
.box {
  padding: 0.5em;
  width: 100%;
  margin:0.5em;
}

.box-2 {
  padding: 0.5em;
  width: 570px;
}

.options label,
.options input{
  width:4em;
  padding:0.5em 1em;
}
.btn{
  background:white;
  color:black;
  border:1px solid black;
  padding: 0.5em 1em;
  text-decoration:none;
  margin:0.8em 0.3em;
  display:inline-block;
  cursor:pointer;
}

.hide {
  display: none;
}

img {
  max-width: 100%;
}

</style>
<div class="app-content content container-fluid load">
  <div class="content-wrapper data">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            
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
               <h4 class="card-title" id="basic-layout-form">Add New Category</h4>
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
                  <form action="{{ route('categories.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data" novalidate>
                  	@csrf

                     <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> Category Info</h4>
                        <div class="row">



<!-- <div class="col-md-12">
          <main class="page">
  <h2>Upload ,Crop and save.</h2>
  <div class="box">
    <input type="file" id="file-input" value="" onclick="cropImage()">
    <input type="text" id="file-input1" name="sameerkifile" value="">
  </div>
</main>
</div>
 -->

                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="projectinput2">Category Name <span class="required">*</span></label>
                                 <div class="controls">
                                    <input type="text" id="contentinput1" required data-validation-required-message="This field is required" class="form-control" placeholder="Category Name" name="cat_name">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                              	<label for="projectinput2">Category Slug <span class="required">*</span></label>
                              	<div class="controls">
                                 <input type="text" id="contentinput2" required data-validation-required-message="This field is required" class="form-control" placeholder="Category Slug" name="cat_slug">
                                </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="projectinput5">Parent category</label>
                                 <select id="projectinput5" name="cat_parent_id" class="form-control">
                                    <option value="0">Select Parent category</option>
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3">
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
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="projectinput8">Category Description</label>
                                 <textarea id="summary-ckeditor" rows="5" class="form-control editor" name="cat_description" placeholder="Category Description"></textarea>
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
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput2">Image Alt</label>
                                 <input type="text" id="projectinput2" class="form-control" placeholder="Image Alt" name="cat_image_alt">
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
                        <h4 class="form-section"><i class="icon-clipboard4"></i>Order On Pages</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput1">Home Page Sort</label>
                                 <input type="number" id="projectinput1" class="form-control" placeholder="Home Page Sort" name="cat_home_sort">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="projectinput2">INED Library Sort</label>
                                 <input type="number" id="projectinput2" class="form-control" placeholder="INED Library Sort" name="cat_ined_sort">
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

<div class="modal fade text-xs-left" id="cropImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close clear" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="row">
  <h2>Crop Image</h2>
  <!-- leftbox -->
  <div class="col-md-6">
  <div class="box-2">
    <div class="result"></div>
  </div>
  </div>
  <!-- input file -->
  <div class="box">
    <div class="options hide">
      <label> Width</label>
      <input type="number" class="img-w" value="300" min="100" max="1200" />
    </div>
    <!-- save btn -->
    <button class="btn save hide">Save</button>
    <!-- download btn -->
    <a href="" class="btn download hide">Download</a>
  </div>


</div>
      </div>

    </div>
  </div>
</div>


<!-- <form action="{{ route('categories.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
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
  function cropImage(id,name)
{
  $("#cropImage").modal("show");
}
  // vars
let result = document.querySelector('.result'),
img_result = document.querySelector('.img-result'),
img_w = document.querySelector('.img-w'),
img_h = document.querySelector('.img-h'),
options = document.querySelector('.options'),
save = document.querySelector('.save'),
cropped = document.querySelector('.cropped'),
dwn = document.querySelector('.download'),
upload = document.querySelector('#file-input'),
cropper = '';

// on change show image with crop options
upload.addEventListener('change', (e) => {
  if (e.target.files.length) {
    // start file reader
    const reader = new FileReader();
    reader.onload = (e)=> {
      if(e.target.result){
        // create new image
        let img = document.createElement('img');
        img.id = 'image';
        img.src = e.target.result
        // clean result before
        result.innerHTML = '';
        // append new image
        result.appendChild(img);
        // show save btn and options
        save.classList.remove('hide');
        options.classList.remove('hide');
        // init cropper
        cropper = new Cropper(img);
      }
    };
    reader.readAsDataURL(e.target.files[0]);
  }
});

// save on click
save.addEventListener('click',(e)=>{
  e.preventDefault();
  // get result to data uri
  let imgSrc = cropper.getCroppedCanvas({
    width: img_w.value // input value
  }).toDataURL();

  document.getElementById("file-input1").value = imgSrc;
  // remove hide class of img
  cropped.classList.remove('hide');
  img_result.classList.remove('hide');
  // show image cropped
  cropped.src = imgSrc;
  dwn.classList.remove('hide');
  dwn.download = 'imagename.png';
  dwn.setAttribute('href',imgSrc);
});


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