<?php
function drawPage($datas_page) {
    extract($datas_page);

    ob_start();
    require_once($view);
    $content = ob_get_clean();

    // 🛡️ Sécurisation du layout
    if (!empty($layout) && file_exists($layout)) {
        require_once($layout);
    } else {
        echo $content;
    }
}