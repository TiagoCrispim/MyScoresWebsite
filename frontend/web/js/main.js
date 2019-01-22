$(function(){


    $('#btnequipa1').click(function(){
        alert('equipa1');
        $('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('href'));

    });


    $('#btnequipa2').click(function(){
        alert('equipa2');

        $('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('href'));
    });

    $('#btnfinalizar').click(function(){
        alert('jogo');

        $('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('href'));

    });

});
