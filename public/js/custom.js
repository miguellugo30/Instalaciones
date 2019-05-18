$(document).ready(function() {
	$("#tableAsesores").DataTable();

	$("#tableInstalaciones").DataTable();

	 $('.solo-numero').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });

    $('.solo-fecha').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9,-]/g, '');
    });

    $('.solo-fecha').datepicker({ dateFormat: 'dd-mm-yy' });

    $("#tableInstalaciones").dblclick(function(event) {
    	
    	id = $('#tableInstalaciones tbody tr').attr('idInsta');

    	window.location.href = id;

    });

    $("#tableAsesores tbody tr").dblclick(function(event) {
    	
    	id = $(this).attr('idTec');

    	window.location.href = id;

    });

});
