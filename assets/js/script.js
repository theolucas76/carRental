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