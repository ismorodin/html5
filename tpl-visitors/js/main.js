$(document).ready(function () {
	var root = $('#sortablemain');
	$('> *', root).each(function (index) {
		this.id = 'item-' + index;
	});

	root.sortable({
		'update': function (event, ui) {
			var order = $(this).sortable('serialize');
			$.cookie('sortable', order);
		}
	});
	var c = $.cookie('sortable');
	if (c) {
		$.each(c.split('&'), function () {
			var id = this.replace('[]=', '-');
			$('#' + id).appendTo(root);
		});
	}
	root.sortable({
		'update': function (event, ui) {
			var order = $(this).sortable('serialize');
			$.ajax({
				url: '/sortable/save',
				data: {'sortable': order, timestamp: $.now()},
				type: 'post'
			});
		}});
});
