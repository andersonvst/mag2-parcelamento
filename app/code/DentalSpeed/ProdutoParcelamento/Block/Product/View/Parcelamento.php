<?php
declare(strict_types=1);

namespace DentalSpeed\ProdutoParcelamento\Block\Product\View;

class Parcelamento extends \Magento\Framework\View\Element\Template
{
    /**
     * @var $_registry
     */
    protected $_registry;

    /**
     * @var $_converteMoeda
     */
    protected $_converteMoeda;
    
    public function __construct(
            \Magento\Backend\Block\Template\Context $context,
            \Magento\Framework\Registry $registry,
            \Magento\Framework\Pricing\Helper\Data $converteMoeda,
            array $data = []
        )
    {
        $this->_registry = $registry;
        $this->_converteMoeda = $converteMoeda;
        parent::__construct($context, $data);
    }

    /**
     * Retorna o número de parcelas
     */
    public function getProdutoNumeroParcelas()
    {
        return (int) $this->_registry->registry('current_product')->getNumParcelas();
    }

    /**
     * Retorna preço final do produto parcelado
     */
    public function getProdutoValorParcelado()
    {
        $parcelas = $this->getProdutoNumeroParcelas();
        $produtoValorFinal = $this->_registry->registry('current_product')->getFinalPrice();
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