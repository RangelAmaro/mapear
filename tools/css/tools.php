<?php

require '../../simple_html_dom.php';

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $linksStylesheet = extrairLinksStylesheet($url);
    if (!empty($linksStylesheet)) {
        echo "Links de Stylesheet:<br>";
        foreach ($linksStylesheet as $link) {
            echo $link . "<br>";
        }
    } else {
        echo "Nenhum link de Stylesheet encontrado.";
    }
}

function extrairLinksStylesheet($url) {
    $html = new simple_html_dom();
    $html->load_file($url);

    $linksStylesheet = [];

    $stylesheetTags = $html->find('link[rel=stylesheet]');
    foreach ($stylesheetTags as $tag) {
        $href = $tag->getAttribute('href');
        if (!empty($href)) {
            if (!filter_var($href, FILTER_VALIDATE_URL)) {
                // Se o link do stylesheet não for uma URL completa, construir a URL completa
                $href = rtrim($url, '/') . '/' . ltrim($href, '/');
            }
            $linksStylesheet[] = $href;
        }
    }

    // Limpar a memória liberando o objeto Simple HTML DOM
    $html->clear();
    unset($html);

    return $linksStylesheet;
}

?>