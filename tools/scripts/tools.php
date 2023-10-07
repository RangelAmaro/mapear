<?php

require '../../simple_html_dom.php';

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $scriptUrls = extrairUrlsScript($url);
    if (!empty($scriptUrls)) {
        echo "URLs dos Scripts:<br>";
        foreach ($scriptUrls as $scriptUrl) {
            echo $scriptUrl . "<br>";
        }
    } else {
        echo "Nenhuma URL de Script encontrada.";
    }
}

function extrairUrlsScript($url) {
    $html = new simple_html_dom();
    $html->load_file($url);

    $scriptUrls = [];

    $scriptTags = $html->find('script');
    foreach ($scriptTags as $tag) {
        $src = $tag->getAttribute('src');
        if (!empty($src)) {
            if (!filter_var($src, FILTER_VALIDATE_URL)) {
                // Se o link do script não for uma URL completa, construir a URL completa
                $src = rtrim($url, '/') . '/' . ltrim($src, '/');
            }
            $scriptUrls[] = $src;
        }
    }

    // Limpar a memória liberando o objeto Simple HTML DOM
    $html->clear();
    unset($html);

    return $scriptUrls;
}

?>