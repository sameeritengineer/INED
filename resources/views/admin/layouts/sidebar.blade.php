<div data-scroll-to-active="true" class="main-menu menu-fixed menu-accordion menu-shadow menu-dark">
  <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
      <li class="nav-item"><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i><span data-i18n="" class="menu-title">DASHBOARD</span></a></li>

      <li class="nav-item"><a href="#"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">CATEGORY</span></a>
    	  <ul class="menu-content">
            <li class="{{ in_array(Route::currentRouteName(), ['categories.index','categories.edit']) ? 'active' : '' }}"><a href="{{route('categories.index')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Category</span></a></li>
    		    <li class="{{ in_array(Route::currentRouteName(), ['categories.create']) ? 'active' : '' }}"><a href="{{route('categories.create')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Add Category</span></a></li>
        </ul>
      </li>
      <li class="nav-item"><a href="#"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">INED LIBRARY CONTENT</span></a>
        <ul class="menu-content">
            <li class="{{ in_array(Route::currentRouteName(), ['libraries.index','libraries.edit']) ? 'active' : '' }}"><a href="{{route('libraries.index')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">INED LIBRARY</span></a></li>
            <li class="{{ in_array(Route::currentRouteName(), ['libraries.create']) ? 'active' : '' }}"><a href="{{route('libraries.create')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Add INED LIBRARY</span></a></li>
        </ul>
      </li>
      <li class="nav-item"><a href="#"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Manage Editorial Board</span></a>
        <ul class="menu-content">
            <li class="{{ in_array(Route::currentRouteName(), ['boards.index','boards.edit']) ? 'active' : '' }}"><a href="{{route('boards.index')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Editorial Boards</span></a></li>
            <li class="{{ in_array(Route::currentRouteName(), ['boards.create']) ? 'active' : '' }}"><a href="{{route('boards.create')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Add Editorial Boards</span></a></li>
        </ul>
      </li>
      <li class="nav-item"><a href="#"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">News and Events</span></a>
        <ul class="menu-content">
            <li class="{{ in_array(Route::currentRouteName(), ['news.index','news.edit']) ? 'active' : '' }}"><a href="{{route('news.index')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">News and Events</span></a></li>
            <li class="{{ in_array(Route::currentRouteName(), ['news.create']) ? 'active' : '' }}"><a href="{{route('news.create')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Add News and Events</span></a></li>
        </ul>
      </li>
      <!-- <li class="nav-item"><a href="#"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Team</span></a>
        <ul class="menu-content">
            <li class="{{ in_array(Route::currentRouteName(), ['team.index','team.edit']) ? 'active' : '' }}"><a href="{{route('team.index')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Team</span></a></li>
            <li class="{{ in_array(Route::currentRouteName(), ['team.create']) ? 'active' : '' }}"><a href="{{route('team.create')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Add Team</span></a></li>
        </ul>
      </li> -->
      <li class="nav-item {{ in_array(Route::currentRouteName(), ['leads']) ? 'active' : '' }}"><a href="{{route('leads')}}"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Leads</span></a>
      </li>
      <li class="nav-item {{ in_array(Route::currentRouteName(), ['subscribers']) ? 'active' : '' }}"><a href="{{route('subscribers')}}"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Subscribers</span></a>
      </li>
    </ul>
  </div>
</div>
