jQuery(function($){
	$('#filter').submit(function(event){
		event.preventDefault()
		var filter = $('#filter')
		$.ajax({
			url: ajax_object.ajax_url,
			data:{
				data: filter.serialize(),
				action: "vitrines_filter_function"
			}, // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Processing...') // changing the button label
			},
			success:function(data){
				filter.find('button').text('Apply filter') // changing the button label back
				$('#response').html(data) // insert data
			}
		})
		return false
	})
})