<!DOCTYPE html>
<?php $decompte=60;
function counter($timer){
    
}
setcookie("decompte",$decompte,30)?> <html>



<head>

    <script language="JavaScript">
    // Début
    tempsFermeture = 10;
    // Fermer le PopUp après 10 de secondes?
    // Mettre 0 pour ne pas fermer le PopUp

    function Debute(URL, WIDTH, HEIGHT) {
        propFenetre = "left=50,top=50,width=" + WIDTH + ",height=" + HEIGHT;
        pub = window.open(URL, "decompte", propFenetre);
        if (tempsFermeture) setTimeout("decompte.close();", tempsFermeture * 1000);
    }

    function PopUp() {
        url = "http://localhost/restapi/decompte.php";
        width = 267; // largeur du PopUp en pixels
        height = 103; // hauteur du PopUp en pixels
        delay = 2; // temps en seconde avant l’ouverture du PopUp
        timer = setTimeout("Debute(url, width, height)", delay * 1000);
    }
    // Fin 
    </script>
</head>

<body onLoad="PopUp();">

    Page HTML courante...

</body>

</html>