<?php
require_once __DIR__ . '/icons.php';
require_once __DIR__ . '/report.php';
$pageId    = $pageId    ?? 'inicio';
$pageTitle = $pageTitle ?? SITE_NAME;
$pageDesc  = $pageDesc  ?? TAGLINE;

function cur(string $id): string
{
    global $pageId;
    return $pageId === $id ? ' aria-current="page"' : '';
}
function curBtn(string $id): string
{
    global $pageId;
    return $pageId === $id ? ' is-current' : '';
}
$chev = '<svg width="12" height="12" viewBox="0 0 12 12" aria-hidden="true"><path d="M2 4l4 4 4-4" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($pageTitle) ?> | <?= e(SITE_NAME) ?></title>
  <meta name="description" content="<?= e($pageDesc) ?>">
  <link rel="icon" href="assets/img/logo.png" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&family=Young+Serif&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <script>document.documentElement.classList.add("js");</script>
  <script src="assets/js/main.js" defer></script>
</head>
<body>
<header class="site-header">
  <div class="flag" aria-hidden="true"></div>
  <div class="container bar">
    <a class="brand" href="index.php" aria-label="<?= e(SITE_NAME) ?> — Inicio">
      <img src="assets/img/logo.png" width="48" height="48" alt="">
      <span><?= e(SITE_NAME) ?></span>
    </a>

    <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" aria-label="Abrir menú">
      <span></span><span></span><span></span>
    </button>

    <nav id="site-nav" class="nav" aria-label="Principal">
      <ul class="nav-list">
        <li><a class="nav-link<?= curBtn('inicio') ?>" href="index.php"<?= cur('inicio') ?>>Inicio</a></li>

        <li class="has-sub">
          <button class="nav-btn<?= curBtn('marco') ?>" type="button" aria-expanded="false">Marco Teórico <?= $chev ?></button>
          <div class="dropdown">
            <a class="dd-all" href="marco-teorico.php">Ver página completa</a>
            <p class="sub-title">Contenido</p>
            <?php foreach ($marco as $i => $m): ?>
              <a class="dd-link" href="marco-teorico.php#<?= e($m['id']) ?>"><b><?= $i + 1 ?></b><span><?= e($m['title']) ?></span></a>
            <?php endforeach; ?>
          </div>
        </li>

        <li class="has-sub">
          <button class="nav-btn<?= curBtn('analisis') ?>" type="button" aria-expanded="false">Análisis Estructurado <?= $chev ?></button>
          <div class="dropdown">
            <a class="dd-all" href="analisis-estructurado.php">Ver página completa</a>
            <p class="sub-title">Modelo Ambiental</p>
            <?php foreach ($ambiental as $a): ?>
              <a class="dd-link" href="analisis-estructurado.php#<?= e($a['id']) ?>"><b><?= $a['n'] ?></b><span><?= e($a['title']) ?></span></a>
            <?php endforeach; ?>
            <p class="sub-title">Modelo de Comportamiento</p>
            <?php foreach ($comportamiento as $c): ?>
              <a class="dd-link" href="analisis-estructurado.php#<?= e($c['id']) ?>"><b><?= $c['n'] ?></b><span><?= e($c['title']) ?></span></a>
            <?php endforeach; ?>
          </div>
        </li>

        <li><a class="nav-link<?= curBtn('oo') ?>" href="orientada-objetos.php"<?= cur('oo') ?>>Orientada a Objetos</a></li>
        <li><a class="nav-link<?= curBtn('videos') ?>" href="videos.php"<?= cur('videos') ?>>Videos</a></li>
        <li><a class="nav-link<?= curBtn('contacto') ?>" href="contacto.php"<?= cur('contacto') ?>>Contacto</a></li>
        <li class="nav-cta">
          <a class="btn" href="<?= e(VET_URL) ?>"<?= VET_EXTERNAL ? ' target="_blank" rel="noopener"' : '' ?>>Visitar Veterinaria</a>
        </li>
      </ul>
    </nav>
  </div>
</header>
