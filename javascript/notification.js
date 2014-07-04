         var x=setInterval(function(){get_number_notification();},5000);
         function get_number_notification()
         {
         	$.ajax({
                       'url' : base_url + '/' + controller + '/get_number_notification',
                        'type' : 'POST', //the way you want to send data to your URL
                        'data' : {'type' : 0},
                        'success' : function(data_num){ //probably this request will return anything, it'll be put in var "data"
                            var container = $('#notification_number'); //jquery selector (get element by id)
                            if(data_not){
                                container.html(data_num);
                            }
                        }         
            });
         }
         function get_notification() {
               $.ajax({
                       'url' : base_url + '/' + controller + '/get_notification',
                        'type' : 'POST', //the way you want to send data to your URL
                        'data' : {'type' : 0},
                        'success' : function(data_not){ //probably this request will return anything, it'll be put in var "data"
                            var container = $('#notification'); //jquery selector (get element by id)
                           
                            if(data_not){
                                container.prepend(data_not);
                            }
                        }         
            });
           }
           