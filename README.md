**Parcelamento**

    O Parcelamento é um módulo que exibe o valor do produto parcelado também na página de listagem dos produtos como na página de detalhe.

**Especificações (Versão utilizada para desenvolvimento)**

    Magento versão 2.4.1.

**Instalação**

    Faça o download deste pacote na pasta "app/code" do seu projeto magento.
    Habilite o módulo executando php bin/magento module:enable DentalSpeed_ProdutoParcelamento.
    Aplique as atualizações executando php bin/magento setup:upgrade e php bin/magento setup:di:compile.
    Limpe o cache executando php bin/magento cache:flush.

**Instruções Para Teste (Instalação padrão do magento 2.4.1)**

    Instale o módulo ProdutoParcelamento seguindo as instruções de instalação acima.
    Efetue o login no painel administrativo.
    Navegue até o cadastro de produtos (Catalog/Products) 
    Selecione um produto, e preencha o campo "Número de parcelas" com a quantidade de parcelas que deseja.
    Salve o produto e vá até a loja para poder visualizar os valores parcelados do produto selecionado, tanto na listagem como no detalhe do produto.
