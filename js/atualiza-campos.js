const form = document.querySelector("form");
const inputPrimeira = form.querySelector("#primeira");
const inputSegunda = form.querySelector("#segunda");
const inputMedia = form.querySelector("#media");
const inputSituacao = form.querySelector("#situacao");

let primeira, segunda, media, situacao;
const atualizaMedia = (primeira, segunda) => (primeira+segunda) / 2;
// const atualizaSituacao = media => media>=7?'aprovado':'reprovado';
const atualizaSituacao = media => {
    if(media >= 7){
        situacao = "aprovado";
    } else if(media >= 5 && media < 7){
        situacao = "recuperacao";
    } else {
        situacao = "reprovado";
    }
  
    return situacao;    
};

inputPrimeira.addEventListener("input", function(){
    primeira = parseFloat(this.value);
    media = atualizaMedia(primeira, parseFloat(inputSegunda.value));
    inputMedia.value = media.toFixed(2);
    inputSituacao.value = atualizaSituacao(media);
});

inputSegunda.addEventListener("input", function(){
    segunda = parseFloat(this.value);    
    media = atualizaMedia(parseFloat(inputPrimeira.value), segunda);
    inputMedia.value = media.toFixed(2);
    inputSituacao.value = atualizaSituacao(media);
});