/*
Name: 			Tables / Ajax - Examples
Written by: 	GDM (http://wwww.gdm.cl)
Theme Version: 	1.5.2
*/

(function($) {

	'use strict';

	var datatableInit = function() {

		var $table = $('#datatable-ajax');
		$table.dataTable({
			bProcessing: true,
			sAjaxSource: $table.data('url')
		});

	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);