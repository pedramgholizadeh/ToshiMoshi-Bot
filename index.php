<html lang="en">
<head>
    <title>ToshiMoshi WebApp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bot.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/bot.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
<section id="loading">
    <div class="loader">Loading
      <span></span>
    </div>
</section>
<section id="main">
    <div id="name">
        <p>
            Wellcome, <span id="userName"></span>
        </p>
        <p>
            Level <b></b>
        </p>
    </div>
    <div id="coinLarge">
        <img src="assets/toshi.jpg" id="clickable"  onclick="tapImage()">
    </div>
    <div class="container">
        <div id="total">
        
        </div>
        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar progress-bar-striped" style=""></div>
        </div>
        
        <div id="ref">
            <a href="#">
                <img src="assets/ref.png">
                +25k / per invite (coming soon)
            </a>
        </div>
    </div>
</section>
<section id="navbar">
    <p class="points">
        Unlimited Mode until 31 June 2024
    </p>
    <p class="friends">
        You Invited <b id="invited">0</b> people!
    </p>
</section>
<section id="footer">
    <p>
        Platform: <span id="platform"></span> | Version: <span id="version"></span>
    </p>
    <p>
        Powered by P3D
    </p>
    
</section>
</body>
</html>

