<?php
// Función para generar un enlace HTML
function linkHombre($texto, $url) {
    $linkHombre = '<a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($texto) . '</a>';
    return $linkHombre;
}
function linkMujer($texto, $url) {
    $linkMujer = '<a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($texto) . '</a>';
    return $linkMujer;
}
function linkInfantil($linkInfantil) {
    $linkInfantil = 'href=" "';
    return $linkInfantil;
}
function generarEnlace($texto, $url) {
    $enlace = '<a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($texto) . '</a>';
    return $enlace;
}
?>
