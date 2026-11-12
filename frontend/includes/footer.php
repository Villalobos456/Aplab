<footer class="site-footer">
  <div class="flag" aria-hidden="true"></div>
  <div class="container foot">

    <div class="foot-col foot-about">
      <a class="foot-brand" href="index.php">
        <img src="assets/img/logo.png" width="64" height="64" alt="">
        <strong><?= e(SITE_NAME) ?></strong>
      </a>
      <p><?= e(SITE_NAME) ?> (<?= e(SITE_FULL) ?>) cuenta con un centro de salud animal y veterinaria ubicado en Achumani, La Paz.</p>
      <p class="foot-social">
        <a href="<?= e(FB_VET) ?>" target="_blank" rel="noopener">Facebook de APLAB Veterinaria</a>
        <a href="<?= e(FB_ORG) ?>" target="_blank" rel="noopener">Facebook de APLAB Bolivia</a>
      </p>
    </div>

    <div class="foot-col">
      <h2>Ubicación y contacto</h2>
      <dl>
        <dt>Dirección</dt>
        <dd><?= e(ADDRESS) ?>, <?= e(CITY) ?></dd>
        <dt>Teléfonos</dt>
        <dd>
          <a href="<?= e(TEL_LANDLINE) ?>"><?= e(PHONE_LANDLINE) ?></a> /
          celular <a href="<?= e(TEL_CELL) ?>"><?= e(PHONE_CELL) ?></a>
        </dd>
        <dt>Área social (adopciones)</dt>
        <dd><a href="<?= e(TEL_ADOPTION) ?>"><?= e(PHONE_ADOPTION) ?></a></dd>
        <dt>Correo electrónico</dt>
        <dd><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></dd>
      </dl>
    </div>

    <div class="foot-col">
      <h2>Servicios principales</h2>
      <ul class="foot-services">
        <?php foreach ($servicios as $sv): ?>
          <li><strong><?= e($sv['title']) ?></strong></li>
        <?php endforeach; ?>
      </ul>
      <p class="foot-small">Atención médica con costos reducidos y ayuda social veterinaria.</p>
    </div>

    <p class="copy">© <?= date('Y') ?> <?= e(SITE_NAME) ?> — <?= e(SITE_FULL) ?>. Todos los derechos reservados.</p>
  </div>
</footer>

<dialog id="lightbox" class="lightbox" aria-label="Imagen ampliada">
  <div class="lb-bar">
    <span class="lb-hint">Toca la imagen para ver el tamaño real</span>
    <button type="button" class="lb-close">Cerrar</button>
  </div>
  <div class="lb-scroll"><img src="" alt=""></div>
</dialog>
</body>
</html>
