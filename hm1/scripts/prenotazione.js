function prenotazione(event){
    event.currenttarget.removeEventListener("sumbit",prenota);
    fetch("prenotazioni.php").then(fetchResponse).then(prenotazioneJson);
}

function prenotazioneJson(response){
    if(!response.ok){return null};
    return response.json();
}
function Json(json){

}

const button = document.querySelector("#button");
button.addEventListener("submit",prenotazione);