<!DOCTYPE html>
<html>
  <head>
  @include('layouts.meta') 
  @include('layouts.css')
  </head>
  <body class="skin-blue sidebar-mini" style="background-color:#ecf0f5;">
    <div class="">
     @include('layouts.topvar')  
      <div class="">
         @yield('main_body')
      </div>   
    </div>
    @include('layouts.js')
  </body>
</html>

