/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {
    // pegar elemente com corpo da mensagem
    var corpo_alert = $("#alert-message");
 
    // verificar se o elemente esta presente na pagina
    if (corpo_alert.length)
        // gerar efeito para o elemento encontrado na pagina
        corpo_alert.fadeOut().fadeIn().fadeOut().fadeIn();
});