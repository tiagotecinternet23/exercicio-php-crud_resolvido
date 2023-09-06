/* Selecionando os elementos a serem manipulados via JS.
Usamos o querySelector para acessá-los através de seletores conhecidos
(tag, id). Poderia ser feito com getElementById desde que cada
elemento tenha um id. */
const formulario = document.querySelector("form");
const inputPrimeira = formulario.querySelector("#primeira");
const inputSegunda = formulario.querySelector("#segunda");
const inputMedia = formulario.querySelector("#media");
const inputSituacao = formulario.querySelector("#situacao");

/* Declarando variáveis para lidar com os novos
valores que serão digitados (primeira e segunda) 
e/ou alterados (media e situacao) */
let primeira, segunda, media, situacao;

/* Funções para atualização da média e da situação */
function atualizarMedia(nota1, nota2){
    return (nota1 + nota2) / 2;
}

function atualizarSituacao(resultadoDaMedia){
    if(resultadoDaMedia >= 7){
        situacao = "aprovado";
    } else if(resultadoDaMedia >= 5){
        situacao = "recuperacao";
    } else {
        situacao = "reprovado";
    }
    return situacao;
}

/* Manipulando os eventos de captura/digitação em tempo real */

// Monitorando o valor digitado no campo de primeira nota
inputPrimeira.addEventListener("input", function(){

    // Capturando o valor digitado e garantindo que é número
    primeira = parseFloat(this.value);

    // Passando a nova primeira nota (digitada) e a segunda nota (já existente no segundo campo) para a função de atualizar a média
    media = atualizarMedia(primeira, parseFloat(inputSegunda.value));

    // Exibindo a nova média no campo readonly de média
    inputMedia.value = media.toFixed(2);

    // Exibindo a nova situação no campo readonly de situação
    inputSituacao.value = atualizarSituacao(media);
});

// Monitorando o valor digitado no campo de segunda nota
inputSegunda.addEventListener("input", function(){

    // Capturando o valor digitado e garantindo que é número
    segunda = parseFloat(this.value);

    // Passando a nova segunda nota (digitada) e a primeira nota (já existente no primeiro campo) para a função de atualizar a média
    media = atualizarMedia(parseFloat(inputPrimeira.value), segunda);

    // Exibindo a nova média no campo readonly de média
    inputMedia.value = media.toFixed(2);

    // Exibindo a nova situação no campo readonly de situação
    inputSituacao.value = atualizarSituacao(media);
});