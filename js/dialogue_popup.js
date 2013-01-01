// JavaScript Document
$(document).ready(function() {
	var $dialog = $('<div></div>')
		.html('Are you sure you want to do this!')
		.dialog({
			autoOpen: false,
			//title: 'Basic Dialog',
			buttons: { "Ok": function() { $(this).dialog("close"); return true; }, "Cancel": function() { $(this).dialog("close"); return false;} }
			
		});

	$('#opener').click(function() {
		$dialog.dialog('open');
		// prevent the default action, e.g., following a link
		return false;
	});
});