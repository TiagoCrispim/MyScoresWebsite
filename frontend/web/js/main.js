      $(function(){


    $('#btnequipa1').click(function(){
        /*$('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('href'));
*/
    });


    $('#btnequipa2').click(function(){
/*
        $('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('href'));*/
    });

    $('#btnfinalizar').click(function(){

        /*$('#modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('href'));
*/
    });
   /* var i;
    for (i = 0; i < 10; i++) {
        $('#btnadicionar').click(function () {
            /!*alert($(element).value());*!/
            alert('alerta');
            /!*$("").append();*!/


        });
    }*/
       var k=0;

       $('#btnadicionar').click(function () {

           if(k<10) {

               var user_selecionado= $("#select2-select-container").prop("title");;

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
                       alert('alerta');
                   }
               });*/
           }else{
               alert('não pode adicionar mais jogadores');
           }


       });


});
