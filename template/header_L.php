<?php 
$url_base="http://localhost/Proyecto_Pago/";
?>
<!doctype html>
<html lang="es">
<head>
  <title>Superlative</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./css/bulma.min.css">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;800&display=swap');

*{
font-family: 'Manrope', sans-serif;   
      }
      body{
        background-color: black;
      }
    /* Division = index.php(noticias)*/  
    .photo-container {
      display: inline-block;
      margin: 10px;
    }
    
    .styled-img {
      width: 200px;
      height: auto;
    }
    
    .photo-container p {
      font-size: 20px;
      color: red;
    }
    .titulos{
    text-align: center;
    background-color: whitesmoke;
    color: transparent;
    -webkit-background-clip: text;
    background-clip: text;
    font-size: 3.5rem;
    text-transform: uppercase;
    padding: 1rem;
    }
    /* Division = index.php(noticias)*/
    /* Division = Ver_Mas.php(noticias)*/
  .photo-container-2 {
  color: aliceblue;
  display: flex;
  width: 100%;
  height: 25rem;
  justify-content: center;
}

.styled-img-2 {
  width: 0px;
  flex-grow: 1;
  object-fit:fill;
  opacity: .8;
  transition: .5s ease;
}

.photo-container-2 p {
  text-align: center;
  position: absolute;
  bottom: 15%;
  height: 7.5%;
  left: 0;
  font-size: 1.5rem;
  width: 100%;
  background-color:rgba(100, 50, 0, 0.8);
  color: white;
}
.contenido{
  text-align: center;
        background-color: rgb(255, 255, 255);
        color: transparent;
        -webkit-background-clip: text;
        background-clip: text;
        font-size: 1rem;
        text-transform: uppercase;
        padding: .5rem;
}
/* Division = Ver_Mas.php(noticias)*/
  </style>
</head>
<div class="bg-black text-white">   
<body>
<nav class="navbar navbar-expand bg-white text-black">
<ul class="nav navbar-nav">
      <li class="nav-item">
            <a class="nav-link active" href="<?php echo $url_base;?>usuarios/" aria-current="page">
                <img src="..\..\imagenes\S.png" alt="Logo" width="50" height="50">
                <span class="visually-hidden">(current)</span>
            </a>
        </li>
        <li class="nav-item ">
    <a class="nav-link fs-5 text-black" href="<?php echo $url_base;?>usuarios/Productos/" href="#">Productos</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link fs-5 text-black" href="<?php echo $url_base;?>usuarios/fotos">Noticias</a>
  </li>
  <li class="nav-item ">
  <a class="nav-link fs-5 text-black" href="<?php echo $url_base;?>usuarios/cuenta/">Mi cuenta</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link fs-5 text-black" href="<?php echo $url_base;?>">Salir</a>
  </li>
</ul>
</nav>
