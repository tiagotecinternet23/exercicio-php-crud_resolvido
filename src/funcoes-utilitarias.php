<?php
function calcularMedia(float $valor1, float $valor2): float {
    return ($valor1 + $valor2) / 2;
}

function verificarSituacao(float $media): string {
    if ($media >= 7) {
        $situacao = "aprovado";
    } elseif ($media >= 5) {
        $situacao = "recuperacao";
    } else {
        $situacao = "reprovado";
    }
    return $situacao;
}


function formatarNotas(float $valor): string {
    return number_format($valor, 2);
}
