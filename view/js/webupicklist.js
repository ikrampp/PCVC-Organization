$(document).ready(function() {
        /* logic to add/remove items in pick my last ordered table*/ 
        var OrderID = 2;
        function addRowOrder() {
            //var html =
                '<tr>' +
                '<td><img src="images/rice.png" alt="..." width="50" height="50" class="img"></td>' +
                '<td>India Gate Rice' +
                '<td><select class="form-control"><option>India Gate</option><option>Deer</option><option>Sona Masoori</option><option>Double Brand</option><option>Kohinoor</option></select></td>' +
                '<td><select class="form-control"><option>5kg</option><option>25kg</option><option>50kg</option></select></td>' +
                '<td><select class="form-control"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>10</option></select></td>' +
                '<td>₹18.99' +
                '<td>₹18.99' +
                '<td><a href="javascript:void(0)" class="BtnPlus"><img src="images/copyitem.png"></a>&nbsp;<a href="javascript:void(0)" class="BtnMinus"><img src="images/minus.png"></a></td>' +
                '</tr>'
            $($(this).parent().parent()).clone(true).appendTo("#MyLastOrder");    
            //$(html).appendTo($("#MyLastOrder"))
            OrderID++;
        };
        $("#BtnPlus").on("click",addRowOrder);
        function deleteRowOrder() {
            var par = $(this).parent().parent();
            par.remove();
        };
        $("#MyLastOrder").on("click", ".BtnMinus", deleteRowOrder);
        $("#MyLastOrder").on("click", ".BtnPlus", addRowOrder);	
        /* logic to add/remove items in pick my last ordered table*/


            $('a.addPickListItems').on('click', function(event) {
            var target = $('.copyright');
            if( target.length) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
            }
            });
            
            $('[data-toggle="tooltip"]').tooltip();


            $("img.custom").mouseover(function(e) {
            $(this).addClass('hoverimage');
            });
            $("img.custom").mouseout(function(e) {
            $(this).removeClass('hoverimage');
            });

            $(".thumbnail img").mouseover(function(e) {
            $(this).addClass('hoverimage');
            });
            $(".thumbnail img").mouseout(function(e) {
            $(this).removeClass('hoverimage');
            });

            

 });

