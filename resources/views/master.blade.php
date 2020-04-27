<!DOCTYPE html>
<html>
  <head>
  @include('layouts.meta') 
  @include('layouts.css')
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
     @include('layouts.topvar') 
     @include('layouts.sidevar')
      <div class="content-wrapper">
         @yield('main_body')
      </div>
     @include('layouts.footer')    
    </div>
    @include('layouts.js')
  </body>
</html>

