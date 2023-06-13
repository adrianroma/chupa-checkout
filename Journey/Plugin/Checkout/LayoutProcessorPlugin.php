<?php
namespace Chupa\Journey\Plugin\Checkout;

class LayoutProcessorPlugin
{
    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array  $jsLayout
    ) {
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['before-form']['children']['delivery_date'] = [
            'component' => 'Magento_Ui/js/form/element/date',
            'config' => [
                'customScope' => 'shippingAddress',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/date',
                'options' => [],
                'id' => 'delivery_date'
            ],
            'dataScope' => 'shippingAddress.delivery_date',
            'label' => __('Delivery Date'),
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => [],
            'sortOrder' => 230,
            'id' => 'delivery_date'
        ];

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['gender'] = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                'customScope' => 'shippingAddress',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select',
                'id' => 'drop-down',
            ],
            'dataScope' => 'shippingAddress.drop_down',
            'label' => 'Gender',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => [],
            'sortOrder' => 380,
            'id' => 'gender',
            'options' => [
                [
                    'value' => '',
                    'label' => 'Please Select',
                ],
                [
                    'value' => 'famale',
                    'label' => 'Famale',
                ],
                [
                    'value' => 'male',
                    'label' => 'Male',
                ]
            ],
            'value' => 'famale' // value field is used to set a default value of the attribute
        ];
        
        return $jsLayout;
    }
}