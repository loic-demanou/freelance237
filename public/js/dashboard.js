$(function() {

    // la partie de la validation des propositions
    var show= $('.show-depli');
    var deplier= $('.deplier');

    show.hide();
    deplier.click(function () { 
        $(this).next().toggle('fast');
        // console.log("OKKKK");
    });


    // le systeme d'onglet
    $('ul.tabs').each(function(){
        var active, content;
        links= $(this).find('a');

        active= links.first().addClass('active');
        content = $(active.attr('href'));

        links.not(':first').each(function(){
            $($(this).attr('href')).hide();
        });

        $(this).on('click', 'a', function(){
            active.removeClass('active');
            content.hide();

            active= $(this);
            content= $($(this).attr('href'));

            active.addClass('active');
            content.fadeIn();
            
            return false;
        });
    });


});

