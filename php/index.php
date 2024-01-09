<?php
include_once '../php/user.php';
include_once '../php/user_session.php';

$userSesion = new UserSession();
$usuario = new User();


if(isset($_SESSION['usuario'])){
    echo "Hay sesion";
}else if(isset($_POST['usuario']) && isset($_POST['paswword'])){
    echo "Validacion de login";
}else{
    echo "Login";
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>pagina responsive</title>
    <link rel="stylesheet" href="css/st.css" />
  </head>
  <body>
    <header>
      <div class="container">
        <p class="logo">CcimaIT!</p>
        <nav>
          <a href="#somos">Quienes Somos</a>
          <a href="#nuestros-ser">Nuestros programas</a>
          <a href="#caracteristicas">Caracteristicas</a>
          <a href="html/login.html">
            <input type="submit" value="login">
          </a>

        </nav>
      </div>
    </header>
    <section id="hero">
      <h1>
        Resolvemos tus problemas <br />
        de Informatica.
      </h1>
      <button>LOGIN</button>
    </section>
    <section id="somos">
      <div class="container">
        <div class="img-container"></div>
        <div class="texto">
        <h2>Somos <span class="colora">CcimaIT!</span></h2>
        <p>
          Somos un area encargada de resolver los problemas relacionados con
          problemas informaticos, tales como conexiones LAN, configuracion de servidores,
          desarrollo de sorftware especializado, mantenimiento preventivo y correctivo a equipo de computo,
          mantenimeinto de actualizacion, instalacion de software
        </p>
    </div>
      </div>
    </section>
    <section id="nuestros-ser">
      <div class="container">
        <h2>Nuestros Servicios</h2>
        <div class="programas">
        <div class="carta">
          <h3>Circuito cerrado</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Perspiciatis obcaecati fuga molestiae nesciunt nisi consequatur ea
            officiis eius nihil repellat optio nostrum, aut impedit earum,
            laudantium, omnis delectus ex aperiam!
          </p>
          <button>+ Info</button>
        </div>
        <div class="carta">
          <h3>ERP en tiempo real</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Perspiciatis obcaecati fuga molestiae nesciunt nisi consequatur ea
            officiis eius nihil repellat optio nostrum, aut impedit earum,
            laudantium, omnis delectus ex aperiam!
          </p>
          <button>+ Info</button>
        </div>
        <div class="carta">
          <h3>Site en tu empresa</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Perspiciatis obcaecati fuga molestiae nesciunt nisi consequatur ea
            officiis eius nihil repellat optio nostrum, aut impedit earum,
            laudantium, omnis delectus ex aperiam!
          </p>
          <button>+ Info</button>
        </div>
    </div>
      </div>
    </section>
    <section id="caracteristicas">
      <div class="container">
        <ul>
          <li>✔️ Presencia en todo el pais</li>
          <li>✔️ Soporte tecnico 24/7</li>
          <li>✔️ Asistencia financiera</li>
          <li>✔️ Soporte 1:1</li>
      </ul>  
    </div>
    </section>

    <section id="aplica-ya">
        <h2>Listo para seguir adelante</h2>
        <button>APLICA YA!</button>
    </section>

    <footer>
        <div class="container">
            <p>&copy; Jose Reno 2022</p>
        </div>
    </footer>
  </body>
</html>
