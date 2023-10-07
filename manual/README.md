Esta pasta contém os arquivos fonte para http://simplehtmldom.sourceforge.net/,
a página do projeto para PHP Simple HTML DOM Parser.

Os arquivos de origem são escritos em Markdown: https://en.wikipedia.org/wiki/Markdown

Os dados do site são gerados pelo MkDocs, um gerador de site estático leve para projeto
documentação: https://www.mkdocs.org/

# Estrutura de pastas

`custom_theme` : Contém personalizações para o tema fornecido pelo MkDocs.
`docs` : Contém os arquivos fonte para a página do projeto (as páginas reais).
`site` : Contém os arquivos de saída para a página do projeto quando construído com MkDocs.
`extra.css` : Customizações para os estilos fornecidos pelo MkDocs.
`mkdocs.yml` : O arquivo de configuração que é usado pelo MkDocs para gerar páginas.

# Adicionando novas páginas

Coloque novos arquivos em `source`. Use subpastas (o menor número de níveis possível) para
categorias separadas.

Arquivos adicionados ao manual **não** aparecerão automaticamente na página do projeto.
Todas as páginas precisam ser especificadas no arquivo _mkdocs.yml_ em "nav:". Basta adicionar
o caminho relativo para o novo arquivo, quando apropriado.

Observação: os arquivos não são adicionados automaticamente porque são classificados por nome, caso contrário
especificado manualmente. Como a legibilidade é um fator chave para os manuais, os arquivos devem
ser classificados de forma que fiquem claros para os usuários.

# Configurando MkDocs

As instruções de instalação do MkDocs são fornecidas em sua página inicial:
https://www.mkdocs.org/#installation

O MkDocs cria automaticamente o projeto com base no arquivo _mkdocs.yml_. Encontre o
especificação para este arquivo em https://www.mkdocs.org/user-guide/configuration/.

# Construindo páginas do projeto

O processo de compilação depende da instalação do MkDocs. Normalmente, o MkDocs é
disponibilizados através da linha de comando.

## Passo 1 - Verifique sua versão do MkDocs

Para verificar sua versão do MkDocs, execute este comando:

`mkdocs --versão` ou
`python3 -m mkdocs --version`

Deve retornar `versão 1.0.4` ou superior. Se isso não acontecer, certifique-se de instalar o
versão mais recente usando `pip install mkdocs` ou `python3 -m pip install mkdocs`. Se
você não tem o pip instalado, instale-o via gerenciador de pacotes ou siga as instruções
instruções em https://pip.pypa.io/en/stable/installing/

## Etapa 2 - Visualize o projeto localmente

O MkDocs permite que você visualize os arquivos do projeto em um navegador em sua máquina local:

`mkdocs serve` ou
`python3 -m mkdocs serve`

Se o processo for bem-sucedido, você pode acessar o site em http://127.0.0.1:8000.

## Etapa 3 - Crie o projeto

Se você estiver satisfeito com os resultados do projeto, crie o projeto final
com este comando:

`mkdocs build` ou
`python3 -m mkdocs build`

Encontre os arquivos de saída na pasta `site`.