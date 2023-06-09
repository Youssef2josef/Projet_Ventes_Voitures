<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    button {
        margin: 100px;
    }
    </style>
</head>

<body>
    <audio id="myAudio" src="./Car_Engine.mp3"></audio>

    <img src="./images/voitures/Stop_Engine.png" id="startButton"></img>
    <script>
    var audio = document.getElementById("myAudio");
    var startButton = document.getElementById("startButton");
    var stopButton = document.getElementById("stopButton");

    startButton.addEventListener("click", function() {
        audio.play();
    });

    stopButton.addEventListener("click", function() {
        audio.pause();
        audio.currentTime = 0;
    });
    </script>
</body>

</html>