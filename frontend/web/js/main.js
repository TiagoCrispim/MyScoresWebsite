$(function(){
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

    $('#btncriarjogo').click(function(){
        $('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
    });
});