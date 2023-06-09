<!DOCTYPE html>
<html>

<head>
    <style>
    .container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .box {
        width: 100px;
        height: 100px;
        background-color: blue;
    }

    .buttons {
        text-align: center;
    }

    @keyframes slideIn {
        0% {
            transform: translateX(-200px);
        }

        100% {
            transform: translateX(0);
        }
    }
    </style>
</head>

<body>
    <div class=" container">
        <div id="div1" class="box">Div 1</div>
        <div id="div2" class="box">Div 2</div>
        <div id="div3" class="box">Div 3</div>
        <div id="div4" class="box">Div 4</div>
    </div>

    <div class="buttons">
        <button onclick="changeDiv(1)">Div 1</button>
        <button onclick="changeDiv(2)">Div 2</button>
        <button onclick="changeDiv(3)">Div 3</button>
        <button onclick="changeDiv(4)">Div 4</button>
    </div>

    <script>
    function changeDiv(divNumber) {
        var activeDiv = document.querySelector('.active');
        if (activeDiv) {
            activeDiv.classList.remove('active');
        }
        var targetDiv = document.getElementById('box' + divNumber);
        targetDiv.classList.add('active');
    }
    </script>
</body>

</html>