define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_CheckoutAgreements/js/model/agreements-assigner',
    'Magento_Checkout/js/model/quote',
    'Magento_Customer/js/model/customer',
    'Magento_Checkout/js/model/url-builder',
    'mage/url',
    'Magento_Checkout/js/model/error-processor',
    'uiRegistry'
], function (
    $, 
    wrapper, 
    agreementsAssigner,
    quote,
    customer,
    urlBuilder, 
    urlFormatter, 
    errorProcessor,
    registry
) {
    'use strict';

    return function (placeOrderAction) {

        /** Override default place order action and add agreement_ids to request */
        return wrapper.wrap(placeOrderAction, function (originalAction, paymentData, messageContainer) {
            agreementsAssigner(paymentData);
            var isCustomer = customer.isLoggedIn();
            var quoteId = quote.getQuoteId();

            var url = urlFormatter.build('journey/quote/save');

            var deliveryDate = $('[name="delivery_date"]').val();

            var comments = $('[name="comments"]').val();

            var gender = $('[name="gender"]').val();

            if (deliveryDate) {

                var payload = {
                    'cartId': quoteId,
                    'delivery_date': deliveryDate,
                    'is_customer': isCustomer,
                    'comments':  comments,
                    'gender': gender
                };

                if (!payload.delivery_date) {
                    return true;
                }

                if (!payload.comments) {
                    return true;
                }

                if (!payload.gender) {
                    return true;
                }

                var result = true;

                $.ajax({
                    url: url,
                    data: payload,
                    dataType: 'text',
                    type: 'POST',
                }).done(
                    function (response) {
                        result = true;
                    }
                ).fail(
                    function (response) {
                        result = false;
                        errorProcessor.process(response);
                    }
                );
            }
            
            return originalAction(paymentData, messageContainer);
        });
    };
});
