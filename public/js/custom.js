$(document).ready(function() {
	$("#tableAsesores").DataTable();

	$("#tableInstalaciones").DataTable();

	 $('.solo-numero').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });

    $('.solo-fecha').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9,-]/g, '');
    });

    $('.solo-fecha').datepicker({ dateFormat: 'yy-mm-dd' });

});
