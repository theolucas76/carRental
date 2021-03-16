function showClient(){

    document.getElementById('client').style.display = "block";
    document.getElementById('voiture').style.display = "none";
    document.getElementById('resa').style.display = "none";

}

function showCar(){

    document.getElementById('voiture').style.display = "block";
    document.getElementById('client').style.display = "none";
    document.getElementById('resa').style.display = "none";

}

function showResa(){

    document.getElementById('resa').style.display = "block";
    document.getElementById('client').style.display = "none";
    document.getElementById('voiture').style.display = "none";

}

function updateCli(id){

    document.getElementById('updateCli'+id).style.display = 'table-row';

}

function hideUpdate(id){

    document.getElementById('updateCli'+id).style.display = "none";

}

function updateCar(id){

    document.getElementById('updateCar'+id).style.display = "table-row";

}
function hideUpdateCar(id){

    document.getElementById('updateCar'+id).style.display = "none";

}

function updateResa(id){

    document.getElementById('updateResa'+id).style.display = "table-row";

}
function hideUpdateResa(id){

    document.getElementById('updateResa'+id).style.display = "none";

}

function newCar(){

    document.getElementById('newCar').style.display = "block";

}

function newResa(){

    document.getElementById('newResa').style.display = "block";

}

function allCar(){

    document.getElementById('allCar').style.display = "block";
    document.getElementById('searchCar').style.display = "none";

}

function searchCar(){

    document.getElementById('allCar').style.display = "none";
    document.getElementById('searchCar').style.display = "block";

}

function allClient(){

    document.getElementById('allClient').style.display = "block";
    document.getElementById('searchCar').style.display = "none";

}

function searchClient(){

    document.getElementById('searchClient').style.display = "block";
    document.getElementById('allClient').style.display = "none";

}

function allResa(){

    document.getElementById('allResa').style.display = "block";
    document.getElementById('searchResa').style.display = "none";

}

function searchResa(){

    document.getElementById('searchResa').style.display = "block";
    document.getElementById('allResa').style.display = "none";
}

function updateProfil(){

    document.getElementById('modifProfil').style.display = "block";
    document.getElementById('profil').style.display = "none";
}

function showFormResa(){

    document.getElementById('reserv').style.display = "block";
}