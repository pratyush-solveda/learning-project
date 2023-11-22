define([
	'uiComponent'
	],function(Component){

	"use strict";

	return Component.extend({
		// initialize: function() {
		// this._super();
		// alert("Component initialized");
		// }

		heading: "Knockout Binding",
		content: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt quisquam perferendis accusantium ipsa quod molestias sint sequi ea distinctio quia quis esse temporibus, eaque nemo debitis aut harum, doloribus, veritatis ipsam dolore ducimus fuga saepe! Voluptatum deleniti ab blanditiis aperiam.',

		getPrice: function(){
			return 150;
		}
	});
});