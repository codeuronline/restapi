function request(id_product,id_statut) {
    
    // //method post
    // let postObj = { 
    //     id: id_product, 
    //     statut_id: id_statut 
        
    // }
    // let post = JSON.stringify(postObj);
    // const url = "http://localhost/restapi/request.php"
    // let xhr = new XMLHttpRequest()
    // xhr.open("post", url, true);
    // xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8');
    // xhr.send(post);
    // xhr.onload = function () {
    //     if (xhr.status === 201) {
    //         console.log("Post successfully created!")
    //     }
    // }
    //requete en get
    let http = new XMLHttpRequest();
    http.open("GET", "http://localhost/restapi/update/" + id_product + "/" + id_statut, true);
    http.responseType = "json";
    http.send();
    http.onload = function () {
        if ((http.status != 200) && (http.readyState != 4)) {
            console.log("Erreur " + http.id_statut + " : " + http.statusText);
        } else {
            console.log('response = ' + http.response);
            console.log("http://localhost/restapi/update/" + id_product + "/" + id_statut, true)
            if (http.response == true) {

                window.alert(id_product + ' ' + id_statut + "nouveau status");
            } else {
                window.alert(id_product+ " " + id_statut + " inéxistant");
            }
        }
    }

}