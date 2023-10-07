EM PORTUGES

# Começo rápido

Encontre abaixo o código de amostra que demonstra os recursos fundamentais do PHP Simples
Analisador HTML DOM.

## Ler texto simples de documento HTML

```php
echo file_get_html('https://www.google.com/')->texto simples;
```

Carrega o **documento** HTML especificado na memória, analisa-o e retorna o
texto simples. Observe que [`file_get_html`](api/api.md) também suporta arquivos locais
como arquivos remotos!

## Leia o texto simples da string HTML

```php
echo str_get_html('<ul><li>Olá, Mundo!</li></ul>')->texto simples;
```

Analisa a **string** HTML fornecida e retorna o texto simples. Observe que o
parser manipula documentos parciais, bem como documentos completos.

## Ler elementos específicos do documento HTML

```php
$html = file_get_html('https://www.google.com/');

foreach($html->find('img') as $elemento)
     echo $elemento->src . '<br>';

foreach($html->find('a') as $elemento)
     echo $elemento->href . '<br>';
```

Carrega o documento especificado na memória e retorna uma lista de fontes de imagem como
bem como links de âncora. Note que [`find`](manual/finding-html-elements.md)
suporta seletores [CSS](https://www.w3.org/TR/selectors/) para encontrar elementos em
o DOM.

## Modificar documentos HTML

```php
$doc = '<div id="hello">Olá, </div><div id="world">Mundo!</div>';

$html = str_get_html($doc);

$html->find('div', 1)->class = 'barra';
$html->find('div[id=olá]', 0)->innertext = 'foo';

eco$html; // <div id="hello">foo</div><div id="world" class="bar">Mundo!</div>
```

Analisa a string HTML fornecida e substitui elementos no DOM antes de retornar
a string HTML atualizada. Neste exemplo, a classe para o segundo elemento `div`
é definido como `bar` e o texto interno do primeiro elemento `div` como `foo`.

Observe que [`find`](manual/finding-html-elements.md) suporta um segundo parâmetro
para retornar um único elemento da matriz de correspondências.

Observe que os atributos podem ser acessados diretamente por meio de métodos mágicos
(`->class` e `->innertext` no exemplo acima).

## Colete informações do Slashdot

```php
$html = file_get_html('https://slashdot.org/');

$articles = $html->find('article[data-fhtype="story"]');

foreach($artigos como $artigo) {
     $item['title'] = $article->find('.story-title', 0)->texto simples;
     $item['intro'] = $artigo->find('.p', 0)->texto simples;
     $item['details'] = $article->find('.details', 0)->plaintext;
     $itens[] = $itens;
}

print_r($itens);
```

Coleta informações de [Slashdot](https://slashdot.org/) para posterior processamento.

Observe que a combinação de seletores CSS e métodos mágicos torna o processo de
analisar documentos HTML é uma tarefa simples e fácil de entender.


## ##########################

ORIGINAL INGLES

## ##########################


# Quick Start

Find below sample code that demonstrate the fundamental features of PHP Simple
HTML DOM Parser.

## Read plain text from HTML document

```php
echo file_get_html('https://www.google.com/')->plaintext;
```

Loads the specified HTML **document** into memory, parses it and returns the
plain text. Note that [`file_get_html`](api/api.md) supports local files as well
as remote files!

## Read plaint text from HTML string

```php
echo str_get_html('<ul><li>Hello, World!</li></ul>')->plaintext;
```

Parses the provided HTML **string** and returns the plain text. Note that the
parser handles partial documents as well as full documents.

## Read specific elements from HTML document

```php
$html = file_get_html('https://www.google.com/');

foreach($html->find('img') as $element)
    echo $element->src . '<br>';

foreach($html->find('a') as $element)
    echo $element->href . '<br>';
```

Loads the specified document into memory and returns a list of image sources as
well as anchor links. Note that [`find`](manual/finding-html-elements.md)
supports [CSS](https://www.w3.org/TR/selectors/) selectors to find elements in
the DOM.

## Modify HTML documents

```php
$doc = '<div id="hello">Hello, </div><div id="world">World!</div>';

$html = str_get_html($doc);

$html->find('div', 1)->class = 'bar';
$html->find('div[id=hello]', 0)->innertext = 'foo';

echo $html; // <div id="hello">foo</div><div id="world" class="bar">World!</div>
```

Parses the provided HTML string and replaces elements in the DOM before returning
the updated HTML string. In this example, the class for the second `div` element
is set to `bar` and the inner text for the first `div` element to `foo`.

Note that [`find`](manual/finding-html-elements.md) supports a second parameter
to return a single element from the array of matches.

Note that attributes can be accessed directly by the means of magic methods
(`->class` and `->innertext` in the example above).

## Collect information from Slashdot

```php
$html = file_get_html('https://slashdot.org/');

$articles = $html->find('article[data-fhtype="story"]');

foreach($articles as $article) {
    $item['title'] = $article->find('.story-title', 0)->plaintext;
    $item['intro'] = $article->find('.p', 0)->plaintext;
    $item['details'] = $article->find('.details', 0)->plaintext;
    $items[] = $item;
}

print_r($items);
```

Collects information from [Slashdot](https://slashdot.org/) for further processing.

Note that the combination of CSS selectors and magic methods make the process of
parsing HTML documents a simple task that is easy to understand.