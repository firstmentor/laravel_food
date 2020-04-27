<!DOCTYPE html>
<html class="no-js" lang="">
<head>
  @include('layouts.meta') 
  @include('layouts.css') 
</head> 
  <body class="skin-blue" style="background-color:#ecf0f5;">
    <div class="wrapper" style="background-color:#ecf0f5;">
      @include('layouts.topvar')
      @include('layouts.sidevar') 
      <div class="content-wrapper">
        @yield('main_body')
      </div>   
       @include('layouts.js')
    </div> 
  </body>
</html>