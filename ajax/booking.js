var booking_events = {
    init : function(){
        $('#booking_edit').on('submit', function(e){
            e.preventDefault();
            var fd = new FormData(this);
            booking.booking_edit(fd);
        });
        $('#booking_add').on('submit', function(e){
            e.preventDefault();
            var fd = new FormData(this);
            booking.booking_add(fd);
        });
    }
};

var booking = {
    booking_edit : function(fd){
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'post_url/bookingEdit', true);
        var order_no =  $('[name="order_no"]').val();
        //alert(order_no);
        //return false;
        xhr.onload = function() {
            if (this.status == 200) {
                
                if(this.response=='Order Updated Successfully')
                {
                    var link = 'invoice_print/invoice/'+order_no;
                    var mywindow = window.open(link);

                    setTimeout(function(){
                     var baseUrl = document.location.origin;
                      
                        mywindow.print();
                        window.location = 'orderManage';
                        mywindow.close();
                    }, 1000);
                }
            };
        };
        xhr.send(fd);
    },

    booking_add : function(fd){
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'post_url/bookingAdd', true);
        var order_no =  $('[name="order_no"]').val();
        //alert(order_no);
        //return false;
        xhr.onload = function() {
            if (this.status == 200) {
                console.log(this.response);
                if(this.response=='Order Received Successfully')
                {
                    var link = 'invoice_print/invoice/'+order_no;
                    var mywindow = window.open(link);
                    setTimeout(function(){
                        mywindow.print();
                        window.location = 'booking';
                        mywindow.close();
                    }, 1000);
                }

            };
        };
        xhr.send(fd);
    }
};
$(function(){
    booking_events.init();
});


