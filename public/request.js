function request(id_product,statut_id) {

    let statut_name = ["En cours d'approvisionnement", "En stock","Epuisé","Retiré des rayon"];
    let httpRequest = new XMLHttpRequest();
    //    requête en mode GET, construction de l'URL en récupérant l'id_product et l'id_statut directement, rendre la requête asynchrone
    httpRequest.open('GET', 'http://localhost/restapi/update/'+id_product+'/'+statut_id, true);
    
    httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');//encapsule la requête dans une entête que l'on définit dans une URL
    httpRequest.onreadystatechange = function() {
        console.log('id product->'+id_product +' id_statut->'+statut_id);
        //Si la requête a été reçu (statut 200 : réseau) et 4 : traité
        if (httpRequest.readyState == 4 && httpRequest.status == 200) {
            //statut_id -1 -> car le tableau commence a 0 et que les etats du coté interface sont défini à partir de 1
            window.alert('nouveau statut du produit : '+statut_name[statut_id-1])
           // Response
           var response = httpRequest.responseText; 
            console.log(response);    }
     };
     httpRequest.send();
    
}
function request_category(id_category) {
    let httpRequest = new XMLHttpRequest();
    console.log(id_category);
    httpRequest.open('GET', 'http://localhost/restapi/products/request/' + id_category, true);
    window.alert("http://localhost/restapi/products/request/" + id_category);
    httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');//encapsule la requête dans une entête que l'on définit dans une URL
    httpRequest.onreadystatechange = function () {
        console.log('id_category->' + id_category);
        //Si la requête a été reçu (statut 200 : réseau) et 4 : traité
        if (httpRequest.readyState == 4 && httpRequest.status == 200) {
            // Response
            var response = httpRequest.responseText;
            window.alert('nouveau classement par catégorie : ' + id_category);
            console.log(response);
        }
        httpRequest.send();
    }
}    
