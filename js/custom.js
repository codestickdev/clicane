(function($){
    $(document).ready(function(){
        $('.homeVideo__play').on('click', function(){
            $(this).remove();
            $('.mejs-play').click();
        });
    });
}(jQuery));