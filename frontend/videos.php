<?php
require __DIR__ . '/config.php';
$pageId    = 'videos';
$pageTitle = 'Videos';
$pageDesc  = 'Videos del proyecto de ' . SITE_FULL . '.';
require __DIR__ . '/includes/header.php';
?>
<main>
  <?= page_title('Videos', 'Material en video del proyecto.') ?>

  <section class="section">
    <div class="container">
      <div class="video-grid">
        <?php foreach ($videos as $v): ?>
          <figure class="video">
            <div class="video-frame">
              <?php if ($v['youtube_id'] !== ''): ?>
                <iframe src="https://www.youtube-nocookie.com/embed/<?= e($v['youtube_id']) ?>" title="<?= e($v['title']) ?>" loading="lazy" allowfullscreen></iframe>
              <?php else: ?>
                <div class="figure-ph"><span>Agrega el ID de YouTube en config.php</span></div>
              <?php endif; ?>
            </div>
            <figcaption><?= e($v['title']) ?></figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
