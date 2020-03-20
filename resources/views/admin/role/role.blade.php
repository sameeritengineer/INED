@extends('admin.layouts.index')
@section('title','Role')
@section('content')
<div class="app-content content container-fluid load">
  <div class="content-wrapper data">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-2">
        	<h3 class="content-header-title mb-0">Role</h3>
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
              <div class="card">
                <div class="card-body collapse in">
                  <div class="card-block card-dashboard">  
                   <div class="table-responsive">                  
                    <table class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Show</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($roles as $role)
                        <tr>                  
                          <td>{{$loop->iteration}}</td>
                          <td>{{$role->name}}</td>  
                          <td><button type="button" class="btn btn-outline-warning">Show</button></td> 
                          <td><button type="button" class="btn btn-outline-warning">Edit</button></td>
                          <td><button type="button" class="btn btn-outline-warning">Delete</button></td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Show</th>
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


@endsection