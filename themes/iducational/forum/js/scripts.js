$(document).ready(function(){/* off-canvas sidebar toggle */

$('[data-toggle=offcanvas]').click(function() {
  	$(this).toggleClass('visible-xs text-center');
    $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
    $('.row-offcanvas').toggleClass('active');
    $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
    $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
    $('#btnShow').toggle();
});
});

// $(document).ready(function () {
//   $('[data-toggle=offcanvas]').click(function () {
//     if ($('.sidebar-offcanvas').css('background-color') == 'rgb(255, 255, 255)') {
// 	    $('.list-group-item').attr('tabindex', '-1');
//     } else {
// 	    $('.list-group-item').attr('tabindex', '');
//     }
//     $('.row-offcanvas').toggleClass('active');
    
//   });
// });
