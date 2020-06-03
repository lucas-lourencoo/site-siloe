<?php $local = "http://$_SERVER[HTTP_HOST]"; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Acamp Siloé 2020</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000" />

    <link rel="stylesheet" href="<?php echo $local; ?>/acamp_siloe/public/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo $local; ?>/acamp_siloe/public/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?php echo $local; ?>/acamp_siloe/public/css/style.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="video-background-holder">
        <div class="video-background-overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="video.mp4" type="video/mp4">
        </video>
    </div>
    </div>

    <section class="content">
        <div class="countdown text-center">
            <img src="TEXTO2.png" class="msg" alt="">
            <div class="timer text-center">
                <div>
                    <span class="days" id="day"></span>
                    <div class="smalltext">DIAS</div>
                </div>
                <div>
                    <span class="hours" id="hour"></span>
                    <div class="smalltext">HORAS</div>
                </div>
                <div>
                    <span class="minutes" id="minute"></span>
                    <div class="smalltext">MINUTOS</div>
                </div>
                <div>
                    <span class="seconds" id="second"></span>
                    <div class="smalltext">SEGUNDOS</div>
                </div>
                <p id="time-up"></p>
            </div>
        </div>
        <!-- <h5 class="data"><span class="out">9</span>ABRIL » <span class="out">12</span>ABRIL</h6>
                <h5 class="local"><i class="fa fa-map-marker-alt"></i><span class="out"> Chácara</span> Barrios Brandl
                    </h6>
                   -->

        <div class="container">
            <div class="formulario">
                <h5 class="mt-5 mb-5 text-center">Pré-inscrição <br><span class="out">Acamp Siloé </span><span
                        class="solid">2020</span></h5>
                <form action="" id="form" method="POST">
                    <div class="col-md-6 offset-md-3 mt-3">
                        <label>Nome completo </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary"><i class="fas fa-ad"></i></button>
                            </div>
                            <input type="text" class="form-control" name="nome" id="nome">
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-3 mt-3">
                        <label>Data de nascimento</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary bt-due"><i
                                        class="fas fa-calendar-alt"></i></button>
                            </div>
                            <input type="text" class="form-control" name="nascimento" id="nascimento">
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-3 mt-3">
                        <label>Telefone WhatsApp</label>
                        <div class="input-group input-group mb-1">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary"><i class="fab fa-whatsapp"></i></button>
                            </div>
                            <div class="input-group-prepend">
                                <button type="button" id="options" class="btn btn-warning dropdown-toggle"
                                    data-toggle="dropdown">+55 BR</button>
                                <ul class="dropdown-menu" id="selectOpt">
                                    <li class="dropdown-item"><a>+55 BR</a></li>
                                    <li class="dropdown-item"><a>+595 PY</a></li>
                                </ul>
                            </div>
                            <input type="text" class="form-control" id="telefone" name="telefone">
                        </div>
                        <div class="custom-control custom-checkbox mt-0">
                            <input type="checkbox" id="ck-wp" class="custom-control-input">
                            <label class="custom-control-label font-weight-light" for="ck-wp">Não tenho
                                WhatsApp</label>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-3 mt-3">
                        <label>Congregação</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary"><i class="fas fa-church"></i></button>
                            </div>
                            <input type="text" class="form-control" placeholder="Deixar em branco caso não tiver"
                                id="congregacao" name="congregacao">
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-3 text-center mt-5 mb-5">
                        <button class="btn btn-primary" type="button" id="confirm"><i class="fas fa-check"></i>
                            PRONTO!</button>

                    </div>
                </form>
            </div> <!-- FIM FORMULARIO -->

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirme seus dados</h4>
                        </div>
                        <div class="modal-body">
                            <span class="font-weight-bold">Nome completo: </span>
                            <p id="m-nome"></p>
                            <span class="font-weight-bold">Data de nascimento: </span>
                            <p id="m-data"></p>
                            <span class="font-weight-bold">WhatsApp: </span>
                            <p id="m-telefone"></p>
                            <span class="font-weight-bold">Congregação: </span>
                            <p id="m-igreja"></p>
                        </div>
                        <div class="modal-footer text-center">
                            <div class="container"><button type="button" data-dismiss="modal" id="enviar"
                                    class="btn btn-primary"><i class="fas fa-paper-plane"></i>
                                    Enviar</button>
                                <button type="button" class="btn btn-default" id="editar" data-dismiss="modal"><i
                                        class="fas fa-edit"></i> Editar</button></div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="infos container text-center">
                <h3 class="mb-3">INFORMAÇÕES<span class="solid">/DÚVIDAS</span></h3>

                <a class="btn-acamp btn mt-3" download="cronograma-1.png" href="CRONOGRAMA1.png" title="Cronograma">
                    <i class="fa-lg fas fa-arrow-circle-down"></i> BAIXAR CRONOGRAMA <br><span>09/04 - 10/04</span>
                </a>
                <a class="btn-acamp btn mt-3" download="cronograma-2.png" href="CRONOGRAMA2.png" title="Cronograma">
                    <i class="fa-lg fas fa-arrow-circle-down"></i> BAIXAR CRONOGRAMA <br><span>11/04 - 12/04</span>
                </a>
                <a class="btn btn-acamp btn-wp btn mt-3" id="open-wp" role="button" data-toggle="collapse"
                    href="#collapse" aria-expanded="false" aria-controls="collapse">
                    <i class="fa-lg fab fa-whatsapp"></i> ENTRAR EM CONTATO VIA WHATSAPP
                </a>
                <div class="collapse" id="collapse">
                    <div class="contatos"><a class="btn btn-acamp btn-wp btn mt-3" href="https://wa.me/5567999188475">
                            <i class="fa-lg fab fa-whatsapp"></i> BRUNO MIRANDA
                        </a>
                        <a class="btn btn-acamp btn-wp btn mt-3" href="https://wa.me/5567998839756">
                            <i class="fa-lg fab fa-whatsapp"></i> GABRIELA ZIMIANI
                        </a>
                        <a class="btn btn-acamp btn-wp btn mt-3" href="https://wa.me/5567991803949">
                            <i class="fa-lg fab fa-whatsapp"></i> CRISTIANO HAAS
                        </a> </div>
                </div>



            </div>
            <div class="container footer text-center">
                <p class="sign">Design and front-end by Cristiano Haas <br>Back-end by Lucas Lourenço</p>
            </div>
        </div>
    </section>

    <script src="<?php echo $local; ?>/acamp_siloe/public/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $local; ?>/acamp_siloe/public/js/jquery.overlayScrollbars.min.js"></script>

    <script src="<?php echo $local; ?>/acamp_siloe/public/js/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo $local; ?>/acamp_siloe/public/js/jquery-validation/additional-methods.min.js"></script>
    <script src="<?php echo $local; ?>/acamp_siloe/public/js/jquery.mask.min.js"></script>
    <script src="<?php echo $local; ?>/acamp_siloe/public/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/4fa487ff39.js" crossorigin="anonymous"></script>


    <script>
    var deadline = new Date("april 9, 2020 16:00:00").getTime();
    var x = setInterval(function() {
        var currentTime = new Date().getTime();
        var t = deadline - currentTime;
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        var hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((t % (1000 * 60)) / 1000);
        document.getElementById("day").innerHTML = days;
        document.getElementById("hour").innerHTML = hours;
        document.getElementById("minute").innerHTML = minutes;
        document.getElementById("second").innerHTML = seconds;
        if (t < 0) {
            clearInterval(x);
            document.getElementById("time-up").innerHTML = "TIME UP";
            document.getElementById("day").innerHTML = '0';
            document.getElementById("hour").innerHTML = '0';
            document.getElementById("minute").innerHTML = '0';
            document.getElementById("second").innerHTML = '0';
        }
    }, 1000);

    $("#enviar").click(function() {
        $('#modal').modal('hide');
        $('#form').remove();
        /*
        $('.fa-paper-plane').removeClass('fa-paper-plane').addClass('fa-spinner');
        $('#enviar').prop("disabled", true);
        $('#editar').prop("disabled", true);
        */
        salvar();
        
    });

    $("#confirm").click(function() {
        $('#nome').val($('#nome').val().trim());

        if (!$("#form").valid()) {
            return false;
        }

        nome = $("#nome").val();
        nascimento = $("#nascimento").val();
        telefone = $("#telefone").val().trim() == "" ? "Não informado" : $("#telefone").val();
        igreja = $("#congregacao").val().trim() == "" ? "Não informado" : $("#congregacao").val().trim();
        $('#m-nome').text(nome);
        $('#m-data').text(nascimento);
        $('#m-telefone').text(telefone);
        $('#m-igreja').text(igreja);
        $('#modal').modal('show');
    });

    function salvar() {
        if (!$("#form").valid()) {
            return false;
        }

        $("#nome, #nascimento, #congregacao, #telefone").prop("disabled", true);
        $("#circle").removeAttr("hidden");
        $("#confirm").prop("hidden", true);

        $("#form").fadeOut(1600, "linear");


        enviar();

        $("#nome, #nascimento, #congregacao, #telefone").prop("disabled", false);
    }

    function enviar() {
        $.ajax({
            type: "POST",
            url: "{{ route('ajax.register') }}",
            data: {
                "nome": nome,
                "nascimento": nascimento,
                "telefone": telefone,
                "congregacao": congregacao
            },
            success: function(response) {
                if (response) {

                }
            }
        });
    }

    $('#ck-wp').change(function() {
        if ($(this).is(':checked')) {
            $("#telefone").addClass("close").removeClass("is-invalid").prop("disabled", true).val("")
                .removeAttr("placeholder");
            $("#options").prop("disabled", true);
            $('#telefone-error').remove();
        } else {
            $("#telefone").removeClass("close").prop("disabled", false);
            $("#options").prop("disabled", false);
            $("#options").text() == "+55 BR" ? $("#telefone").attr('placeholder', '( )     -    ') : $(
                "#telefone").attr('placeholder', "   -      ");
        }
    });

    $("#selectOpt li").click(function() {
        $("#options").text($(this).text());

        if ($(this).text() == "+55 BR") {
            $('#telefone').mask("(00) 0000-0000", {
                placeholder: "( )     -    "
            });
        } else {
            $('#telefone').mask("000-000000", {
                placeholder: "   -      "
            });
        }
    });



    $(document).ready(function() {
        $('#nascimento').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('#telefone').mask("(00) 00000-0000", {
            placeholder: "( )     -    "
        });

        $('#form').validate({
            rules: {
                nome: {
                    required: true,
                    minlength: 8,
                    maxlength: 50,
                    lettersonly: true
                },
                nascimento: {
                    required: true,
                    dateBR: true
                },
                telefone: {
                    required: {
                        depends: function(e) {
                            if (!$(this).is(':checked')) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    },
                },
            },
            messages: {
                nome: {
                    required: "Informe o seu nome completo",
                    minlength: "Seu nome deve conter no mínimo 8 caracteres",
                    maxlength: "Seu nome deve conter no máximo 50 caracteres",
                    lettersonly: "Insira somente letras",
                },
                nascimento: {
                    required: "Informe a sua data de nascimento",
                    dateBR: "Informe uma data válida",
                },
                telefone: {
                    required: "Informe o seu número do WhatsApp",
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.input-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });


    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-zA-Zçáéíóúãõñ ]*$/i.test(value);
    }, "Letters only please");

    function dateBR(value, element) {
        return this.optional(element) ||
            /^(?:(?:(?:(?:31\/(?:0?[13578]|1[02]))|(?:(?:29|30)\/(?:0?[13-9]|1[0-2])))\/(?:1[6-9]|[2-9]\d)\d{2})|(?:29\/0?2\/(?:(?:(1[6-9]|[2-9]\d)(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))|(?:0?[1-9]|1\d|2[0-8])\/(?:(?:0?[1-9])|(?:1[0-2]))\/(?:(?:1[6-9]|[2-9]\d)\d{2}))$/
            .test(value);
    }
    $.validator.addMethod("dateBR", dateBR, "MSG PERSO.");
    $.validator.addClassRules("dateBR", {
        dateBR: true
    });
    </script>

</body>

</html