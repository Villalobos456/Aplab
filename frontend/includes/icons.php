<?php
/** Pequeños helpers de presentación. */

function paw_svg(int $size = 24): string
{
    return '<svg viewBox="0 0 24 24" width="' . $size . '" height="' . $size . '" fill="currentColor" aria-hidden="true" focusable="false">'
        . '<ellipse cx="6" cy="10" rx="2" ry="2.8"/><ellipse cx="10" cy="6" rx="2" ry="2.8"/>'
        . '<ellipse cx="14" cy="6" rx="2" ry="2.8"/><ellipse cx="18" cy="10" rx="2" ry="2.8"/>'
        . '<path d="M12 11c-3.3 0-6 3.2-6 5.7 0 2 1.8 2.6 3.2 2 1.8-.8 3.8-.8 5.6 0 1.4.6 3.2 0 3.2-2C18 14.2 15.3 11 12 11z"/></svg>';
}

/** Fila de huellas caminando (decoración, una sola vez en el inicio). */
function paw_trail(int $count = 10): string
{
    $out = '<div class="trail" aria-hidden="true">';
    for ($i = 0; $i < $count; $i++) {
        $out .= '<span>' . paw_svg(26) . '</span>';
    }
    return $out . '</div>';
}

/** Hueso decorativo (separador). */
function bone_svg(int $w = 64): string
{
    return '<svg viewBox="0 0 64 24" width="' . $w . '" height="' . round($w * 24 / 64) . '" fill="currentColor" aria-hidden="true" focusable="false">'
        . '<circle cx="9" cy="7" r="5.5"/><circle cx="9" cy="17" r="5.5"/><circle cx="55" cy="7" r="5.5"/><circle cx="55" cy="17" r="5.5"/>'
        . '<rect x="9" y="7" width="46" height="10" rx="3"/></svg>';
}

/** Título de las páginas internas. */
function page_title(string $title, string $sub): string
{
    return '<section class="page-title"><div class="container">'
        . '<h1>' . e($title) . '</h1><p>' . e($sub) . '</p>'
        . '<span class="tricolor" aria-hidden="true"></span>'
        . '<span class="pt-paws" aria-hidden="true"><i>' . paw_svg(54) . '</i><i>' . paw_svg(38) . '</i><i>' . paw_svg(28) . '</i></span>'
        . '</div></section>';
}
