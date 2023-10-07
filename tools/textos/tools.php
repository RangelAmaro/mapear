<?php

require '../../simple_html_dom.php';

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $data = extrairDadosPagina($url);
    if (!empty($data)) {
        echo "<h1>Títulos da página:</h1>";
        foreach ($data['titulos'] as $titulo) {
            echo "<h2>" . $titulo . "</h2>";
        }

        echo "<h1>Parágrafos da página:</h1>";
        foreach ($data['paragrafos'] as $paragrafo) {
            echo "<p>" . $paragrafo . "</p>";
        }
    } else {
        echo "Nenhum título ou parágrafo encontrado na página.";
    }
}

function extrairDadosPagina($url) {
    $html = new simple_html_dom();
    $html->load_file($url);

    $titulos = [];
    $paragrafos = [];

    // Extrair títulos
    $headingTags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
    foreach ($headingTags as $tag) {
        $headings = $html->find($tag);
        foreach ($headings as $heading) {
            $titulos[] = $heading->plaintext;
        }
    }

    // Extrair parágrafos
    $paragraphs = $html->find('p');
    foreach ($paragraphs as $paragraph) {
        $paragrafos[] = $paragraph->plaintext;
    }

    // Limpar a memória liberando o objeto Simple HTML DOM
    $html->clear();
    unset($html);

    return [
        'titulos' => $titulos,
        'paragrafos' => $paragrafos,
    ];
}

?>