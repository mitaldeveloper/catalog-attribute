<?php

namespace Mital\Catalog\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

class InstallData implements InstallDataInterface
{
    protected $eavSetupFactory;

    public function __construct(
        EavSetupFactory $eavSetupFactory    
    ){
        $this->_eavSetupFactory = $eavSetupFactory;        
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {       
        $eavSetup       = $this->_eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'custom_checkbox',
            [
            'type'     => 'int',
            'label'    => 'Custom Checkbox',
            'input'    => 'boolean',
            'source'   => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
            'visible'  => true,
            'default'  => '0',
            'required' => false,
            'global'   => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'custom_input',
            [
                'type' => 'text',
                'label' => 'Custom Input',
                'input' => 'text',                
                'source' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => null                
            ]
        );
        
    }
}

?>