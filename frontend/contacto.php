<?php
require __DIR__ . '/config.php';

// --- Formulario de contacto -------------------------------------------------
$flash = null;
$old = ['nombre' => '', 'correo' => '', 'mensaje' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['form'] ?? '') === 'contacto') {
    if (empty($_POST['web'])) { // campo trampa para bots
        $old['nombre']  = trim((string)($_POST['nombre'] ?? ''));
        $old['correo']  = trim((string)($_POST['correo'] ?? ''));
        $old['mensaje'] = trim((string)($_POST['mensaje'] ?? ''));

        if ($old['nombre'] === '' || !filter_var($old['correo'], FILTER_VALIDATE_EMAIL) || mb_strlen($old['mensaje']) < 10) {
            $flash = ['error', 'Revisa los campos: escribe tu nombre, un correo válido y un mensaje de al menos 10 caracteres.'];
        } else {
            $cuerpo  = "Nombre: {$old['nombre']}\nCorreo: {$old['correo']}\n\n{$old['mensaje']}";
            $headers = 'From: ' . CONTACT_EMAIL . "\r\nReply-To: " . $old['correo'] . "\r\nContent-Type: text/plain; charset=UTF-8";
            $ok = @mail(CONTACT_EMAIL, 'Contacto web ' . SITE_NAME, $cuerpo, $headers);
            if ($ok) {
                $flash = ['ok', 'Mensaje enviado. Te responderemos pronto.'];
                $old = ['nombre' => '', 'correo' => '', 'mensaje' => ''];
            } else {
                $flash = ['error', 'No se pudo enviar el mensaje. Inténtalo de nuevo o escríbenos por WhatsApp.'];
            }
        }
    }
}

$pageId    = 'contacto';
$pageTitle = 'Contacto';
$pageDesc  = 'Contacta a APLAB en Achumani, La Paz: teléfonos, WhatsApp, correo, Facebook y formas de ayudar.';
require __DIR__ . '/includes/header.php';
echo page_title('Contacto', 'Escríbenos, llámanos o visítanos en Achumani.');
?>
<main>
  <section class="section">
    <div class="container contact-grid">
      <div>
        <dl class="contact-info">
          <dt>Dirección</dt>
          <dd><?= e(ADDRESS) ?>, <?= e(CITY) ?></dd>

          <dt>Teléfonos</dt>
          <dd>
            <a href="<?= e(TEL_LANDLINE) ?>"><?= e(PHONE_LANDLINE) ?></a><br>
            <a href="<?= e(TEL_CELL) ?>"><?= e(PHONE_CELL) ?></a> (celular)
          </dd>

          <dt>WhatsApp</dt>
          <dd><a href="<?= e(WHATSAPP_URL) ?>" target="_blank" rel="noopener"><?= e(PHONE_CELL) ?></a></dd>

          <dt>Área social (adopciones)</dt>
          <dd><a href="<?= e(TEL_ADOPTION) ?>"><?= e(PHONE_ADOPTION) ?></a></dd>

          <dt>Correo electrónico</dt>
          <dd><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></dd>

          <dt>Horario</dt>
          <dd><?= e(HOURS) ?></dd>

          <dt>Redes sociales</dt>
          <dd>
            <a href="<?= e(FB_VET) ?>" target="_blank" rel="noopener">Facebook de APLAB Veterinaria</a><br>
            <a href="<?= e(FB_ORG) ?>" target="_blank" rel="noopener">Facebook de APLAB Bolivia</a>
          </dd>
        </dl>
        <a class="btn" href="<?= e(VET_URL) ?>"<?= VET_EXTERNAL ? ' target="_blank" rel="noopener"' : '' ?>>Visitar Veterinaria</a>
      </div>

      <form class="contact-form" method="post" action="contacto.php" novalidate>
        <h2>Envíanos un mensaje</h2>
        <?php if ($flash): ?>
          <p class="alert alert-<?= $flash[0] ?>" role="status"><?= e($flash[1]) ?></p>
        <?php endif; ?>
        <input type="hidden" name="form" value="contacto">
        <div class="hp" aria-hidden="true"><label>No llenar <input type="text" name="web" tabindex="-1" autocomplete="off"></label></div>

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" required autocomplete="name" value="<?= e($old['nombre']) ?>">

        <label for="correo">Correo</label>
        <input id="correo" name="correo" type="email" required autocomplete="email" value="<?= e($old['correo']) ?>">

        <label for="mensaje">Mensaje</label>
        <textarea id="mensaje" name="mensaje" rows="5" required><?= e($old['mensaje']) ?></textarea>

        <button class="btn" type="submit">Enviar mensaje</button>
      </form>
    </div>
  </section>

  <section id="ayudar" class="section alt">
    <div class="container">
      <h2 class="section-title">Cómo ayudar</h2>
      <div class="rows">
        <article class="row">
          <h3>Adoptar</h3>
          <p>Programa de adopciones responsables de perros y gatos rescatados. Para consultar por los animales disponibles, llama al área social: <a href="<?= e(TEL_ADOPTION) ?>"><?= e(PHONE_ADOPTION) ?></a>.</p>
        </article>
        <article class="row">
          <h3>Dar un hogar temporal</h3>
          <p>Los hogares temporales son la alternativa de APLAB a los albergues: el animal vive en una casa mientras se rehabilita y espera su adopción.</p>
        </article>
        <article class="row">
          <h3>Ser voluntario</h3>
          <p>El trabajo de APLAB se apoya en voluntarios. Escríbenos por WhatsApp o al correo para saber cómo sumarte.</p>
        </article>
        <article class="row">
          <h3>Apoyar a los animales en rehabilitación</h3>
          <p>Escríbenos para saber qué necesitan hoy los animales que están en rescate y rehabilitación.</p>
        </article>
      </div>
    </div>
  </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
