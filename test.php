<!DOCTYPE html>
<html>

<head>
    <style>
    .slider-container {
        margin-bottom: 20px;
    }

    input[type="range"] {
        width: 200px;
    }

    label {
        display: block;
    }

    h1 {
        text-align: center;
    }
    </style>
</head>

<body>
    <h1>Slider pour les phares et l'effet sonore du moteur</h1>

    <div class="slider-container">
        <input type="range" min="0" max="1" step="1" value="0" id="headlight-slider">
        <label for="headlight-slider">Phares</label>
    </div>

    <div class="slider-container">
        <img src="./images/voitures/engine.png" id="engine-sound-slider">
        <label for="engine-sound-slider">Effet sonore du moteur</label>
    </div>

    <audio id="engine-sound" src="./Car_Engine.mp3"></audio>

    <script>
    // Récupération des éléments du DOM
    const headlightSlider = document.getElementById('headlight-slider');
    const engineSoundSlider = document.getElementById('engine-sound-slider');
    const engineSound = document.getElementById('engine-sound');

    // Écoute des événements de changement de valeur des curseurs
    headlightSlider.addEventListener('change', function() {
        toggleHeadlights();
    });

    engineSoundSlider.addEventListener('change', function() {
        toggleEngineSound();
    });

    // Fonction pour activer/désactiver les phares
    function toggleHeadlights() {
        const value = headlightSlider.value;
        if (value === "1") {
            // Phares allumés
            document.body.classList.add('headlights-on');
        } else {
            // Phares éteints
            document.body.classList.remove('headlights-on');
        }
    }

    // Fonction pour activer/désactiver l'effet sonore du moteur
    function toggleEngineSound() {
        const value = engineSoundSlider.value;
        if (value === "1") {
            // Jouer l'effet sonore du moteur
            engineSound.play();
        } else {
            // Arrêter l'effet sonore du moteur
            engineSound.pause();
            engineSound.currentTime = 0;
        }
    }
    </script>
</body>

</html>