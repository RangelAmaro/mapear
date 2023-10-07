<?php

require '../../simple_html_dom.php';

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $linkUrls = extrairUrlsLinks($url);
    if (!empty($linkUrls)) {
        echo "URLs de Links da página:<br>";
        foreach ($linkUrls as $linkUrl) {
            echo $linkUrl . "<br>";
        }
    } else {
        echo "Nenhuma URL de Link encontrada na página.";
    }
}

function extrairUrlsLinks($url) {
    $html = new simple_html_dom();
    $html->load_file($url);

    $linkUrls = [];

    // Extrair links <a>
    $links = $html->find('a');
    foreach ($links as $link) {
        $href = $link->getAttribute('href');
        if (!empty($href) && filter_var($href, FILTER_VALIDATE_URL)) {
            $linkUrls[] = $href;
        }
    }

    // Limpar a memória liberando o objeto Simple HTML DOM
    $html->clear();
    unset($html);

    return $linkUrls;
}

?>