/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function editProfile() {

    password = $("#newPassword");
    repeatPassword = $("#repeatNewPassword");
    età = $("#età");
    peso = $("#peso");
    altezza = $("#altezza");

    newPasswordMsg = $("#differentPassword");
    etàMsg = $("#wrongEtà");
    pesoMsg = $("#wrongPeso");
    altezzaMsg = $("#wrongAltezza");

    var regularExpression = new RegExp("^([0-9]+)$", "g");
    var regularExpressionPeso = new RegExp("^([0-9]+)\.?([0-9]+)$", "g");

    if (document.getElementById('newPassword').value !== document.getElementById('repeatNewPassword').value) {
        newPasswordMsg.html("The two password must be the same");
        etàMsg.html("");
        pesoMsg.html("");
        altezzaMsg.html("");
    } else if (!regularExpression.test(document.getElementById('età').value)) {
        newPasswordMsg.html("");
        etàMsg.html("Insert only numbers");
        pesoMsg.html("");
        altezzaMsg.html("");
    } else if (!document.getElementById('peso').value.match(regularExpressionPeso)) {
        newPasswordMsg.html("");
        etàMsg.html("");
        pesoMsg.html("Insert only numbers, decimal part preeced bt . or ,");
        altezzaMsg.html("");
    } else if (!document.getElementById('altezza').value.match(regularExpression)) {
        newPasswordMsg.html("");
        etàMsg.html("");
        pesoMsg.html("");
        altezzaMsg.html("Insert height in number, expressed in cm");
    } else {
        callFunc();
        newPasswordMsg.html("");
        etàMsg.html("");
        pesoMsg.html("");
        altezzaMsg.html("");

    }

    function callFunc() {

        $('#confermaModifica').appendTo('body').modal('show');
    }

}

function appendFormScheda() {

    const riga = document.createElement("tr");
    const col1 = document.createElement("td");
    const col2 = document.createElement("td");
    const col3 = document.createElement("td");
    const col4 = document.createElement("td");
    const col5 = document.createElement("td");

    var nome = document.createElement("input"); //input element, text
    nome.setAttribute('type', "text");
    nome.setAttribute('name', "nome[]");
    nome.setAttribute('width', "45%");
    nome.setAttribute('class', "form-control");
    var spanNome = document.createElement("span");
    spanNome.setAttribute('name', "wrongNome");
    nome.appendChild(spanNome);
    col1.appendChild(nome);

    var serie = document.createElement("input"); //input element, text
    serie.setAttribute('type', "text");
    serie.setAttribute('name', "serie[]");
    serie.setAttribute('width', "15%");
    serie.setAttribute('class', "form-control");
    var spanSerie = document.createElement("span");
    spanSerie.setAttribute('name', "wrongSerie");
    serie.appendChild(spanSerie);
    col2.appendChild(serie);

    var ripetizioni = document.createElement("input"); //input element, text
    ripetizioni.setAttribute('type', "text");
    ripetizioni.setAttribute('name', "ripetizioni[]");
    ripetizioni.setAttribute('width', "15%");
    ripetizioni.setAttribute('class', "form-control");
    var spanRipetizioni = document.createElement("span");
    spanRipetizioni.setAttribute('name', "wrongRipetizioni");
    ripetizioni.appendChild(spanRipetizioni);
    col3.appendChild(ripetizioni);

    var recupero = document.createElement("input"); //input element, text
    recupero.setAttribute('type', "text");
    recupero.setAttribute('name', "recupero[]");
    recupero.setAttribute('width', "15%");
    recupero.setAttribute('class', "form-control");
    var spanRecupero = document.createElement("span");
    spanRecupero.setAttribute('name', "wrongRecupero");
    recupero.appendChild(spanRecupero);
    col4.appendChild(recupero);

    var elimina = document.createElement("input"); //input element, Submit button
    elimina.setAttribute('type', "submit");
    elimina.setAttribute('value', "Elimina");
    elimina.setAttribute('width', "15%");
    elimina.setAttribute('class', "btn btn-danger col-md-12");
    elimina.setAttribute('onclick', "deleteRow(this);");
    col5.appendChild(elimina);

    riga.appendChild(col1);
    riga.appendChild(col2);
    riga.appendChild(col3);
    riga.appendChild(col4);
    riga.appendChild(col5);

    document.getElementsByTagName('tbody')[0].appendChild(riga);
}

function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function saveScheda() {

    var nome = document.getElementsByName("nome");
    var serie = document.getElementsByName("serie");
    var ripetizioni = document.getElementsByName("ripetizioni");
    var recupero = document.getElementsByName("recupero");

    var regularExpression = new RegExp("^[0-9]+[ ]*$", "g");
    var regularExpressionNome = new RegExp("^[a-zA-Z]+[ ]*(([',. -][a-zA-Z ])?[a-zA-Z]*)*$", "g");

    var nomeMsg = document.getElementsByName("wrongNome");
    var serieMsg = document.getElementsByName("wrongSerie");
    var ripetizioniMsg = document.getElementsByName("wrongRipetizioni");
    var recuperoMsg = document.getElementsByName("wrongRecupero");

    for (var i = 0; i < nome.length; i++) {
        if (!/^[a-zA-Z(\s)*]+$/.test(nome[i].value)) {
            nomeMsg.item(i).innerHTML = "Insert only letters";
        } else nomeMsg.item(i).innerHTML = "";
        if (!/^[0-9]+$/.test(serie.item(i).value)) {
            serieMsg.item(i).innerHTML = "Insert only numbers";
        } else serieMsg.item(i).innerHTML = "";
        if (!/^[0-9]+$/.test(ripetizioni.item(i).value)) {
            ripetizioniMsg.item(i).innerHTML = "Insert only numbers";
        } else ripetizioniMsg.item(i).innerHTML = "";
        if (!/^[0-9]+$/.test(recupero.item(i).value)) {
            recuperoMsg.item(i).innerHTML = "Insert only numbers";
        } else recuperoMsg.item(i).innerHTML = "";
    }

}

function calcola(){
    
    var fabbisognoCaloricoGiornalieroP = document.createElement("p");
    fabbisognoCaloricoGiornalieroP.setAttribute("class", "h1");
    var indiceMassaCorporeaP = document.createElement("p");
    indiceMassaCorporeaP.setAttribute("class", "h1");
    
    var fabbisognoCaloricoGiornalieroTitolo = document.createElement("p");
    fabbisognoCaloricoGiornalieroTitolo.setAttribute("class", "h3");
    var indiceMassaCorporeaTitolo = document.createElement("p");
    indiceMassaCorporeaTitolo.setAttribute("class", "h3");
    
    var età = document.getElementById("età").value;
    var peso = document.getElementById("peso").value;
    var altezza = document.getElementById("altezza").value;
    var sesso = document.getElementById("sesso").value;
    var stileDiVita = document.getElementById("stileDiVita").value;
    var altezzaInMetri = altezza/100;
    var pesoInLibre = peso*2.2;
    
    if(document.getElementById("stileDiVita").value==="Sedentario - sempre seduto"){
        if(document.getElementById("sesso").value==="uomo"){
            var fabbisognoCaloricoGiornaliero = pesoInLibre*10;
        }else{
            var fabbisognoCaloricoGiornaliero = pesoInLibre*11;
        }
    }else if(stileDiVita.valueOf()==="Attività moderata - 10 mila passi o 3 giorni in palestra"){
        if(sesso.valueOf()==="uomo"){
            var fabbisognoCaloricoGiornaliero = pesoInLibre*13;
        }else{
            var fabbisognoCaloricoGiornaliero = pesoInLibre*14;
        }
    }else {
        if(sesso.valueOf()==="uomo"){
            var fabbisognoCaloricoGiornaliero = pesoInLibre*18;
        }else{
            var fabbisognoCaloricoGiornaliero = pesoInLibre*16;
        }
    }
    
    fabbisognoCaloricoGiornaliero = Math.round((fabbisognoCaloricoGiornaliero + Number.EPSILON) * 100) / 100;
    var indiceMassaCorporea = Math.round((peso/(altezzaInMetri*altezzaInMetri) + Number.EPSILON) * 100) / 100;
    
    fabbisognoCaloricoGiornalieroTitolo.innerHTML="Fabbisogno Calorico Giornaliero:";
    indiceMassaCorporeaTitolo.innerHTML="Indice di Massa Corporea:";
    
    fabbisognoCaloricoGiornalieroP.innerHTML=fabbisognoCaloricoGiornaliero + " Kcal";
    indiceMassaCorporeaP.innerHTML=indiceMassaCorporea;
    
    document.getElementById("fabbisognoCaloricoGiornalieroTitolo").innerHTML="";
    document.getElementById("indiceMassaCorporeaTitolo").innerHTML="";
    document.getElementById("fabbisognoCaloricoGiornaliero").innerHTML="";
    document.getElementById("indiceMassaCorporea").innerHTML="";
    
    document.getElementById("fabbisognoCaloricoGiornalieroTitolo").appendChild(fabbisognoCaloricoGiornalieroTitolo);
    document.getElementById("indiceMassaCorporeaTitolo").appendChild(indiceMassaCorporeaTitolo);
    document.getElementById("fabbisognoCaloricoGiornaliero").appendChild(fabbisognoCaloricoGiornalieroP);
    document.getElementById("indiceMassaCorporea").appendChild(indiceMassaCorporeaP);
    
    
}