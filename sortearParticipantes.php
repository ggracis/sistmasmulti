<?php
require_once( 'requires.php' );
abrirHtml( 'Sortear ganador - CAME', '' );
//cabecera();
?>
<link href="assets/css/estilosPremios.css?v=291222" rel="stylesheet">


<div class="contenedor">
    <div class="caja">
        <div class="row"></div>
        <div class="row" id="ganador">
            <?php verGanador();	?>
        </div>
        <div class="row"></div>

        <button id="btnSortear" type="button" class="btn btn-success btn-lg" style="">SORTEAR</button>

        <button id="btnSortearNuevamente" type="button" class="btn btn-light btn-lg" style="display: none;">VOLVER A
            SORTEAR</button>
    </div>
</div>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
<?php
//footer();
cerrarHtml();
?>
<script>
var words = [""];
var cantidadTotal = 0;
$(function() {
    $.getJSON("premios.json?1.0.0", function(data) {
        $.each(data, function() {
            $.each(this, function(key, value) {
                var nombres = value.nombre;
                words.push(nombres);
                console.log(words);
                cantidadTotal = words.length;
            });
        });
    });
});

//window.setTimeout( SortearParticipante, 3000 );
$("#btnSortear").click(function() {
    SortearParticipante();
});

$("#btnSortearNuevamente").click(function() {
    location.reload();
});

function SortearParticipante() {
    $("#btnSortear").hide();
    $("#btnSortearNuevamente").show();
    $('.letters-wrapper').text("Sorteando...");
    console.log("Sorteando...");

    var minNumber = 1; // le minimum
    var maxNumber = cantidadTotal - 1; // le maximum
    var wordIndex = Math.floor(Math.random() * maxNumber + minNumber); // la fonction magique



    var URLlink = "listaParticipantes.php?borrarNombre=" + words[wordIndex];
    $.ajax({
        url: URLlink,
        type: 'POST',
        success: function() {
            console.log("Borrado: " + URLlink);
        }
    });

    var URLlink2 = "listaParticipantes.php?borrarNombre=" + words[wordIndex] + " ";
    $.ajax({
        url: URLlink2,
        type: 'POST',
        success: function() {
            console.log("Borrado: " + URLlink2);
        }
    })

    console.log("Minimo: " + minNumber + " Maximo: " + maxNumber + " Cantidad: " + words.length + " Ganador: " +
        wordIndex + " Nombre: " + words[wordIndex])
    var randTime = 4000; //how long each letter should shuffle

    $('.letters-wrapper').html("random").css({
        width: "random".length / 2 * 85 + "px"
    });

    $('.letters-wrapper').html("").css({
        width: words[wordIndex].length / 2 * 85 + "px"
    });

    var letters = words[wordIndex].split("");

    letters.forEach(function(letter) {
        $('.letters-wrapper').append('<span class="letter">' + letter + "</span>");
    });

    $('.letter').each(function() {
        var l = $(this);
        setTimeout(function() {
            clearInterval(randomize);
            l.text(letters[l.index()]);
        }, randTime);

        function getRndInteger(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        var randomize = setInterval(function() {
            //l.text(String.fromCharCode(Math.floor(Math.random() * (126 - 33)) + 9));
            l.text(String.fromCharCode(getRndInteger(65, 90)));
        }, 50);

    });


};



//SortearParticipante();
</script>
