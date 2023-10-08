<style>
  @import url("https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&display=swap");

  * {
    box-sizing: border-box;
    font-family: "Sora", sans-serif;
    padding: 0px;
    margin: 0px;
  }

  .navbar-items {
    z-index: 99;
    position: relative;
    max-width: 900px;
    margin: 0 auto;
    font-size: 15px;
    margin-top: 50px;
  }

  .menu-horizontal {
    z-index: 999;
    list-style: none;
    display: flex;
    justify-content: space-around;
  }

  .menu-horizontal a {
    z-index: 999;
    list-style: none;
    text-decoration: none;
    color: #333;
  }

  .menu-horizontal>li>a {
    padding: 15px 20px;
    display: block;
    color: #333;
    text-decoration: none;
  }

  .menu-horizontal>li a:hover {
    color: red;
    z-index: 999;
  }

  .menu-vertical {
    padding-top: 30px;
    font-size: 12px;
    position: absolute;
    display: none;
    background-color: white;
    color: #333;
    list-style: none;
    width: 100%;
  }

  .menu-horizontal>li:hover .menu-vertical {
    display: block;
  }

  .menu-vertical li a {
    display: block;
    color: #333;
    padding: 15px 15px 15px 20px;
  }

  .container-blue {
    margin-top: 50px;
    margin-left: auto;
    margin-right: auto;
    max-width: 1000px;
    background-color: blue;
  }

  .container-blue .card-body {
    color: white;
    text-align: center;
  }

  .container-blue .card-body label {
    font-size: 20px;
  }

  .container-blue .card-body p {
    margin-top: 10px;
    font-size: 10px;
  }

  .container-blue .card-body input {
    margin-top: 10px;
    margin-left: 5px;
    font-size: 12px;
    padding: 3px;
    background-color: white;
    border: none;
    outline: none;
  }

  .container {
    padding-top: 30px;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
  }

  .container .row {
    padding-top: 30px;
    margin-left: auto;
    margin-right: auto;
    max-width: 800px;
    text-align: center;
  }

  .container .row .car {
    margin-left: auto;
    margin-right: auto;
    max-width: 800px;
    text-align: center;
  }
  .container .row .car a{
    text-decoration: none;
    color: black; 
  }

  .container .card-body label {
    color: gray;
    font-size: 10px;
  }

  .container .card-body p {
    font-size: 10px;
  }

  .container-women {
    margin-left: auto;
    margin-right: auto;
    max-width: 610px;
    margin-bottom: 10px;
    height: 340px;
    background-image: url('layout/imgs/hoodie-women.jpg');
  }

  .container-women .card-body {
    color: white;
    text-align: center;
  }

  .container-women .card-body label {
    color: white;
    font-size: 20px;
  }

  .container-women .card-body p {
    font-size: 10px;
  }

  .container-women .card-body {
    padding-top: 220px;
  }

  .container-women .card-body input {
    margin-left: 5px;
    font-size: 12px;
    padding: 3px;
    background-color: white;
    border: none;
    outline: none;
  }
</style>

<nav class="navbar-items">
  <ul class="menu-horizontal">
    <li>
      <b><a href="">Mujer</a></b>
      <ul class="menu-vertical">
        <b><label for="">Ofertas</label></b>
        <li><a href="https://co.hm.com/mujer/sale" target="_blank">Sales</a></li>
        <b><label for="">Nuevos productos</label></b>
        <li><a href="https://co.hm.com/mujer/novedades" target="_blank">Ver todo</a></li>
        <b><label for="">Calzado</label></b>
        <li><a href="https://co.hm.com/mujer/novedades" target="_blank">Ver todo</a></li>
        <li><a href="https://co.hm.com/mujer/zapatos" target="_blank">Botas</a></li>
        <li><a href="https://co.hm.com/mujer/zapatos/botas" target="_blank">Calzado plano</a></li>
        <li><a href="https://co.hm.com/mujer/zapatos/planos" target="_blank">Calzado deportivo</a></li>
      </ul>
    </li>
    <li>
      <b><a href="">Hombre</a></b>
      <ul class="menu-vertical">
        <b><label for="">Ofertas</label></b>
        <li><a  href="https://co.hm.com/hombre/sale" target="_blank">Sales</a></li>
        <b><label for="">Nuevos productos</label></b>
        <li><a href="https://co.hm.com/hombre/novedades" target="_blank">Ver todo</a></li>
        <li><a href="https://co.hm.com/hombre/novedades-ropa" target="_blank">Ropa</a></li>
        <b><label for="">Compra por concepto</label></b>
        <li><a href="https://co.hm.com/hombre/novedades-ropa" target="_blank">Ropa formal</a></li>
        <li><a href="https://co.hm.com/hombre/basicos" target="_blank">Basicos</a></li>
      </ul>
    </li>
    <li>
      <b><a href="">Niños</a></b>
      <ul class="menu-vertical">
        <b><label for="">Ofertas</label></b>
        <li><a href="https://co.hm.com/infantil/todo-ninos/sale" target="_blank">Sales</a></li>
        <b><label for="">Nuevos productos</label></b>
        <li><a href="https://co.hm.com/infantil/todo-ninos/novedades" target="_blank">Ver todo</a></li>
        <b><label for="">Niños</label></b>
        <li><a href="https://co.hm.com/infantil/ninos" target="_blank">Ver todo</a></li>
        <b><label for="">Niñas</label></b>
        <li><a href="https://co.hm.com/infantil/ninas" target="_blank">Ver todo</a></li>
      </ul>
    </li>
    <li>
      <b><a href="">Bebé</a></b>
      <ul class="menu-vertical">
        <b><label for="">Ofertas</label></b>
        <li><a href="">Sales</a></li>
        <b><label for="">Nuevos productos</label></b>
        <li><a href="">Ver todo</a></li>
        <b><label for="">Recién nacidos</label></b>
        <li><a href="">Ver todo</a></li>
      </ul>
    </li>
  </ul>
</nav>

<div class="container-blue">
  <div class="card-body">
    <b><label for="">Lo mejor, para el mejor.</label></b>
    <b><p>Es momento de consentir a papá. Compra todos sus regalos en linea</p></b>
    <input type="button" value="Compra ahora" href="https://co.hm.com/hombre/ofertas-regalos-para-papa">
  </div>
</div>

<div class="container">
  <b><label for="">Las tendencias del momento</label></b>
  <div class="row">
    <a href="<?php echo $BASE_ROOT_URL_PATH . 'routes/controller.php?active_module=producto&categoria=2' ?>" target="_blank">
    <div class="car" style="width: 6rem;">
      <img src="layout/imgs/vestido.png" class="card-img-top" alt="...">
      <div class="card-body">
        <b><label for="">Mujer</label></b>
        <p class="card-text">Vestido</p>
      </div></a>
    </div>
    <div class="car" style="width: 6rem;">
    <a href="<?php echo $BASE_ROOT_URL_PATH . 'routes/controller.php?active_module=producto&categoria=1' ?>" target="_blank">
      <img src="layout/imgs/camiseta.png" class="card-img-top" alt="...">
      <div class="card-body">
        <b><label for="">Hombre</label></b>
        <p class="card-text">Basicos</p>
      </div></a>
    </div>
    <div class="car" style="width: 6rem;">
    <a href="https://co.hm.com/infantil/bebe/sets-y-conjuntos" target="_blank">
      <img src="layout/imgs/bebe.png" class="card-img-top" alt="...">
      <div class="card-body">
        <b><label for="">Bebé</label></b>
        <p class="card-text">Set y conjunto</p>
      </div></a>
    </div>
    <div class="car" style="width: 6rem;">
    <a href="https://co.hm.com/infantil/todo-ninos/ropa/sacos-y-prendas-tejidas" target="_blank">
      <img src="layout/imgs/niño.png" class="card-img-top" alt="...">
      <div class="card-body">
        <b><label for="">Niños</label></b>
        <p class="card-text">Sacos y hoddies</p>
      </div></a>
    </div>
    <div class="car" style="width: 6rem;">
    <a href="https://co.hm.com/sale-hm" target="_blank">
      <img src="layout/imgs/rebaja.png" class="card-img-top" alt="...">
      <div class="card-body">
        <b><label for="">Rebajas</label></b>
        <p class="card-text">Ver todo</p>
      </div></a>
    </div>
  </div>
</div>
<div class="container-women">
  <div class="card-body">
    <b><label for="">Prendas con tus personajes favoritos</label></b>
    <p>Bandas, dibujos animados, series y más.</p>
    <input type="button" value="Mujer" h>
    <input type="button" value="Hombre">
    <input type="button" value="Bebé">
    <input type="button" value="Niños">
  </div>
</div>