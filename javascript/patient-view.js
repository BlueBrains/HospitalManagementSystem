$(document).ready(function(){
	$('table').delegate('.delete','click',function(){
		var id = $(this).attr('id');
		$.ajax({
			url:'/project-1/patient/'+$(this).attr('type'),
			type:'DELETE',
			data:{'id':$(this).attr('id')},
			success:function(result){
				$('#'+id).parent().parent().remove();
			}
		});
	});

	$('.add').on('submit',function(e){
		e.preventDefault();
		var self = $(this),
		   url = self.attr('action'),
		   method = self.attr('method'),
		   data = {};

		self.find('[name]').each(function(index, value) {
		    var self = $(this),
		    
		    name = self.attr('name'),
		    value = self.val();

		    data[name] = value;
		});
		$.ajax({
			url: url,
			type: method,
			data: data,
			success:function(result){
				console.log(result);
			}
		});
	});

	var pusher = new Pusher('d26bc1412f47bb53c081');
    var channel = pusher.subscribe('patient');
    channel.bind('fm_add', function(data) {
    	$('#fm_table').append("<tr>\
    						  <td><a href='"+data.sid+"'>"+data.name+"<a></td>\
                        <td>"+data.relationship+"</td>\
                        <td>\
                            <button type='fm' id='"+data.id+"' class='btn delete'>\
                                <span class=' glyphicon glyphicon-remove-sign'></span>\
                            </button>\
    						 </tr>");
    });
    channel.bind('hl_add', function(data){
    	$('#hl_table').append("<tr>\
    						   <td>"+data.recored_name+"</td>\
                      		   <td>"+data.status+"</td>\
                      		   <td>"+data.category+"</td>\
                      		   <td>\
                            	<button type='hl' id='"+data.id+"' class='btn delete'>\
                                	<span class=' glyphicon glyphicon-remove-sign'></span>\
                           	 	</button>\
                        	   </td></tr>");
    });

    channel.bind('pr_edit',function(data){
    	$('#'+data.field).text(data.value);
    });

    channel.bind('p_edit',function(data){
    	$('#'+data.field).text(data.value);
    });
});
