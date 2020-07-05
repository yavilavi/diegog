$(function () {
    $('.filter').click(function () {
        
        $(this).addClass('active').siblings().removeClass('active');
        let valor= $(this).attr('data-nombre');
        if(valor == 'todos'){
            $('.cont-work').show('1000');
        }else{
            $('.cont-work').not('.'+valor).hide('1000');
            $('.cont-work').filter('.'+valor).show('1000');
        }
        
    });

    
});

$(function () {
    $('.filter2').click(function () {
        
        $(this).addClass('active').siblings().removeClass('active');
        let valor= $(this).attr('data-nombre');
        if(valor == 'todos'){
            $('.cont-work2').show('1000');
        }else{
            $('.cont-work2').not('.'+valor).hide('1000');
            $('.cont-work2').filter('.'+valor).show('1000');
        }
        
    });

    
});

$(function () { $('#blah').removeClass('unicamodalidadelegida'); }); 
$(function () { $('#blah').removeClass('mencionhonorifica'); }); 
$(function () { $('#blah').removeClass('procedimiento'); }); 
$(function () { $('#blah').removeClass('docenteasesor'); }); 
$(function () { $('#blah').removeClass('delosproductos'); }); 
$(function () { $('#blah').removeClass('juradoevaluador'); }); 










