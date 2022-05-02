function request(id_product,id_statut) {
    let http = new XMLHttpRequest();
    http.open("Get", "request.php?id_product=" + id_product + "&id_statut=" + id_statut, true);
    http.responseType = "json";
    http.send();
    http.onload = function () {

        if ((http.id_statut != 200) && (http.readyState != 4)) {
            console.log("Erreur " + http.id_statut + " : " + http.statusText);
        } else {
            console.log('response = ' + http.response);
            if (http.response == true) {

                window.alert(id_product + ' ' + id_statut + "nouveau statut");
            } else {
                window.alert(id_product+" "+id_statut + " inéxistant");
            }
        }
    }

}