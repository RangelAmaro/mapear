<?php

require '../../simple_html_dom.php';

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $allUrls = extrairTodasUrls($url);
    if (!empty($allUrls)) {
        echo "Todas as URLs da página:<br>";
        foreach ($allUrls as $url) {
            echo $url . "<br>";
        }
    } else {
        echo "Nenhuma URL encontrada na página.";
    }
}

function extrairTodasUrls($url) {
    $html = new simple_html_dom();
    $html->load_file($url);

    $allUrls = [];

    // Extrair links <a>
    $links = $html->find('a');
    foreach ($links as $link) {
        $href = $link->getAttribute('href');
        if (!empty($href) && filter_var($href, FILTER_VALIDATE_URL)) {
            $allUrls[] = $href;
        }
    }

    // Extrair URLs de imagens
    $images = $html->find('img');
    foreach ($images as $image) {
        $src = $image->getAttribute('src');
        if (!empty($src) && filter_var($src, FILTER_VALIDATE_URL)) {
            $allUrls[] = $src;
        }
    }

    // Extrair URLs de scripts
    $scripts = $html->find('script[src]');
    foreach ($scripts as $script) {
        $src = $script->getAttribute('src');
        if (!empty($src) && filter_var($src, FILTER_VALIDATE_URL)) {
            $allUrls[] = $src;
        }
    }

    // Extrair URLs de folhas de estilo
    $stylesheets = $html->find('link[rel=stylesheet]');
    foreach ($stylesheets as $stylesheet) {
        $href = $stylesheet->getAttribute('href');
        if (!empty($href) && filter_var($href, FILTER_VALIDATE_URL)) {
            $allUrls[] = $href;
        }
    }

    // Limpar a memória liberando o objeto Simple HTML DOM
    $html->clear();
    unset($html);

    return $allUrls;
}

?>