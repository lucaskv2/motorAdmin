<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="../CSS/index.css" rel="stylesheet" type="text/css">
    <title>Vite App</title>
</head>
<body>

<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    min-width:100vw;
    min-height: 100vh;
    background-color: aqua;
}
li{
    list-style: none;
}
a{
    text-decoration: none;
}
ul li{
    display: inline;
}
button{
  background: rgba(255,255,255,0.12);
  color: #fff;
  border-radius: 24px;
  padding: 10px 28px;
}
:root{
    --primary-color:#FFF;
    --primary-color-alternative:#F1F1F1;
    --back-ground-color:#A5F300;
    --back-ground-color-alternative:#A5F344;
}

.navigation-bar{
    align-items: center;
    justify-content:center ;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    background-color: #00f324;
    height: 10vh;
    width: 100vw;
    padding: 0 40px;
    text-transform: uppercase;
}

.navigation-list{
    border: solid black 2px;
    border-radius: 24px;
  padding: 10px 28px;
    
}

.navigation-list li{
    margin: 0 10px;
}

.section{
    min-height: 50vh;
    min-width: 100%;
}

.hero-section{
    min-height: 100vh;
}
nav{
    z-index: 100;
    position: fixed;
}
</style>
  <header>
        <nav class="navigation-bar">
            <div class="logo">
                <a href="#">LOGO</a>
            </div>
            <ul class="navigation-list">
                <li><a href="#">Inicio</a></li>
                <li><a href="../PAGES/sobre-nosotros.php">Sobre Nosotros</a></li>
                <li><a href="../PAGES/turnos.php">Turnos</a></li>
                <li><a href="../PAGES/servicios.php">Servicios</a></li>
                <li><a href="../PAGES/resenia.php">Reseña</a></li>
                <li><a href="../PAGES/contacto.php">Contacto</a></li>
            </ul>
            <div class="loging">
                <button>Iniciar</button>
            </div> 
        </nav>
    </header>  
