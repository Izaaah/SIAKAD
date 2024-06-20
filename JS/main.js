/******Collapse meniu**********/

(function () {
    $(".navbar-nav li a").click(function (event) {
        if (!$(this).parent().hasClass('dropdown'))
            $(".navbar-collapse").collapse('hide');
    });


    /****Responsive Facebook plugin*******/

    jQuery(document).ready(function ($) {
        $(window).bind("load resize", function () {
            setTimeout(function () {
                var container_width = $('#fb-container').width();
                $('#fb-container').html('<div class="fb-page" ' +
                    'data-href="https://www.facebook.com/sapnufotostudija/"' +
                    ' data-width="' + container_width + '" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/sapnufotostudija/"><a href="https://www.facebook.com/sapnufotostudija/">Sapnų fotostudija</a></blockquote></div></div>');
                FB.XFBML.parse();
            }, 100);
        });
    });

    /**********Contacts form************/

    var btnSubmit = document.getElementById("btnSubmit");


    btnSubmit.addEventListener("click", function (event) {
        event.preventDefault();
        var MsgName = MsgForm["MsgName"].value;
        var MsgPhone = MsgForm["MsgPhone"].value;
        var MsgEmail = MsgForm["MsgEmail"].value;
        var MsgText = MsgForm["MsgText"].value;

        if (MsgName && MsgEmail && MsgText != "") {
            MsgForm["MsgName"].value = "";
            MsgForm["MsgPhone"].value = "";
            MsgForm["MsgEmail"].value = "";
            MsgForm["MsgText"].value = "";
            swal("", "Ačiū, Jūsų žinutę gavome!", "success");
        }

    });

    /*************Lightbox****************/

    $(document).on("click", '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

})();
