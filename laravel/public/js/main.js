

///specialties/list Função que lista todos os profissionais daquela especialidade

 

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})



    $('body').on('click', '.agendar_ini', function () {
           var id = $('.select_teste').val();
    listar_profissional(id);
  
  });



function listar(action) {   
    url = "http://127.0.0.1:8000/api/list";  
    $.getJSON(url, {
        action: action,
    },
        function (especialidade) {
         
            for (i = 0; i < especialidade.content.length; i++) {
                $('.select_teste').append('<option class="especialidade_select" value="'
                 + especialidade.content[i].especialidade_id + '">'
                  + especialidade.content[i].nome + 
                  '</option>');
            }
        });
}
listar('specialties/list');



$(document).ajaxSend(function () {
    $("#overlay").fadeIn(300);
});

//função responsavel  pra mostra o profissional escolido
function listar_profissional(id = null) { 
    url = 'http://127.0.0.1:8000/api/profissional/'+id;
    $.getJSON(url, {       
    }).always(function (especialidade) {        
        console.log(especialidade);
          $('.count-prof').text(' ');
       
         var qtd = especialidade.content.length;
         var resString = (qtd > 1 ? "Resultados" : "resultado");

         var div = "";
         var string = document.querySelector('.container-card');  

        especialidade.content.forEach(( value , a)=>{ 
       var crm                = especialidade.content[a].documento_conselho;
       var prof_id            = especialidade.content[a].profissional_id
       var Nome_profissional  = value.nome;
       var imagem             = (especialidade.content[a].foto == null ? "assets/img/img_avatar1.png" : especialidade.content[a].foto);
 
                div += "<div class='item m-4'>";
                div += "<div class='foto'><img src='" + imagem + "'></div>";
                div += "<p class='nome_profi'>" + Nome_profissional + "</p>";
                div += "<p class='crm'><b>CRM</b>" +crm+"</p>";
                div += "<button class='btn  btn-success agendar' id='agendar'  data-prof-id='" + prof_id + "'    data-toggle='modal' data-target='#myModal'>Agendar</button>";
                div += "</div>";
  });     
        
          $('.count-prof').text('Voce encontrou '+qtd  +' '+ resString+" para sua pesquisa de " +$('.select_teste :selected').text());
    
        string.innerHTML = div;
    }).done(function () {
        setTimeout(function () {
            $("#overlay").fadeOut(300);
        }, 1000);;

    });
}






$(".select_teste").click(function () {  
    var id = $('.select_teste').val();
    listar_profissional(id);

});




/*
 Ao clicar em agendar abre umm modal com  o formulario
 no formulario campos do tipo text para o usuario inserir seus dados 
 e campos do tipo Hidden  com dados dos profissionais e suas especialidades
 Var Action = Responsavel pelo valor da rota;
 var Id =  O id da especialidade 
 Ao Abrir o Modal tera uma nova requisição que mostrará as
 midias atráves do select com Placeholder de como nos conheceu
*/

$('body').on('click', '#agendar', function () {
    var id           = $('.select_teste').val();
    var prof_id      = $(this).data('prof-id');
    var select_value = $('.select_teste').val();  
    var espec_id     =  $('#espec_id').val(select_value);
     
/*
Limpar todos os inputs ao Cadastrar */

     $("#cpf").val('');
     $("#nome").val('');
     $("#birthDate").val('');

  

/*Variavel responsavel pela requisição */
   var action   = 'professional/list?especialidade_id=' + id;  
      $.getJSON(url, {
        action: action
    }, function (profissionais) {
        $('#professional_id').val(prof_id);
    });
  
    //Bloco responsavel por carregar   a fonte responsavel  
    url = 'http://127.0.0.1:8000/api/como';
      $.getJSON(url, {
       
    },
        function (comunicacao) {
            console.log(comunicacao);
            for (i = 0; i < comunicacao.content.length; i++) {
                $('.como_conheceu').append('<option  value="' + comunicacao.content[i].origem_id + '">' + comunicacao.content[i].nome_origem + '</option>');
            }
        });
});


/*
Evento responsavel pelo cadastro  
NOME E CPF obrigatórios
*/

$('body').on('click', '.solicitar', function () {

    var nome            = $("#nome").val();
    var cpf             = $("#cpf").val();
    var birthDate       = $("#birthDate").val();
    var specialty_id    = $("#espec_id").val();
    var professional_id = $("#professional_id").val();
    var source_id       = $("#source_id").val();
  
  if(nome == '' || cpf == ''){
    $.alert({
            boxWidth:'500px',
            title:"Erro",
            useBootstrap: false,
            content: "Todos os campos São obrigatórios",
        });
  }else{

    prod ={
        name: nome,
        source_id: source_id,
        cpf: cpf,
        specialty_id: specialty_id,
        professional_id: professional_id,
        date_time: '1',
        birthDate: birthDate
    };
 
    $.post("http://127.0.0.1:8000/api/create/", prod, function (data) {
           $.alert({
            boxWidth:'500px',
            title:"Sucesso!",
            useBootstrap: false,
            content:"Seus Dados Foram cadastrado com sucesso!",
        });
        $('#myModal').fadeOut();
        $('.modal-backdrop').fadeOut();

         

       
    });
 } 
    //eventos  para remover Bug da classe modal Em alguns navegadores
    $('body').on('click', '.jconfirm-buttons', function () {
        var id = $('.select_teste').val();
        $('body').removeClass('.modal-open');



    });

 
});