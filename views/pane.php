<?php
if (!defined("ROOT")) {
  require_once("../config.php");
  require_once("../logic/redirect.php");
}

redirect_to("", "/" . ROOT . "/login");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/<?= ROOT ?>/assets/css/pane.css">
  <title>Panel | Index</title>
</head>

<body>
  <main>
    <nav>
      <h4>Mi App</h4>
      <div class="right-menu">
        <div class="menu-btn" id="<?= $_SESSION["access"]['id'] ?>">
          <?= $_SESSION["access"]['name'] ?>
        </div>
        <div class="dropdown">
          <div class="shadow">
            <form action="/<?= ROOT ?>/logic/destroy_session.php" method="POST">
              <button type="submit">Salir</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
    <section class="section">
      <div class="section-title">
        <h2>Sistema de Control de Tareas</h2>
        <iconify-icon icon="bx:task" width="60" style="color: #999"></iconify-icon>
      </div>
      <div class="section-btn">
        <button class="btn-new">Nueva</button>
      </div>
      <div class="section-columns">
        <div class="column">
          <div class="column-header header-gray">Por hacer</div>
          <div class="column-body" id="todo"></div>
        </div>
        <div class="column">
          <div class="column-header header-black">Haciendo</div>
          <div class="column-body">
            <div class="column-card">
              <div class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci voluptate officia expedita atque, laboriosam explicabo eos fuga incidunt aperiam debitis voluptates tempora doloribus itaque. Consectetur labore praesentium alias eius accusamus?</div>
              <div class="card-buttons">
                <iconify-icon icon="ic:outline-remove-red-eye" width="24" class="btn-icon btn-eye"></iconify-icon>
                <iconify-icon icon="material-symbols:delete-outline-sharp" width="24" class="btn-icon btn-delete"></iconify-icon>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="column-header header-green">Hechas</div>
          <div class="column-body">
            <div class="column-card">
              <div class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci voluptate officia expedita atque, laboriosam explicabo eos fuga incidunt aperiam debitis voluptates tempora doloribus itaque. Consectetur labore praesentium alias eius accusamus?</div>
              <div class="card-buttons">
                <iconify-icon icon="ic:outline-remove-red-eye" width="24" class="btn-icon btn-eye"></iconify-icon>
                <iconify-icon icon="material-symbols:delete-outline-sharp" width="24" class="btn-icon btn-delete"></iconify-icon>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer>
        Powered by Gary Yaral &copy 2023
      </footer>
    </section>
  </main>
  <div class="modal hide">
    <form class="modal-form">
      <h3 class="modal-title">Nueva</h3>
      <textarea name="description" class="modal-text" placeholder="Escribe aquí tu tarea"></textarea>
      <sub id="error-textarea"></sub>
      <div class="modal-btns">
        <div class="btn btn-cancel">Salir</div>
        <input class="btn btn-save" type="submit" value="Guardar">
      </div>
    </form>
  </div>
  <script src="https://code.iconify.design/iconify-icon/1.0.3/iconify-icon.min.js"></script>
  <script src="/<?=ROOT?>/assets/js/modal.js" type="module"></script>
</body>

</html>