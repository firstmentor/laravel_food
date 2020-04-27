<!-- jQuery 2.1.4 -->
<script src="{{URL::asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- FastClick -->
<script src="{{URL::asset('plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('dist/js/app.min.js')}}" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('dist/js/demo.js')}}" type="text/javascript"></script>
<!-- CK Editor -->
<script src="{{URL::asset('https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js')}}" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{URL::asset('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js')}}" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript">
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')}}"></script>
<script src="{{URL::asset('plugins/morris/morris.min.js')}}" type="text/javascript"></script>
<!-- Sparkline -->
<script src="{{URL::asset('plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<!-- jvectormap -->
<script src="{{URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="{{URL::asset('plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<!-- datepicker -->
<script src="{{URL::asset('plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="{{URL::asset('plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- Datatables -->
<script src="{{URL::asset('plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
 
<script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
});
</script>
<script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5()
      })
    </script>
    <!-- SlimScroll -->

    <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor2')
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5()
      })
    </script>
    <!-- SlimScroll -->
    <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor3')
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5()
      })
    </script>
    <!-- SlimScroll -->

<script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
    <!-- SlimScroll -->

    <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor2');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
    <!-- SlimScroll -->
    <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor3');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
    <!-- SlimScroll -->