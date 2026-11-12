<?php
require __DIR__ . '/config.php';
$pageId    = 'analisis';
$pageTitle = 'Análisis Estructurado';
$pageDesc  = 'Análisis estructurado del Sistema de Gestión APLAB: modelo ambiental, DFD de nivel 0 a 3 y diagrama entidad-relación.';
require __DIR__ . '/includes/header.php';
echo page_title('Análisis Estructurado', 'Modelo ambiental y modelo de comportamiento del Sistema de Gestión APLAB.');

$totalEventos = 0;
foreach ($acontecimientos as $lista) { $totalEventos += count($lista); }
?>
<main>
  <div class="container report">
    <aside class="report-side">
      <?= toc([
          ['modelo-ambiental',        'Modelo ambiental'],
          ['declaracion-propositos',  '- 1. Declaración de propósitos'],
          ['dfd-n0',                  '- 2. DFD N0 — Diagrama de contexto'],
          ['lista-acontecimientos',   '- 3. Lista de acontecimientos'],
          ['modelo-comportamiento',   'Modelo de comportamiento'],
          ['dfd-n1',                  '- 4. DFD Nivel 1'],
          ['dfd-n2',                  '- 5. DFD Nivel 2'],
          ['dfd-n3',                  '- Detalle de procesos (Nivel 3)'],
          ['der',                     '- 6. DER — Entidad relación'],
      ]) ?>
    </aside>

    <div class="report-body">

      <header id="modelo-ambiental" class="rgroup g-yellow">
        <h2>Modelo ambiental</h2>
        <p>Define qué hace el sistema y con quién se relaciona. Establece su propósito, sus límites frente a los actores externos y los acontecimientos a los que debe responder.</p>
      </header>

      <section id="declaracion-propositos" class="rsec">
        <h3><span class="rn">1</span> Declaración de propósitos</h3>
        <blockquote class="formulation"><?= e($declaracion) ?></blockquote>
      </section>

      <section id="dfd-n0" class="rsec">
        <h3><span class="rn">2</span> DFD N0 — Diagrama de contexto</h3>
        <p>Representa el sistema como un solo proceso, el <strong>Sistema de Gestión APLAB</strong>, y muestra los datos que intercambia con ocho actores externos: Administrador, Empleado, Cliente, Veterinario, Estilista, Proveedor, Entidad bancaria y Servicio de correo.</p>
        <?= figure('dfd-n0-contexto.jpg', 'DFD N0 — Diagrama de contexto del Sistema de Gestión APLAB.') ?>
      </section>

      <section id="lista-acontecimientos" class="rsec">
        <h3><span class="rn">3</span> Lista de acontecimientos</h3>
        <p>Son los <?= $totalEventos ?> hechos del entorno ante los que el sistema debe reaccionar, agrupados por el actor que los origina o los recibe.</p>
        <div class="table-wrap">
          <table class="events">
            <thead><tr><th scope="col">N.º</th><th scope="col">Acontecimiento</th></tr></thead>
            <tbody>
              <?php $n = 0; foreach ($acontecimientos as $actor => $lista): ?>
                <tr class="actor-row"><th colspan="2" scope="colgroup"><?= e($actor) ?></th></tr>
                <?php foreach ($lista as $texto): $n++; ?>
                  <tr><td><?= $n ?></td><td><?= e($texto) ?></td></tr>
                <?php endforeach; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>

      <header id="modelo-comportamiento" class="rgroup g-red">
        <h2>Modelo de comportamiento</h2>
        <p>Describe cómo funciona el sistema por dentro: qué procesos existen, cómo circulan los datos entre ellos y en qué almacenes se guardan. Los diagramas de flujo de datos se detallan por niveles, y el diagrama entidad-relación muestra cómo se relacionan los datos.</p>
        <p class="note">El sistema se divide en dos módulos complementarios. El <strong>Módulo A</strong> cubre usuarios, citas y estética/SPA; el <strong>Módulo B</strong> cubre historial clínico, inventario y reportes. Cada módulo numera sus procesos por separado.</p>
      </header>

      <section id="dfd-n1" class="rsec">
        <h3><span class="rn">4</span> DFD Nivel 1</h3>
        <p>Descompone el sistema en sus procesos principales y muestra los almacenes de datos que usa cada módulo.</p>
        <?php foreach ($n1 as $m): ?>
          <article id="<?= e($m['id']) ?>" class="block">
            <h4><span class="tag"><?= e($m['module']) ?></span> <?= e($m['title']) ?></h4>
            <p><?= e($m['text']) ?></p>
            <?= proc_list($m['procs']) ?>
            <p class="small"><strong>Actores:</strong> <?= e($m['ext']) ?>.</p>
            <?= figure($m['file'], $m['caption']) ?>
          </article>
        <?php endforeach; ?>
      </section>

      <section id="dfd-n2" class="rsec">
        <h3><span class="rn">5</span> DFD Nivel 2</h3>
        <p>Cada proceso del nivel 1 se explota en subprocesos, con sus entradas, salidas y almacenes de datos.</p>
        <?php foreach (['A' => 'Módulo A — Usuarios, citas y estética/SPA', 'B' => 'Módulo B — Historial clínico, inventario y reportes'] as $k => $titulo): ?>
          <h4 class="mod-title"><?= e($titulo) ?></h4>
          <?php foreach ($n2[$k] as $d): ?>
            <article id="<?= e($d['id']) ?>" class="block">
              <h5><?= e($d['title']) ?></h5>
              <?= proc_list($d['procs']) ?>
              <?= figure($d['file'], 'DFD Nivel 2 — ' . $d['title'] . ' (Módulo ' . $k . ').') ?>
            </article>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </section>

      <section id="dfd-n3" class="rsec">
        <h3>Detalle de procesos (Nivel 3)</h3>
        <p>Algunos subprocesos del nivel 2 se detallan una vez más porque concentran reglas importantes: autenticación, validación de horarios, cálculo de costos, registro de consultas, notas aclaratorias y actualización de stock.</p>
        <?php foreach (['A' => 'Módulo A', 'B' => 'Módulo B'] as $k => $titulo): ?>
          <h4 class="mod-title"><?= e($titulo) ?></h4>
          <?php foreach ($n3[$k] as $d): ?>
            <article id="<?= e($d['id']) ?>" class="block">
              <h5><?= e($d['title']) ?></h5>
              <?= proc_list($d['procs']) ?>
              <?= figure($d['file'], 'DFD Nivel 3 — ' . $d['title'] . ' (Módulo ' . $k . ').') ?>
            </article>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </section>

      <section id="der" class="rsec">
        <h3><span class="rn">6</span> DER — Entidad relación</h3>
        <p>Muestra las entidades principales y cómo se relacionan. <strong>Usuario</strong> se especializa en Administrador, Cliente y Empleado, y Empleado a su vez en Veterinario, Recepcionista y Estilista. Las citas conectan a clientes, mascotas y personal, y las citas de estética se relacionan con el catálogo de servicios.</p>
        <?= figure('der.jpg', 'Diagrama entidad-relación del Sistema de Gestión APLAB.') ?>
        <div class="table-wrap">
          <table>
            <thead><tr><th scope="col">Entidad</th><th scope="col">Relación</th><th scope="col">Entidad</th><th scope="col">Cardinalidad</th></tr></thead>
            <tbody>
              <?php foreach ($der_relaciones as [$a, $rel, $b, $card]): ?>
                <tr><td><?= e($a) ?></td><td><?= e($rel) ?></td><td><?= e($b) ?></td><td><?= e($card) ?></td></tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <p class="small">Las entidades de historial clínico, inventario y ventas se reflejan en los almacenes de datos de los DFD (historiales, consultas, recetas, productos, movimientos de inventario y proveedores).</p>
      </section>

    </div>
  </div>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
