$(document).ready(function() {



    /*
    if ( $('.side').children().length == 0 ) {
        // div has no other tags inside it
        $('.side').hide();
    }*/


        // http://stackoverflow.com/questions/1274430/using-jquery-within-onclick
        $('a').click(function(){
            $('html, body').animate({
                scrollTop: $( $.attr(this, 'href') ).offset().top
            }, 100);
            return false;
        });

    });
