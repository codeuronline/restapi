<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <title>Mon premier timer JavaScript</title>
    </head>

    <body>
        <div id="timer"></div>

    </body>

    </html>
    <script>
    let allcookies = document.cookie;
    alert(allcookies);

    let temps = 30;
    const timerElement = document.getElementById("timer")

    function diminuerTemps() {
        if (temps == 0) {
            timerElement.innerHTML = "temps ecoulé cookie detruit";
            allcookies.removed();
        } else {
            timerElement.innerText = temps;
            temps--;
        }
    }

    setInterval(diminuerTemps, 1000);
    </script>
</body>