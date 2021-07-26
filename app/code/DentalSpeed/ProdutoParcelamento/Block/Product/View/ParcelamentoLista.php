<?php
declare(strict_types=1);

namespace DentalSpeed\ProdutoParcelamento\Block\Product\View;

class ParcelamentoLista extends \Magento\Framework\View\Element\Template
{
    /**
     * @var $_converteMoeda
     */
    protected $_converteMoeda;
    
    public function __construct(
            \Magento\Backend\Block\Template\Context $context,
            \Magento\Catalog\Block\Product\View $productView,
            \Magento\Framework\Pricing\Helper\Data $converteMoeda,
            array $data = []
        )
    {
        $this->_converteMoeda = $converteMoeda;
        parent::__construct($context, $data);
    }

    /**
     * Retorna o número de parcelas
     */
    public function getProdutoNumeroParcelas()
    {  
        return (int) $this->getProduct()->getNumParcelas();
    }

    /**
     * Retorna preço final do produto parcelado
     */
    public function getProdutoValorParcelado()
    {
        $parcelas = $this->getProdutoNumeroParcelas();
        $produtoValorFinal = $this->getProduct()->getFinalPrice();
        return $this->converteMoeda($produtoValorFinal/$parcelas);
    }

    /**
     * Retorna valor no formato moeda
     * @param $valor
     * @param $simbolo
     */
    public function converteMoeda($valor,$simbolo='S')
    {   
        if($simbolo == 'N'){
            $retorno = str_replace('R$','',$this->_converteMoeda->currency($valor, true, false));
        } else {
            $retorno = $this->_converteMoeda->currency($valor, true, false);
        }
        return $retorno;
    }
}