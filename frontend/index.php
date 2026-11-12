<?php
require __DIR__ . '/config.php';
$pageId    = 'inicio';
$pageTitle = 'Clínica de Animales APLAB en Achumani, La Paz';
$pageDesc  = 'APLAB (Amor Por Los Animales Bolivia): centro de salud animal y veterinaria en Achumani, La Paz. Atención con costos reducidos, rescate, adopciones y educación.';
require __DIR__ . '/includes/header.php';
?>
<main>

  <section class="hero">
    <div class="container hero-grid">
      <div class="hero-text" data-reveal>
        <h1><?= e(TAGLINE) ?></h1>
        <p class="lead">Centro de salud animal y veterinaria en Achumani, La Paz. Atención con costos reducidos, rescate, adopciones y educación, a cargo de una fundación sin fines de lucro.</p>
        <div class="hero-actions">
          <a class="btn btn-yellow" href="<?= e(VET_URL) ?>"<?= VET_EXTERNAL ? ' target="_blank" rel="noopener"' : '' ?>>Visitar Veterinaria</a>
          <a class="btn btn-outline-light" href="contacto.php#ayudar">Cómo ayudar</a>
        </div>
      </div>
      <div class="hero-logo" data-reveal>
        <span class="ring r1" aria-hidden="true"></span>
        <span class="ring r2" aria-hidden="true"></span>
        <img src="assets/img/logo.png" width="360" height="373" alt="Logo de <?= e(SITE_NAME) ?>: un corazón rojo, amarillo y verde sobre el texto APLAB">
      </div>
    </div>
  </section>

  <section class="stats" aria-label="APLAB en cifras">
    <div class="container stats-grid">
      <p><span class="stat-paw"><?= paw_svg(26) ?></span><strong>+500</strong> adopciones logradas</p>
      <p><span class="stat-paw"><?= paw_svg(26) ?></span><strong>~1000</strong> esterilizaciones quirúrgicas</p>
      <p><span class="stat-paw"><?= paw_svg(26) ?></span><strong>Achumani</strong> zona sur de La Paz</p>
    </div>
  </section>

  <section class="facts" aria-label="Datos de la clínica">
    <div class="container">
      <dl class="facts-grid">
        <div>
          <dt>Dirección</dt>
          <dd><?= e(ADDRESS) ?>, <?= e(CITY) ?></dd>
        </div>
        <div>
          <dt>Teléfonos</dt>
          <dd>
            <a href="<?= e(TEL_LANDLINE) ?>"><?= e(PHONE_LANDLINE) ?></a><br>
            <a href="<?= e(TEL_CELL) ?>"><?= e(PHONE_CELL) ?></a> (celular y WhatsApp)
          </dd>
        </div>
        <div>
          <dt>Adopciones (área social)</dt>
          <dd><a href="<?= e(TEL_ADOPTION) ?>"><?= e(PHONE_ADOPTION) ?></a></dd>
        </div>
        <div>
          <dt>Correo electrónico</dt>
          <dd><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></dd>
        </div>
      </dl>
    </div>
  </section>

  <section id="quienes-somos" class="section">
    <div class="container split" data-reveal>
      <h2>Quiénes somos</h2>
      <div class="prose">
        <p><?= e(SITE_NAME) ?> (<?= e(SITE_FULL) ?>) es una fundación sin fines de lucro. Su centro de salud animal y veterinaria funciona en Achumani, en la zona sur de La Paz, y combina servicios veterinarios privados con programas de ayuda social: adopciones, costos reducidos para animales rescatados y rehabilitación de fauna silvestre.</p>
        <p>Desde sus inicios promueve los hogares temporales como alternativa a los albergues. Según su sitio oficial, ha logrado <strong>más de 500 adopciones</strong> y <strong>cerca de 1000 esterilizaciones quirúrgicas</strong> de perros y gatos.</p>
        <p>Su misión es promover el respeto y la compasión por los animales a través de la educación, el voluntariado y la participación ciudadana.</p>
      </div>
    </div>
  </section>

  <section id="servicios" class="section alt">
    <div class="container">
      <div class="section-intro" data-reveal>
        <h2>Servicios principales</h2>
        <p>Atención veterinaria para tu mascota y ayuda social para animales rescatados y fauna silvestre.</p>
      </div>
      <div class="tiles" data-reveal>
        <?php foreach ($servicios as $i => $sv): ?>
          <article class="tile t<?= $i + 1 ?>">
            <span class="tile-num"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
            <h3><?= e($sv['title']) ?></h3>
            <p><?= e($sv['text']) ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="adopciones" class="section">
    <div class="container" data-reveal>
      <h2 class="section-title">Cómo es una adopción en APLAB</h2>
      <p class="journey-intro">El programa de adopciones cierra un círculo que empieza con el auxilio del animal y termina cuando encuentra una familia.</p>
      <ol class="journey">
        <?php foreach ($pasos as $i => $paso): ?>
          <li><span class="step-num"><?= $i + 1 ?></span><h3><?= e($paso) ?></h3></li>
        <?php endforeach; ?>
      </ol>
      <p class="journey-cta">Para consultar por los perros y gatos en adopción, llama al área social: <a href="<?= e(TEL_ADOPTION) ?>"><?= e(PHONE_ADOPTION) ?></a>.</p>
    </div>
  </section>

  <section id="sistema" class="section dark">
    <div class="container">
      <div class="section-intro" data-reveal>
        <h2>Sistema de Gestión APLAB</h2>
        <p><?= e($declaracion ?? 'El sistema tiene como objetivo gestionar, administrar y controlar las citas, los historiales clínicos, los servicios de estética y spa, las ventas, el inventario y los reportes de la clínica veterinaria APLAB, mediante una base de datos centralizada.') ?></p>
      </div>
      <div class="areas" data-reveal>
        <?php foreach ($areas as [$titulo, $texto]): ?>
          <article>
            <h3><?= e($titulo) ?></h3>
            <p><?= e($texto) ?></p>
          </article>
        <?php endforeach; ?>
      </div>
      <div class="diag-head" data-reveal>
        <h3>Así se modela el sistema</h3>
        <a class="diag-all" href="analisis-estructurado.php">Ver los 16 diagramas</a>
      </div>
      <div class="diag-cards" data-reveal>
        <?php
        $diagramas = [
            ['thumbs/n0.jpg',  'dfd-n0-contexto.jpg', 'Diagrama de contexto', 'DFD N0: el sistema y sus 8 actores externos.',        'analisis-estructurado.php#dfd-n0'],
            ['thumbs/n1.jpg',  'dfd-n1-a.jpg',        'Flujo de datos',        'DFD Nivel 1: usuarios, citas y estética/SPA.',          'analisis-estructurado.php#dfd-n1'],
            ['thumbs/der.jpg', 'der.jpg',             'Entidad-relación',      'DER: usuarios, mascotas, citas y servicios estéticos.', 'analisis-estructurado.php#der'],
        ];
        foreach ($diagramas as [$thumb, $full, $titulo, $desc, $link]): ?>
          <article class="dcard">
            <button type="button" class="fig-btn dthumb" data-full="assets/img/diagramas/<?= e($full) ?>" aria-label="Ampliar: <?= e($titulo) ?>">
              <img src="assets/img/diagramas/<?= e($thumb) ?>" alt="<?= e($titulo) ?> del Sistema de Gestión APLAB" loading="lazy">
              <span class="fig-zoom">Ampliar</span>
            </button>
            <div class="dbody">
              <h4><?= e($titulo) ?></h4>
              <p><?= e($desc) ?></p>
              <a href="<?= e($link) ?>">Ver en el informe</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="proyecto" class="section paws report-section">
    <div class="container">
      <div class="section-intro" data-reveal>
        <?= paw_trail(8) ?>
        <h2>El informe del proyecto</h2>
        <p>Cada parte del análisis y diseño del sistema tiene su propia página, con sus diagramas y una descripción.</p>
      </div>
      <div class="report-tiles" data-reveal>
        <a class="rt rt-1" href="marco-teorico.php">
          <span class="rt-top"><span class="rt-paw"><?= paw_svg(34) ?></span><span class="rt-n">01</span></span>
          <h3>Marco Teórico</h3>
          <p>Introducción, antecedentes, planteamiento y árbol de problemas, formulación, propósito, metodología y cronograma de actividades.</p>
          <span class="rt-foot"><span class="rt-meta">8 apartados</span><span class="rt-open">Abrir</span></span>
        </a>
        <a class="rt rt-2" href="analisis-estructurado.php">
          <span class="rt-top"><span class="rt-paw"><?= paw_svg(34) ?></span><span class="rt-n">02</span></span>
          <h3>Análisis Estructurado</h3>
          <p>Modelo ambiental con diagrama de contexto y lista de acontecimientos; modelo de comportamiento con los DFD de nivel 1, 2 y 3 y el diagrama entidad-relación.</p>
          <span class="rt-foot"><span class="rt-meta">16 diagramas</span><span class="rt-open">Abrir</span></span>
        </a>
        <a class="rt rt-3" href="orientada-objetos.php">
          <span class="rt-top"><span class="rt-paw"><?= paw_svg(34) ?></span><span class="rt-n">03</span></span>
          <h3>Orientada a Objetos</h3>
          <p>Actores y casos de uso del sistema y diagrama de clases con sus atributos, relaciones y responsabilidades.</p>
          <span class="rt-foot"><span class="rt-meta">Casos de uso y clases</span><span class="rt-open">Abrir</span></span>
        </a>
        <a class="rt rt-4" href="videos.php">
          <span class="rt-top"><span class="rt-paw"><?= paw_svg(34) ?></span><span class="rt-n">04</span></span>
          <h3>Videos</h3>
          <p>Material en video que explica el proyecto y el funcionamiento del sistema.</p>
          <span class="rt-foot"><span class="rt-meta">Material audiovisual</span><span class="rt-open">Abrir</span></span>
        </a>
      </div>
    </div>
  </section>

  <section class="cta-band">
    <div class="container cta-inner" data-reveal>
      <h2>¿Quieres conocer la clínica?</h2>
      <a class="btn btn-yellow" href="<?= e(VET_URL) ?>"<?= VET_EXTERNAL ? ' target="_blank" rel="noopener"' : '' ?>>Visitar Veterinaria</a>
    </div>
  </section>

</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
