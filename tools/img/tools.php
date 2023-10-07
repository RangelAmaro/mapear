<?php

require '../../simple_html_dom.php';

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $imageUrls = extrairUrlsImagens($url);
    if (!empty($imageUrls)) {
        echo "URLs das Imagens na página:<br>";
        foreach ($imageUrls as $imageUrl) {
            echo "<img src='{$imageUrl}' ><br>";
        }
    } else {
        echo "Nenhuma URL de Imagem encontrada na página.";
    }
}

function extrairUrlsImagens($url) {
    $html = new simple_html_dom();
    $html->load_file($url);

    $imageUrls = [];

    // Extrair URLs de imagens
    $images = $html->find('img');
    foreach ($images as $image) {
        $src = $image->getAttribute('src');
        if (!empty($src) && filter_var($src, FILTER_VALIDATE_URL)) {
            $imageUrls[] = $src;
        }
    }

    // Limpar a memória liberando o objeto Simple HTML DOM
    $html->clear();
    unset($html);

    return $imageUrls;
}

?>