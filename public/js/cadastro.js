/* CADASTRAR UMA NOVA CONTA */
$('#adicionar').click(function() {

    if (!$("#addConta").valid() || !validaSelect()) {
        return false;
    }

    var vencimento = $('#vencimento').val();
    var titulo = $('#titulo').val();
    var valor = $('#valor').val();
    var coment = $('#comentario').val();
    var credor = $('#credor').val();

    $.ajax({
        type: "POST",
        url: '../../controller/cadastrar-conta.php',
        data: { "titulo": titulo, "coment": coment, "vencimento": vencimento, "valor": valor, "credor": credor },
        success: function(response) {
            if (response == 1) {
                $(".msg").append('<div class="error-notice"><div class="oaerror success"></div></div>');
                $(".oaerror").html('Conta cadastrada com sucesso');
                limpar();
                populaCredor();
            } else {
                alert(response);
            }
        },
    });
    return true;
});


$('#limpar').click(function() {
    limpar();
});

function limpar() {
    $('#titulo').val("");
    $('#valor').val("");
    $('#vencimento').val("");
    $('#comentario').val("");
}

function populaCredor(opt) {
    $.ajax({
        type: "POST",
        url: '../../model/consultas-ajax/consulta-credores.php',
        success: function(response) {
            var rs = JSON.parse(response);
            $('#credor').val(null);
            rs.forEach(e => {
                $('#credor').append(new Option(e.credor, e.id, true, true));
            });
            $('#credor').val(opt);
        },
    });
}


$('select').on('change', function() {
    validaSelect();
});

$('#adicionar').click(function() {
    validaSelect();
});

function validaSelect() {
    $('#credor-error').remove();
    if ($('#credor').val() == 0 || $("#credor option:selected").text() == "") {
        $(".select2-selection--single , .select2-dropdown").css("border", "solid 1px #a94442");
        $('.group-select2').append('<label id="credor-error">Selecione um credor</label>');
        return false;
    } else {
        $(".select2-selection--single").css("border", "");
        return true;
    }
}

/* VALIDAÇÃO DOS CAMPOS */
$("#addConta").validate({
    rules: {
        titulo: "required",
        valor: "required",
        vencimento: {
            required: true,
            dateBR: true /* ADDITIONAL METHOD */
        }
    },
    messages: {
        titulo: "Preencha este campo",
        valor: "Insira um valor",
        vencimento: {
            required: "Selecione uma data",
            dateBR: "Insira uma data válida" /* ADDITIONAL METHOD */
        }
    },

});

/* ADD NOVO MÉTODO PARA VALIDAR A DATA (VENCIMENTO) */
function dateBR(value, element) {
    return this.optional(element) || /^(?:(?:(?:(?:31\/(?:0?[13578]|1[02]))|(?:(?:29|30)\/(?:0?[13-9]|1[0-2])))\/(?:1[6-9]|[2-9]\d)\d{2})|(?:29\/0?2\/(?:(?:(1[6-9]|[2-9]\d)(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))|(?:0?[1-9]|1\d|2[0-8])\/(?:(?:0?[1-9])|(?:1[0-2]))\/(?:(?:1[6-9]|[2-9]\d)\d{2}))$/.test(value);
}
$.validator.addMethod("dateBR", dateBR, "Please enter a date in the format dd/mm/yyyy.");
$.validator.addClassRules("dateBR", { dateBR: true });





/* --------------------------------------------------------------------------------- */
/* -------------------------- FUNÇÕES DE ATUALIZAÇãO --------------------------------*/
/* --------------------------------------------------------------------------------- */


/* FUNCOES ATUALIZAR */
$('#voltar').click(function() {
    window.history.back();
});

/* SALVA OS DADOS QUE ESTãO SENDO ATUALIZADOS */
$('#salvar').click(function() {

    if (!$("#addConta").valid() || !validaSelect()) {
        return false;
    }
    var id = $('#id').val();
    var vencimento = $('#vencimento').val();
    var titulo = $('#titulo').val();
    var valor = $('#valor').val();
    var coment = $('#comentario').val();
    var credor = $('#credor').val();
    var created = $('#created').val();

    $.ajax({
        type: "POST",
        url: '../../controller/atualizar-conta.php',
        data: { "id": id, "titulo": titulo, "coment": coment, "vencimento": vencimento, "valor": valor, "credor": credor },
        success: function(response) {
            window.location.href = "../contas";
        },
    });
    return true;
});


$(document).ready(function() {
    $('.select').select2({
        tags: true
    });
    populaCredor($('#credor_id').val());
    $('#valor').mask("#.##0,00", { reverse: true });
    $('#vencimento').mask("00/00/0000", { placeholder: "__/__/____" });

});