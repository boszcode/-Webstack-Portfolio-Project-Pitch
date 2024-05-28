<!-- Sidebar Nav -->
<aside id="sidebar" class="js-custom-scroll side-nav">
<ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
  
  @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
	  <!-- Title -->
		  <li class="sidebar-heading h6">Users</li>
		  <!-- End Title -->

		  <!-- Users -->
		  <li class="side-nav-menu-item  {{ Request::is('users') ? 'active' : '' }}">
			  <a class="side-nav-menu-link media align-items-center" href="{{route('users.index')}}">
	  <span class="side-nav-menu-icon d-flex mr-3">
		<i class="gd-user"></i>
	  </span>
				  <span class="side-nav-fadeout-on-closed media-body">Users</span>
				  <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
			  </a>
		  </li>

		  <li class="side-nav-menu-item  {{ Request::is('hotels') ? 'active' : '' }}">
			  <a class="side-nav-menu-link media align-items-center" href="{{route('hotels.index')}}">
	  <span class="side-nav-menu-icon d-flex mr-3">
		<i class="gd-home"></i>
	  </span>
				  <span class="side-nav-fadeout-on-closed media-body">Hotels</span>
				  <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
			  </a>
		  </li>
		  <!-- End Users -->
  @endif

	@if(\Illuminate\Support\Facades\Auth::user()->role=='manager')

		  <li class="side-nav-menu-item  {{ Request::is('service') ? 'active' : '' }}">
			  <a class="side-nav-menu-link media align-items-center" href="{{route('users.index')}}">
	  <span class="side-nav-menu-icon d-flex mr-3">
		{{--<i class="g"></i>--}}
	  </span>
				  <span class="side-nav-fadeout-on-closed media-body">Hotel Service</span>
				  <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
			  </a>
		  </li>
	@endif
</ul>
</aside>
<!-- End Sidebar Nav -->