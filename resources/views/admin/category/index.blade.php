@extends('admin.layouts.index')
@section('title','Categories')
@section('content')
<div class="app-content content container-fluid load">
  <div class="content-wrapper data">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-2">
        	<h3 class="content-header-title mb-0">Categories</h3>
    	</div>  
    	<div class="content-body">
    		<section class="">
    			<div class="row">   				
    				<div class="col-md-12">
    					<div class="card">
    						<div class="card-body collapse in">
								<div class="card-block ">
  									<div class="col-lg-2 col-md-6 col-sm-12">
                      <a href="{{route('dashboard')}}" class="btn btn-outline-warning block btn-lg">Dashboard</a>
                    </div>  
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</section>
    	</div>
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-xs-12">
            		    @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                          <p>{{ $message }}</p>
                      </div>
                    @endif
              <div class="card">
                <div class="card-body collapse in">
                  <div class="card-block card-dashboard">  
                   <div class="table-responsive">                  
                    <table class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($categories as $cat)
                        <tr>                  
                          <td>{{$loop->iteration}}</td>
                          <td>{{$cat->name}}</td>
                          <td>{{$cat->description}}</td>        
                          <td>
                          	<a class="btn btn-outline-warning" href="{{ route('categories.edit',$cat->id) }}">Edit</a>
                          </td>
                          <td><button type="button" class="btn btn-outline-warning" onclick="deletecategory({{$cat->id}},'{{$cat->name}}')"><i class="fa fa-trash"></i></button></td> 
                          <!-- <td><button type="button" class="btn btn-outline-warning">Delete</button></td> -->
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
<div class="modal fade text-xs-left" id="deleteForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close clear" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Delete Category</label>
      </div>
      <form action="{{ route('categories.destroy',1) }}" id="deleteCategoryForm" method="POST" novalidate>
        @method('DELETE')
        @csrf
        <div class="modal-body">
          <h4>Are you sure want to delete this category <span id="text"></span>?</h4>
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-outline-secondary btn-lg clear" data-dismiss="modal" value="Close">
          <input type="submit" class="btn btn-outline-primary btn-lg" id="deletecategory" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  
function deletecategory(id,name)
{
  var name = $('#deleteForm').find('#text').text(name);
  var url = '{{ route("categories.destroy", ":id") }}';
  url = url.replace(':id', id);
  $('#deleteCategoryForm').attr('action', url);
  $("#deleteForm").modal("show");
}


 
</script>
@endsection