<?php

require '../../simple_html_dom.php';

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $allUrls = extrairTodasUrls($url);
    if (!empty($allUrls)) {
        echo "Todas as URLs no conteúdo completo do HTML:<br>";
        foreach ($allUrls as $url) {
            echo $url . "<br>";
        }
    } else {
        echo "Nenhuma URL encontrada no conteúdo completo do HTML.";
    }
}

function extrairTodasUrls($url) {
    $html = new simple_html_dom();
    $html->load_file($url);

    $allUrls = [];

    $elements = $html->find('*');
    foreach ($elements as $element) {
        // Extrair atributos com URLs (href, src, etc.)
        foreach ($element->getAllAttributes() as $attrName => $attrValue) {
            if (filter_var($attrValue, FILTER_VALIDATE_URL)) {
                $allUrls[] = $attrValue;
            }
        }
    }

    // Limpar a memória liberando o objeto Simple HTML DOM
    $html->clear();
    unset($html);

    return $allUrls;
}

?>