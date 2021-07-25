<?php
declare(strict_types=1);  //Validaçãoo de tipo da váriavel

namespace DentalSpeed\ProdutoParcelamento\Block\Product\View;

class Parcelamento extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Catalog\Model\ProductRepository
     */
    protected $_productRepo;
    protected $_registry;
    protected $_converteMoeda;
    
    public function __construct(
            \Magento\Backend\Block\Template\Context $context,
            \Magento\Catalog\Model\ProductRepository $productRepo,
            \Magento\Framework\Registry $registry,
            \Magento\Framework\Pricing\Helper\Data $converteMoeda,
            array $data = []
        )
    {
        $this->_productRepo = $productRepo;
        $this->_registry = $registry;
        $this->_converteMoeda = $converteMoeda;
        parent::__construct($context, $data);
    }

    /**
     * Retorna valor do atributo personalizado do produto
     * @param $campo
     */
    public function getProdutoAtributoPersolalizado($campo=null)
    {
        $retorno = false;
        if($campo){
            $produtoAtual = $this->_registry->registry('current_product');
            $produto = $this->_productRepo->getById($produtoAtual->getId());
            if(is_object($produto->getCustomAttribute($campo))){
                $retorno = $produto->getCustomAttribute($campo)->getValue();
            } 
        } 

        return $retorno;
    }

    /**
     * Retorna valor final do produto atual
     */
    public function getProdutoValorFinal()
    {
        $produtoAtual = $this->_registry->registry('current_product');
        $produto = $this->_productRepo->getById($produtoAtual->getId());
        return $produto->getFinalPrice();
    }

    /**
     * Retorna valor final do produto atual parcelado
     */
    public function getProdutoValorParcelado()
    {
        $numeroParcelas = $this->getProdutoAtributoPersolalizado('num_parcelas');
        $produtoValorFinal = $this->getProdutoValorFinal();
        $retorno = false;

        if($numeroParcelas && $produtoValorFinal){
            $retorno = $this->converteMoeda($produtoValorFinal/$numeroParcelas);
        } 
        return $retorno;
    }

    /**
     * Retorna valor no formato moeda
     * @param $valor
     * @param $simbolo
     */
    public function converteMoeda($valor,$simbolo='S')
    {   
        $retorno = false;
        if($simbolo == 'N'){
            $retorno = str_replace('R$','',$this->_converteMoeda->currency($valor, true, false));
        } else {
            $retorno = $this->_converteMoeda->currency($valor, true, false);
        }

        return $retorno;
    }
}