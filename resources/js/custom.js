$(document).ready(function() {
	$("#tableAsesores").DataTable();

	$("#tableInstalaciones").DataTable();

	 $('.solo-numero').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });

    $('.solo-fecha').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9,-]/g, '');
    });

    $('.solo-placas').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9, A-Z , a-z]/g, '');
    });

    $('.solo-fecha').datepicker({ dateFormat: 'yy-mm-dd' });

    $(".newReductor").click(function(event) {
        event.preventDefault();

        $(".nuevoReductor").append('<div class="col-md-6" style="padding-left: 0px;">'+                
                                        '<div class="form-group">'+
                                            '<input type="text" class="form-control input-sm" id="reductor_1" name="reductor_1" placeholder="reductor">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-6" style="padding: 0px;">'+               
                                        '<div class="form-group">'+
                                            '<input type="text" class="form-control input-sm solo-numero" id="num_serie_reductor_1" name="num_serie_reductor_1" placeholder="Núm. de serie reductor">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-1" style="padding: 0px;float:right">'+             
                                    '</div>');
        $(".newReductor").slideUp();
        $(".deleteReductor").slideDown();


    });
    
    $(".deleteReductor").click(function(event) {
        event.preventDefault();

        $(".nuevoReductor").empty();

        $(".newReductor").slideDown();
        $(".deleteReductor").slideUp();

    });    

    $(".newTanque").click(function(event) {
        event.preventDefault();

        $(".nuevoTanque").append('<div class="col-md-6" style="padding-left: 0px;">'+              
                                    '<div class="form-group">'+
                                        '<input type="text" class="form-control input-sm" id="marca_tanque_1" name="marca_tanque_1" placeholder="Marca tanque">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-6" style="padding: 0px;">'+                
                                    '<div class="form-group">'+
                                        '<input type="text" class="form-control input-sm" id="tipo_tanque_1" name="tipo_tanque_1" placeholder="Tipo de tanque">'+
                                    '</div>'+  
                                '</div>'+
                                '<div class="col-md-6" style="padding-left: 0px;">'+                
                                    '<div class="form-group">'+
                                        '<input type="text" class="form-control input-sm" id="capacidad_1" name="capacidad_1" placeholder="Capacidad">'+
                                    '</div>'+ 
                                '</div>'+ 
                                '<div class="col-md-6" style="padding: 0px;">'+                
                                    '<div class="form-group">'+
                                        '<input type="text" class="form-control input-sm" id="num_serie_tanque_1" name="num_serie_tanque_1" placeholder="Núm. de serie tanque">'+
                                    '</div>'+ 
                                '</div>'+
                                '<div class="col-md-6" style="padding-left: 0px;">'+
                                    '<div class="form-group">'+
                                        '<input type="text" class="form-control input-sm" id="cilindros_1" name="cilindro_1" placeholder="Cilindros">'+
                                    '</div>              '+
                                '</div>'+
                                '<div class="col-md-6" style="padding: 0px;">'+ 
                                    '<div class="form-group">'+
                                        '<input type="text" class="form-control input-sm solo-fecha" id="fecha_fabricacion_1" name="fecha_fabricacion_1" placeholder="Fecha de fabricacion">'+
                                    '</div> '+
                                '</div> ');
        $(".newTanque").slideUp();
        $(".deleteTanque").slideDown();

    });
    
    $(".deleteTanque").click(function(event) {
        event.preventDefault();

        $(".nuevoTanque").empty();

        $(".newTanque").slideDown();
        $(".deleteTanque").slideUp();

    });

});
