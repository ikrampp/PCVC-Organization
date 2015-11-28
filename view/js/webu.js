$(document).ready(function() {

        $("#showmodal").click(function(e) {
         $("#myModal").modal('show');
         e.preventDefault();
        });
              
        $('[data-toggle="tooltip"]').tooltip();

        $("img.custom").mouseover(function(e) {
            $(this).addClass('hoverimage');
        });
        $("img.custom").mouseout(function(e) {
            $(this).removeClass('hoverimage');
        });


        $(".thumbnail").mouseover(function(e) {
        $(this).addClass('hoverprod');
        });
        $(".thumbnail").mouseout(function(e) {
        $(this).removeClass('hoverprod');
        });


        $("#searchboxall").keydown(function(e) {
            var key;
            (window.event) ? key = window.event.keyCode : key = e.which;  
            if(key == 13) {
              e.preventDefault();
              return false;
            }
        });
        
        $(window).keydown(function(e){
            var key;
            (window.event) ? key = window.event.keyCode : key = e.which;    
            if(key == 13) {
              e.preventDefault();
              return false;
            }
        });   


 
 });

