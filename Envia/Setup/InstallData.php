<?php
namespace Chupa\Sobreprecio\Setup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class InstallData implements InstallDataInterface{
    private $eav_setup_factory;

    public function __construct(EavSetupFactory $eav_setup_factory)
    {
        $this->eav_setup_factory = $eav_setup_factory;
    }

    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $eav_setup = $this->eav_setup_factory->create(['setup' => $setup]);
       
            $eav_setup->removeAttribute(\Magento\Catalog\Model\Product::ENTITY, 'lock_price');
  
        $eav_setup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'lock_price',
          [
                'type'          => 'int',
                'frontend'      => '',
                'label'         => 'Lock Price',
                'input'         => 'text',
                'class'         => '',
                'attribute_set' => 'Default',
                'global'        => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'       => true,
                'required'      => false,
                'user_defined'  => true,
                'default'       => null,
                'searchable'    => false,
                'filterable'    => true,
                'comparable'    => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique'        => false,
                'apply_to'      => '',
                'system'        => 1,
                'group'         => 'Attributes List'
            ]
        );


 
 
    }}
