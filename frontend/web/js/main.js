$(function(){
    alert('sdsdd');

    $('#btnequipa1').click(function(){
        $('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
    });

    $('#btnequipa2').click(function(){
        $('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
    });

    $('#btnfinalizar').click(function(){
        $('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
        return false;
    });

});