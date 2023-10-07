# Changelog
Todas as mudanças notáveis neste projeto serão documentadas neste arquivo.

O formato é baseado em [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

## [1.9.1] - 20/10/2019
### Fixo
- Corrigidos seletores de "texto" quebrados [#175](https://sourceforge.net/p/simplehtmldom/bugs/175/)

## [1.9] - 30/05/2019
### Adicionado
- Adicionado teste de unidade para relatórios de bugs
   - Adicionado teste para bug [#153](https://sourceforge.net/p/simplehtmldom/bugs/153/)
   - Adicionado teste para bug [#163](https://sourceforge.net/p/simplehtmldom/bugs/163/)
   - Adicionado teste para bug [#166](https://sourceforge.net/p/simplehtmldom/bugs/166/)
   - Adicionado teste para bug [#169](https://sourceforge.net/p/simplehtmldom/bugs/169/)
- Adicionado teste de unidade para conjuntos de caracteres UTF-8, CP1251 e CP1252 (#142)
- Adicionado suporte para meta charset para parse_charset
- Adicionada detecção para CP1251 para parse_charset, usando iconv
- Adicionado arquivo LICENSE (MIT) à raiz do projeto
- Funções adicionadas ao `simple_html_dom_node`
   - `remove`: Remove o nó atual recursivamente da árvore DOM
   - `removeChild`: Remove um nó filho recursivamente da árvore DOM
   - `hasClass`: verifica se o nó atual tem o nome de classe especificado
   - `addClass`: Adiciona uma ou mais classes ao nó atual
   - `removeClass`: Remove uma ou mais classes do nó atual
   - `save`: Salva o nó atual no disco
### Mudado
- Manual alterado de implementação personalizada para MkDocs (https://www.mkdocs.org/)
### Fixo
- Corrigido aviso ao tentar limpar () o DOM em uma lista de nós nulos (#153)
- Corrigido espaço em branco ausente ao retornar texto simples (# 163)
- Corrigida detecção quebrada de atributos duplicados (# 166)
- Corrigida detecção quebrada de documentos CP1252 (ISO-8859-1) (#142)
- Corrigido erro usando o combinador do próximo irmão ('E + F') no último filho
- Corrigida a análise do seletor para seletores de atributos que terminam em "s" ou "i" (#169)

## [1.8.1] - 2019-01-13
### Fixo
- Corrigidos vários bugs relacionados à análise de classes e ids

## [1.8] - 13/01/2019
### Adicionado
- Adicionada documentação para `simple_html_dom_node::find`
- Adicionada documentação para `simple_html_dom_node::parse_selector`
- Adicionada documentação para `simple_html_dom_node::seek`
- Adicionada documentação para `simple_html_dom_node::match`
- Adicionado testes de unidade para relatórios de bugs
   - Adicionado teste para bug [#62](https://sourceforge.net/p/simplehtmldom/bugs/62/)
   - Adicionado teste para bug [#79](https://sourceforge.net/p/simplehtmldom/bugs/79/)
   - Adicionado teste para bug [#144](https://sourceforge.net/p/simplehtmldom/bugs/144/)
- Adicionado testes de unidade para seletores CSS
- Adicionada capacidade de definir constantes antes que simple_html_dom o faça
   - 'DEFAULT_TARGET_CHARSET'
   - 'DEFAULT_BR_TEXT'
   - 'DEFAULT_SPAN_TEXT'
   - 'MAX_FILE_SIZE'
- Adicionado suporte para combinadores CSS
   - Adicionado suporte para Child Combinator (`>`)
   - Adicionado suporte para Next Sibling Combinator (`+`)
   - Adicionado suporte para Subseqüente Sibling Combinator (`~`)
- Adicionado suporte para seletores multiclasse (`.class.class.class`)
- Adicionado suporte para seletores multiatributo (`[attr1][attr2][attribute3]`)
- Adicionado suporte para seletores de atributo
   - Adicionado suporte para seletores de pipe (`|=`)
   - Adicionado suporte para seletores de til (`~=`)
   - Adicionado suporte para seletores de diferenciação de maiúsculas e minúsculas (`i` e `s`)
- Adicionado testes de unidade para compatibilidade PHP com PHP 5.6+
- Adicionado padrão de codificação usando PHP_CodeSniffer
### Mudado
- Filtragem automática removida dos seletores 'tbody' (#79)
   > Remova 'tbody' de todos os seletores para manter o estado anterior!
- Padrão de codificação usando PHP_CodeSniffer
### Fixo
- Corrigidos atributos de seletor de CSS quebrados com valor "0" (#62)
- Corrigido simple_html_dom::load_file quebrado
- Correção de barras no seletor CSS que quebra a correspondência de valor usando '*=' (#144)
- Seletores universais fixos

## [1.7] - 10/12/2018
### Adicionado
- Adicionado documentação de código para melhorar a legibilidade
- Adicionado testes de unidade para `simple_html_dom::$self_closing_tags`
- Adicionado testes de unidade para `simple_html_dom::$optional_closing_tags`
- Adicionado testes de unidade para relatórios de bugs
   - Adicionado teste para bug [#56](https://sourceforge.net/p/simplehtmldom/bugs/56/)
   - Adicionado teste para bug [#97](https://sourceforge.net/p/simplehtmldom/bugs/97/)
   - Adicionado teste para bug [#116](https://sourceforge.net/p/simplehtmldom/bugs/116/)
   - Adicionado teste para bug [#121](https://sourceforge.net/p/simplehtmldom/bugs/127/)
   - Adicionado teste para bug [#127](https://sourceforge.net/p/simplehtmldom/bugs/127/)
   - Adicionado teste para bug [#154](https://sourceforge.net/p/simplehtmldom/bugs/154/)
   - Adicionado teste para bug [#160](https://sourceforge.net/p/simplehtmldom/bugs/160/)
- Adicionado testes de unidade para gerenciamento de memória do analisador
- Adicionado bit flags a `simple_html_dom::load()`
   - Adicionado sinalizador de bit `HDOM_SMARTY_AS_TEXT` para filtrar opcionalmente scripts Smarty (#154)\
   **Nota**: Os scripts Smarty não são mais filtrados por padrão!\
- Adicionado script de compilação para automatizar lançamentos
- Adicionado suporte para atributos sem espaço em branco para separá-los
### Mudado
- Documentação e legibilidade aprimoradas para `$self_closing_tags`
- Documentação e legibilidade aprimoradas para `$block_tags`
- Documento melhorado