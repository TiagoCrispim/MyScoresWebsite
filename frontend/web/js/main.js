$(function(){


    $('#btnequipa1').click(function(){
        alert('equipa1');
        /*$('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('href'));
*/
    });


    $('#btnequipa2').click(function(){
        alert('equipa2');
/*
        $('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('href'));*/
    });

    $('#btnfinalizar').click(function(){
        alert('jogo');

        /*$('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('href'));
*/
    });
   /* var i;
    for (i = 0; i < 10; i++) {
        $('#btnadicionar').click(function () {
            /!*alert($(element).value());*!/
            alert('cona');
            /!*$("").append();*!/


        });
    }*/
       var k=0;

       $('#btnadicionar').click(function () {

           if(k<10) {

               var user_selecionado= $("#select2-select-container").prop("title");;
               alert(user_selecionado);

               $('#'+k).val(user_selecionado);


               k++;

                /* função que anteriormente executava realizava estas funcionalidades*/
              /* $.ajax({
                   url: 'http://localhost/MyScoresWebSite/frontend/web/index.php?r=criar-jogo%2Fgetuser   ',
                   method: 'post',
                   dataType: 'json',
                   data: {
                       user_selecionado: user_selecionado
                   },
                   success: function (data) {
                       var value=data.username;
                       var id=data.userId   ;





                   },
                   error: function (data) {
                       alert('deu merda');
                   }
               });*/
           }else{
               alert('não pode adicionar mais jogadores');
           }


       });


});
