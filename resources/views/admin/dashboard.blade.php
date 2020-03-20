@extends('admin.layouts.index')
@section('title','Dashboard')
@section('content')
<style type="text/css">
@media screen and (min-width: 1024px) {
  div.myautoscroll {
      width: 100%;
      height: 245px;
      min-height: 245px;
      overflow-x: hidden;
      overflow-y: hidden; 
  }

  div.myautoscroll:hover {
    overflow-x: auto;
    overflow-y: scroll; 
  }
  /* width */
  div.myautoscroll::-webkit-scrollbar {
    width: 8px;
  }
  /* Track */
  div.myautoscroll::-webkit-scrollbar-track {
    border-radius: 5px;
  }
  /* Handle */
  div.myautoscroll::-webkit-scrollbar-thumb {
    background: #aaa; 
    border-radius: 10px;
  }
}
@media screen and (max-width:1024px) {
  div.myautoscroll {
      width: 100%;
      height: 245px;
      min-height: 245px;
      overflow-x: auto;
      overflow-y: scroll; 
  }
}
</style>
<div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row"></div>
      	<div class="content-body">       
        	<div class="row">
            <a href="#">
            <div class="col-xl-3 col-lg-6 col-xs-12">
            		<div class="card">
              			<div class="card-body">
                			<div class="media">
                  				<div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                    				<i class="icon-grid font-large-2 white"></i>
                  				</div>
                  				<div class="p-2 bg-gradient-x-primary white media-body">
                    				<h5>Posts</h5>
                    				<h5 class="text-bold-400"><i class="ft-plus"></i>5</h5>
                  				</div>
               				</div>
              			</div>
            		</div>
          		</div> 
              </a>
              <a href="#">
              <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                      <div class="media">
                          <div class="p-2 text-xs-center bg-danger bg-darken-2 media-left media-middle">
                            <i class="icon-list font-large-2 white"></i>
                          </div>
                          <div class="p-2 bg-gradient-x-danger white media-body">
                            <h5>Roles</h5>
                            <h5 class="text-bold-400"><i class="ft-plus"></i>14</h5>
                          </div>
                      </div>
                    </div>
                </div>
              </div>   
              </a>
              <a href="#">        		
              <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                      <div class="media">
                          <div class="p-2 text-xs-center bg-warning bg-darken-2 media-left media-middle">
                            <i class="icon-user-following font-large-2 white"></i>
                          </div>
                          <div class="p-2 bg-gradient-x-warning white media-body">
                            <h5>Categories</h5>
                            <h5 class="text-bold-400"><i class="ft-plus"></i>6</h5>
                          </div>
                      </div>
                    </div>
                </div>
              </div> 
              </a>
              <a href="#"> 
              <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                      <div class="media">
                          <div class="p-2 text-xs-center bg-success bg-darken-2 media-left media-middle">
                            <i class="icon-user-unfollow font-large-2 white"></i>
                          </div>
                          <div class="p-2 bg-gradient-x-success white media-body">
                            <h5>Pages</h5>
                            <h5 class="text-bold-400"><i class="ft-plus"></i>6</h5>
                          </div>
                      </div>
                    </div>
                </div>
              </div>  
              </a>
        </div>

	</div>
	</div>
</div>
@endsection