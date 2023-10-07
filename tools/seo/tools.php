<?php

require '../../simple_html_dom.php';

if (isset($_POST['url'])) {
    $url = $_POST['url'];
    $dadosDoSite = extrairDadosDoSite($url);
    echo "Domínio: " . $dadosDoSite['dominio'] . "<br>";
    echo "Título: " . $dadosDoSite['titulo'] . "<br>";
    echo "Descrição: " . $dadosDoSite['descricao'] . "<br>";
    echo "Idioma: " . $dadosDoSite['idioma'] . "<br>";
    echo "Favicon: " . $dadosDoSite['favicon'] . "<br>";
}

function extrairDadosDoSite($url) {
    $html = new simple_html_dom();
    $html->load_file($url);

    // Extrair o título do site
    $titulo = $html->find('title', 0)->plaintext;

    // Extrair a descrição do site
    $descricao = "";
    $metaTags = $html->find('meta[name=description]');
    if (!empty($metaTags)) {
        $descricao = $metaTags[0]->getAttribute('content');
    }

    // Extrair o idioma do site
    $idioma = $html->find('html', 0)->getAttribute('lang');

    // Extrair o domínio do site
    $dominio = parse_url($url, PHP_URL_HOST);

    // Extrair o link do favicon
    $favicon = "";
    $faviconTag = $html->find('link[rel*="icon"]', 0);
    if (!empty($faviconTag)) {
        $favicon = $faviconTag->getAttribute('href');
        if (!filter_var($favicon, FILTER_VALIDATE_URL)) {
            // Se o link do favicon não for uma URL completa, construir a URL completa
            $favicon = rtrim($url, '/') . '/' . ltrim($favicon, '/');
        }
    }

    // Limpar a memória liberando o objeto Simple HTML DOM
    $html->clear();
    unset($html);

    // Retornar os dados extraídos em um array
    $dados = [
        'dominio' => $dominio,
        'titulo' => $titulo,
        'descricao' => $descricao,
        'idioma' => $idioma,
        'favicon' => $favicon
    ];

    return $dados;
}

?>
