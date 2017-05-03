<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.1.4 -->
<script src="{{ asset('/js/jquery-2.1.0.min.js')}}"></script>
<!-- jQuery 2.1.4 -->
<!--<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>-->
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<!-- States and Municipalities of México -->
<script src="{{ asset('/js/estados.js') }}"></script>
<!-- Combobox dependientes-->
<script src="{{ asset('/js/dropdown.js') }}" type="text/javascript"></script>
<!-- Ckeditor -->
<script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>
<!-- bootstrap form-helpers -->
<script src="{{ asset('/js/bootstrap-formhelpers.js') }}"></script>
<!-- Datatables -->
<script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$('#example').DataTable({
			responsive: true,
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
			}
		});
	});
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->