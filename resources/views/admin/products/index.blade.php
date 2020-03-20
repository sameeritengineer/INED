@extends('admin.layouts.index')
@section('title','Products')
@section('content')
<div class="app-content content container-fluid load">
  <div class="content-wrapper data">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-2">
        	<h3 class="content-header-title mb-0">Products</h3>
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
                          <th>Detail</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($products as $product)
                        <tr>                  
                          <td>{{$loop->iteration}}</td>
                          <td>{{$product->name}}</td>
                          <td>{{$product->detail}}</td>        
                          <td>
                          	<a class="btn btn-outline-warning" href="{{ route('products.edit',$product->id) }}">Edit</a>
                          </td>
                          <td><button type="button" class="btn btn-outline-warning">Delete</button></td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Detail</th>
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