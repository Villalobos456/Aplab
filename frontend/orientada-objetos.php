<?php
require __DIR__ . '/config.php';
$pageId    = 'oo';
$pageTitle = 'Orientada a Objetos';
$pageDesc  = 'Análisis orientado a objetos del Sistema de Gestión APLAB: actores, casos de uso y diagrama de clases.';
require __DIR__ . '/includes/header.php';
echo page_title('Orientada a Objetos', 'Actores, casos de uso y clases del Sistema de Gestión APLAB.');
?>
<main>
  <div class="container report">
    <aside class="report-side">
      <?= toc([
          ['actores',        '1. Actores y casos de uso'],
          ['diagrama-clases','2. Diagrama de clases'],
          ['descripcion-clases','3. Descripción de las clases'],
      ]) ?>
    </aside>

    <div class="report-body">

      <section id="actores" class="rsec">
        <h2><span class="rn">1</span> Actores y casos de uso</h2>
        <p>El análisis orientado a objetos parte de quién usa el sistema y qué necesita hacer con él. Estos casos de uso se derivan de la lista de acontecimientos del modelo ambiental.</p>
        <div class="usecases">
          <?php foreach ($casos_uso as $actor => $lista): ?>
            <article>
              <h3><?= e($actor) ?></h3>
              <ul>
                <?php foreach ($lista as $c): ?><li><?= e($c) ?></li><?php endforeach; ?>
              </ul>
            </article>
          <?php endforeach; ?>
        </div>
        <p class="small">Además intervienen dos actores externos: la <strong>entidad bancaria</strong>, que confirma o rechaza los cobros con tarjeta o transferencia, y el <strong>servicio de correo</strong>, que envía los mensajes al cliente e informa su estado de envío.</p>
      </section>

      <section id="diagrama-clases" class="rsec">
        <h2><span class="rn">2</span> Diagrama de clases </h2>
        <p>Cada entidad del diagrama entidad-relación se convierte en una clase. <strong>Usuario</strong> es la clase base de Administrador, Cliente y Empleado, y <strong>Empleado</strong> lo es de Veterinario, Recepcionista y Estilista. Las asociaciones conservan la cardinalidad del DER.</p>
        <?= figure('clases.svg', 'Diagrama de clases del Sistema de Gestión APLAB.') ?>
      </section>

      <section id="descripcion-clases" class="rsec">
        <h2><span class="rn">3</span> Descripción de las clases</h2>
        <div class="table-wrap">
          <table>
            <thead><tr><th scope="col">Clase</th><th scope="col">Atributos</th><th scope="col">Responsabilidades</th></tr></thead>
            <tbody>
              <?php foreach ($clases as [$nombre, $attrs, $resp]): ?>
                <tr><th scope="row"><?= e($nombre) ?></th><td><?= e($attrs) ?></td><td><?= e($resp) ?></td></tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>

    </div>
  </div>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
