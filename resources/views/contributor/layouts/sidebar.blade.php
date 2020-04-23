
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-accordion menu-shadow menu-dark">
  <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

        <li class="{{ in_array(Route::currentRouteName(), ['libraries-contributor.index','libraries-contributor.edit']) ? 'active' : '' }}"><a href="{{route('libraries-contributor.index')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">INED LIBRARY</span></a></li>
        <li class="{{ in_array(Route::currentRouteName(), ['libraries-contributor.create']) ? 'active' : '' }}"><a href="{{route('libraries-contributor.create')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Add INED LIBRARY</span></a></li>
 
      
    </ul>
  </div>
</div>
