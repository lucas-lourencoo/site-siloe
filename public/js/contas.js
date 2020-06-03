// BUSCAR/FILTRAR CONTAS PAGAS

$(document).ready(function() {
    filtrar();
    //infoPagamentos();
});

$('#ordenar, #status').change(function() {
    filtrar();
});

$('#filtro-credor').keyup(function() {
    filtrar();
});

function infoPagamentos() {
    $.ajax({
        type: "POST",
        url: '../../model/consultas-ajax/consulta-contas.php',
        data: { "q": valor },
        success: function(response) {
            var rs = JSON.parse(response);
            $(".table-striped tbody").empty();
            rs.forEach(e => {
                var btn = e.status == 'Paga' ? '<a href="#" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span>  Paga</a>' : '<a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-alert"></span>  Pendente</a>';
                var markup = "<tr id='linha'><td>" + e.titulo + "   -   " + btn + "</td>" +
                    "<td>" + e.nome + "</td>" +
                    "<td>" + e.vencimento + "</td>" +
                    "<td>R$ " + e.valor + "</td>" +
                    "<td>" + e.created + "</td>" +
                    '<td><a href="#" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span> Detalhes</a></td></tr>';
                $(".table-striped tbody").append(markup);
            });


        },
    });
}



$('#pag').click(function(e) {
    alert($(e).attr('id'));
});

function filtrar() {
    var ordenar = $('#ordenar').val();
    var valor = $('#filtro-credor').val();
    var status = $('#status').val();
    var start = 0; /*$('#pag li').attr('id');*/
    var limit = 10;
    var total = 0;

    $.ajax({
        type: "POST",
        url: '../../model/consultas-ajax/consulta-contas.php',
        data: { "q": valor, "ordem": ordenar, "status": status, "start": start, "limit": limit },
        success: function(response) {
            var rs = JSON.parse(response);
            total = response[0]['rows'];
            $(".table-striped tbody").empty();
            rs.forEach(e => {
                var btn_status = e.status == 'Paga' ? '<a class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span>  Paga</a>' : '<a class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-alert"></span>  Pendente</a>';
                var btn_venceu = e.venceu ? '<a class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>  Vencido</a>' : "";
                var btn_pagar = e.status == 'Pendente' ? '<button data-toggle="modal" onclick="pagar(' + e.id + ')" data-target=".bs-modal-sm" class="pagar-conta btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span> Pagar</button>' : "";
                var markup = "<tr id='linha'><td class='desktop'>" + e.titulo + "  <br>  " + btn_status + " " + btn_venceu + "</td>" +
                    "<td>" + e.credor + "</td>" +
                    "<td>" + e.vencimento + "</td>" +
                    "<td>R$ " + e.valor + "</td>" +
                    "<td class='desktop'>" + e.created + "</td>" +
                    "<td class='desktop'>" + e.atualiazacao + "</td>" +
                    '<td class="text-center">' +
                    '<a href="adicionar-conta.php?c=' + e.id + '" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Editar</a> ' + btn_pagar + '</td></tr>';
                $(".table-striped tbody").append(markup);
            });
        }
    });
    populaPag(total);
}

function populaPag(total) {
    var paginas = Math.ceil(60 / 10);
    $('#pag').append("<li><a id='voltar'>«</a></li>");
    for (var i = 1; i <= paginas; i++) {
        $('#pag').append("<li><a class='pag' id=" + i + ">" + i + "</a></li>");
    }
    $('#1').parent().addClass('active');
    $('#pag').append("<li><a id='prox'>»</a></li>");
}


var conta = 0;

function pagar(id) {
    conta = id;
}

$("#pagar").click(function() {
    $.ajax({
        type: "POST",
        url: '../../controller/pagar-conta.php',
        data: { "conta": conta },
        success: function(response) {
            $('.modal').modal('hide');
            filtrar();
        }
    });
});