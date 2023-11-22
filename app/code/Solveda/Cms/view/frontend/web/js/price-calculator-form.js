define([
    'ko',
    'jquery'
], function (ko, $) {
    'use strict';

    return function (config, element) {
        var viewModel = {
            quantity: ko.observable(0),
            unitPrice: ko.observable(0),
            total: ko.computed(function () {
                return viewModel.quantity() * viewModel.unitPrice();
            })
        };

        ko.applyBindings(viewModel, element);

        return viewModel;
    };
});
