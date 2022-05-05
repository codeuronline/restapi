function request(id_product,statut_id) {

    const old = "";
    let httpRequest = new XMLHttpRequest();
    //    requête en mode GET, construction de l'URL en récupérant l'id_product et l'id_statut directement, rendre la requête asynchrone
    httpRequest.open('GET', 'http://localhost/restapi/update/'+id_product+'/'+statut_id, true);
    
    httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');//encapsule la requête dans une entête que l'on définit dans une URL
    httpRequest.onreadystatechange = function() {
        console.log('id product->'+id_product +' id_statut->'+statut_id);
        //Si la requête a été reçu (statut 200 : réseau) et 4 : traité
        if (httpRequest.readyState == 4 && httpRequest.status == 200) {
            window.alert('id_product->'+id_product+' statut_id->'+statut_id)
           // Response
           var response = httpRequest.responseText; 
     console.log(response);    }
     };
     httpRequest.send();
    
}
    
