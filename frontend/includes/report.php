<?php
/** Helpers para las páginas con formato de informe. */

$GLOBALS['figN'] = 0;

/** Figura numerada con pie de imagen; al hacer clic se amplía. */
function figure(string $file, string $caption, string $alt = ''): string
{
    $GLOBALS['figN']++;
    $src = 'assets/img/diagramas/' . $file;
    return '<figure class="fig">'
        . '<button type="button" class="fig-btn" data-full="' . e($src) . '" aria-label="Ampliar: ' . e($caption) . '">'
        . '<img src="' . e($src) . '" alt="' . e($alt !== '' ? $alt : $caption) . '" loading="lazy">'
        . '<span class="fig-zoom">Ampliar</span></button>'
        . '<figcaption><strong>Figura ' . $GLOBALS['figN'] . '.</strong> ' . e($caption) . '</figcaption></figure>';
}

/** Etiqueta de borrador para apartados con contenido propuesto. */
function draft(string $note = 'Borrador por validar'): string
{
    return SHOW_DRAFT_BADGES ? '<span class="draft">' . e($note) . '</span>' : '';
}

/**
 * Índice lateral. $items: [ [id, etiqueta], ... ] (etiqueta con prefijo "- " para subnivel).
 */
function toc(array $items): string
{
    $out = '<nav class="toc" aria-label="En esta página"><p class="toc-title">En esta página</p><ol>';
    foreach ($items as [$id, $label]) {
        $sub = str_starts_with($label, '- ');
        $out .= '<li' . ($sub ? ' class="sub"' : '') . '><a href="#' . e($id) . '">' . e($sub ? substr($label, 2) : $label) . '</a></li>';
    }
    return $out . '</ol></nav>';
}

/** Lista corta de procesos. */
function proc_list(array $procs): string
{
    $out = '<ul class="procs">';
    foreach ($procs as $p) {
        $out .= '<li>' . e($p) . '</li>';
    }
    return $out . '</ul>';
}
