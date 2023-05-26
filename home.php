<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TLOK</title>
  <link rel="icon" href="./images/TROK - JULIAN R.png" type="image/png">
  <link rel="stylesheet" href="./css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

  <?php include 'navbar.php'; ?>

  <header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
      <a href="/proyect_lok/home.php" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
        <img src="images/TLOK .png" alt="logo" class="logo">
      </a>
      <ul class="nav nav-pills">
        <li class="nav-item nv-i"><a href="./home.php" class="nav-link">Home</a></li>
        <li class="nav-item nv-i"><a href="#Section_2" class="nav-link">Recursos</a></li>
        <li class="nav-item nv-i"><a href="#Section_3" class="nav-link">Comunidad</a></li>
        <li class="nav-item nv-i"><a href="#footer" class="nav-link">Contacto</a></li>
      </ul>
    </div>
  </header>

  <main>
    <section class="Section_N1" id="Section_1">
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active position-slider" data-bs-interval="7000">
            <img src="images/BG-1.png" class="d-block w-100 position" alt="BG1">
            <div class="carousel-caption d-none d-md-block">
              <h1>The Lenguage <br> Of Kent</h1>
              <p class="txt1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis nostrum aliquid incidunt maxime minima.
                Laborum nam eos provident? Quo deserunt doloribus laudantium minus ipsam illum, ullam voluptatem
                necessitatibus ex aspernatur?</p>
              <a href="#"><button type="button" class="btn btn-warning boton-slider">Mas informacion</button></a>
            </div>
          </div>
          <div class="carousel-item position-slider" data-bs-interval="8000">
            <img src="images/BG-2.png" class="d-block w-100 position" alt="BG2">
            <div class="carousel-caption d-none d-md-block">
              <h2>Second slide label</h2>
              <p class="txt2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore perspiciatis itaque laboriosam quas placeat aliquid,
                quam dolores earum voluptatibus. Quisquam sunt voluptatem magni laudantium sint sed earum blanditiis repellat quaerat?</p>
              <button type="button" class="btn btn-warning boton-slider">Mas informacion</button>
              <a href="#"><button type="button" class="btn btn-warning boton-slider">Mas informacion</button></a>
            </div>
          </div>
          <div class="carousel-item position-slider" data-bs-interval="8000">
            <img src="images/BG-3.png" class="d-block w-100 position" alt="BG3">
            <div class="carousel-caption d-none d-md-block">
              <h2>Third slide label</h2>
              <p class="txt3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, ab vero. Similique eius commodi quis repudiandae,
                vero odit autem consectetur reiciendis provident voluptatibus ipsa omnis ratione, harum magnam beatae voluptatum?</p>
              <button type="button" class="btn btn-warning boton-slider">Mas informacion</button>
              <a href="#"><button type="button" class="btn btn-warning boton-slider">Mas informacion</button></a>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon position-buttom" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon position-buttom" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <section class="Section_N2" id="Section_2">
      <div class="container overflow-hidden">
        <div class="row gy-5">
          <div class="col">
            <div class=" modify-grid"></div>
            <div class="layers1 c-b-layer">
              <img src="images/Module.png" class="moduloimg" alt="moculos">
            </div>
            <div class="desc">
              <div class="tittle c-b-txt">
                <h3>MODULOS DE APRENDIZAJE</h3>
                <div class="pseudo1 c-b"></div>
              </div>
              <div class="info">
                <p class="size-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil neque veniam dicta rerum officia
                  tempore in nemo pariatur eligendi?</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class=" modify-grid"></div>
            <div class="layers1 c-o-layer">
              <img src="images/Teachers.png" class="moduloimg" alt="moculos">
            </div>
            <div class="desc">
              <div class="tittle c-o-txt">
                <h3>CONVIERTETE EN INSTRUCTOR</h3>
                <div class="pseudo1 c-o "></div>
              </div>
              <div class="info">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil neque veniam dicta rerum officia
                  tempore in nemo pariatur eligendi?</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class=" modify-grid"></div>
            <div class="layers1 c-v-layer">
              <img src="images/multi.png" class="moduloimg" alt="moculos">
            </div>
            <div class="desc">
              <div class="tittle c-v-txt">
                <h3>UNIDADES MULTIMEDIA</h3>
                <div class="pseudo1 c-v"></div>
              </div>
              <div class="info">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil neque veniam dicta rerum officia
                  tempore in nemo pariatur eligendi?</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class=" modify-grid"></div>
            <div class="layers1 c-r-layer">
              <img src="images/study.png" class="moduloimg" alt="moculos">
            </div>
            <div class="desc">
              <div class="tittle c-r-txt">
                <h3>CURSOS CERTIFICADOS</h3>
                <div class="pseudo1 c-r"></div>
              </div>
              <div class="info">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil neque veniam dicta rerum officia
                  tempore in nemo pariatur eligendi?</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="Section_N3" id="Section_3">
      <div class="cont-center block">
        <h4>¡Descubre por qué a los estudiantes les encanta The Lenguege Of Kent!</h4>
        <a href="https://desktop.telegram.org/"><button type="button block" class="btn btn-warning boton-com">Mas informacion</button></a>
      </div>
    </section>
    <section class="Section_N4" id="Section_4">
      <div class="section-tittle">
        <h3>CURSOS POPULARES</h3>
        <h4>Lo mejor de nuestra escuela</h4>
        <div class="pseudo2"></div>
      </div>
      <div class="container TLOK-courses">
        <div class="row g-2">
          <div class="col-3 course-cont">
            <div class="p-3 course-item">
              <figure><img src="images/image-text.png" alt="imagen de prueba" class="img-course"></figure>
              <div class="course-tittle">
                <div class="pseudo3"></div>
                <img src="images/cromo1.png" alt="Cromo-1er-curso" class="cromo">
                <h5>Entendimiento Lenguaje Textual</h5>
              </div>
              <div class="desc-course">
                <h5>Physics and Philosophy</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A reprehenderit id sit cupiditate non quod ut,
                  dignissimos velit? Modi perferendis error odit illo distinctio quidem iusto, harum asperiores est eum!</p>
              </div>
              <div class="masinfo">
                <a href="#">leer mas</a>
              </div>
            </div>
          </div>
          <div class="col-3 course-cont">
            <div class="p-3 course-item">
              <figure><img src="images/image-text.png" alt="imagen de prueba" class="img-course"></figure>
              <div class="course-tittle">
                <div class="pseudo3"></div>
                <img src="images/cromo2.png" alt="Cromo-1er-curso" class="cromo">
                <h5>Gestualización para entendimiento y traducción</h5>
              </div>
              <div class="desc-course">
                <h5>Physics and Philosophy</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A reprehenderit id sit cupiditate non quod ut,
                  dignissimos velit? Modi perferendis error odit illo distinctio quidem iusto, harum asperiores est eum!</p>
              </div>
              <div class="masinfo">
                <a href="#">leer mas</a>
              </div>
            </div>
          </div>
          <div class="col-3 course-cont">
            <div class="p-3 course-item">
              <figure><img src="images/image-text.png" alt="imagen de prueba" class="img-course"></figure>
              <div class="course-tittle">
                <div class="pseudo3"></div>
                <img src="images/cromo3.png" alt="Cromo-1er-curso" class="cromo">
                <h5>Traducción del lenguaje nativo al lenguaje de señas LSC</h5>
              </div>
              <div class="desc-course">
                <h5>Physics and Philosophy</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A reprehenderit id sit cupiditate non quod ut,
                  dignissimos velit? Modi perferendis error odit illo distinctio quidem iusto, harum asperiores est eum!</p>
              </div>
              <div class="masinfo">
                <a href="#">leer mas</a>
              </div>
            </div>
          </div>
          <div class="col-3 course-cont">
            <div class="p-3 course-item">
              <figure><img src="images/image-text.png" alt="imagen de prueba" class="img-course"></figure>
              <div class="course-tittle">
                <div class="pseudo3"></div>
                <img src="images/cromo4.png" alt="Cromo-1er-curso" class="cromo">
                <h5>Falta Terminar...</h5>
              </div>
              <div class="desc-course">
                <h5>Physics and Philosophy</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A reprehenderit id sit cupiditate non quod ut,
                  dignissimos velit? Modi perferendis error odit illo distinctio quidem iusto, harum asperiores est eum!</p>
              </div>
              <div class="masinfo">
                <a href="#">leer mas</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer class="text-center text-lg-start fot-color text-muted " id="footer">

    <div class="container text-center text-md-start mt-5 fot-color">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <img src="images/TLOK - White.png" alt="logo-white" class="logo-size">
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime ex nostrum inventore alias, quisquam minus? Libero ipsa reiciendis iste quibusdam, tenetur illum quia.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset no-decoration">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset no-decoration">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset no-decoration">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset no-decoration">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset no-decoration">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset no-decoration">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset no-decoration">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset no-decoration">Help</a>
          </p>
        </div>
      </div>
      <!-- Grid row -->
    </div>
    <div class="text-center p-4 fot-color" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2023 Copyright:
      <a class="text-reset fw-bold no-decoration fot-color-tittle" href="index.html">Tlok.com</a>
    </div>

  </footer>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>