<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; {{ date('Y') }} <div class="bullet"></div></a>
  </div>
  <div class="footer-right">
    
  </div>
</footer>
</div>
</div>

@yield('modal')

<!-- General JS Scripts -->
<script src="{{asset('assets')}}/modules/jquery.min.js"></script>
<script src="{{asset('assets')}}/modules/popper.js"></script>
<script src="{{asset('assets')}}/modules/tooltip.js"></script>
<script src="{{asset('assets')}}/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('assets')}}/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="{{asset('assets')}}/modules/moment.min.js"></script>
<script src="{{asset('assets')}}/js/stisla.js"></script>
<script src="{{ asset('assets') }}/modules/datatables/datatables.min.js"></script>
<script src="{{ asset('assets') }}/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!-- JS Libraies -->
<!-- Page Specific JS File -->
<script>
  function datatable() {
    $("#table").dataTable()
  }
</script>
<!-- Template JS File -->
<script src="{{asset('assets')}}/js/scripts.js"></script>
@yield('js')

</body>
</html>