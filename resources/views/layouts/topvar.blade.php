<header class="main-header"> 
  <a href=" " class="logo"> 
    <p>AG FOODS</p>
  </a> 

  @if(Auth::user()->usertype == 4) 
    <nav class="navbar navbar-static-top" role="navigation"> 
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
          <li class="dropdown user user-menu">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <span class="hidden-xs">Logout <i class="fa fa-sign-out"></i></span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li> 
          
        </ul>
      </div>
    </nav> 
  @elseif(Auth::user()->is_active == 1) 
    <nav class="navbar navbar-static-top" role="navigation"> 
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
        <li class="dropdown user user-menu">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <span class="hidden-xs">Logout <i class="fa fa-sign-out"></i></span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li> 
         
      </ul>
      </div>
    </nav> 
  @elseif(Auth::user()->is_active == 2) 
    <nav class="navbar navbar-static-top" role="navigation"> 
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
        <li class="dropdown user user-menu">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <span class="hidden-xs">Logout <i class="fa fa-sign-out"></i></span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li> 
         
      </ul>
      </div>
    </nav>
  @elseif(Auth::user()->is_active == 3) 
    <nav class="navbar navbar-static-top" role="navigation"> 
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
        <li class="dropdown user user-menu">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <span class="hidden-xs">Logout <i class="fa fa-sign-out"></i></span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li> 
         
      </ul>
      </div>
    </nav>  
  @endif
</header>