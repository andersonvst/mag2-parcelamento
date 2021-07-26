<?php
namespace DentalSpeed\ProdutoParcelamento\Plugin;

class ProductList
{   
    protected $_layout;

    public function __construct(
        \Magento\Framework\View\LayoutInterface $layout
    ) {
        $this->_layout = $layout;
    }

    public function aroundGetProductDetailsHtml(
        \Magento\Catalog\Block\Product\AbstractProduct $subject,
        \Closure $proceed,
        \Magento\Catalog\Model\Product $product
    ) {
        return $this->_layout->createBlock('DentalSpeed\ProdutoParcelamento\Block\Product\View\ParcelamentoLista')->setProduct($product)->setTemplate('DentalSpeed_ProdutoParcelamento::product/view/parcelamento-lista.phtml')->toHtml();
    }               
}