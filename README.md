# Parcelamento

O Parcelamento é um módulo que exibe o valor do produto parcelado também na página de listagem dos produtos como na página de detalhe.

# Especificações (Versão utilizada para desenvolvimento)

Magento versão 2.4.1.

# Instalação

Faça o download deste pacote na pasta "app/code" do seu projeto magento.
Habilite o módulo executando:
```bash
php bin/magento module:enable DentalSpeed_ProdutoParcelamento
```

Aplique as atualizações executando:
```bash
php bin/magento setup:upgrade 
```

e:
```bash
php bin/magento setup:di:compile
```

Limpe o cache executando:
```bash
php bin/magento cache:flush.
```

# Instruções Para Teste

1. Instale o módulo ProdutoParcelamento seguindo as instruções de instalação acima.
2. Efetue o login no painel administrativo.
3. Navegue até o cadastro de produtos (Catalog/Products).
4. Selecione um produto e preencha o campo "Número de parcelas" com a quantidade de parcelas que deseja.
5. Salve o produto e vá até a loja para poder visualizar os valores parcelados do produto selecionado, tanto na listagem como no detalhe do produto.
