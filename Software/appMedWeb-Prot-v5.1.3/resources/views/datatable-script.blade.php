<script>
    $(document).ready(function () {
        $('#tablaContenido').dataTable({
            @include('lenguajeDT')
       });
       $("#reset").click(function(){
		      @yield('campos')
		 });
       $('[data-toggle="tooltip"]').tooltip()
       $('[rel="tooltip"]').tooltip()
       // $('#FechaCita').datetimepicker();
       @yield('DT')         
})</script>