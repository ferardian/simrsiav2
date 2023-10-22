// render order list data table
// default render page
jQuery(document).ready(function() {
    var data = {id:"", kd_acc1:"", tanggal: ""};
    generateOrderTable(data);
});

// render date datewise
jQuery(document).on('click','#filter-order-filter', function(){
    var id = jQuery('input#filter-order-no').val();
    var kd_acc1 = jQuery('input#filter-name').val();
    var tanggal = jQuery('input#order-start-date').val();

    var data = {id:id, kd_acc1:kd_acc1, tanggal:tanggal};
    generateOrderTable(data);
});
// generate Order Table
function generateOrderTable(element){
    jQuery.ajax({
        url: baseurl + 'order/getOrderList',
        data: {'id' : element.id , 'kd_acc1' : element.kd_acc1, 'tanggal' : element.tanggal },
        type: 'post',
        dataType: 'json',
        beforeSend: function () {
            jQuery('#render-list-of-order').html('<div class="text-center mrgA padA"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i></div>');
        },
        success: function (html) {
            var dataTable='<table id="order-datatable" class="table table-striped" cellspacing="0" width="100%"></table>';
            jQuery('#render-list-of-order').html(dataTable);
            var table = $('#order-datatable').DataTable({
                data: html.data,
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": false,
                "bInfo": true,
                "bAutoWidth": true,
                columns: [
                    { title: "Order No", "width": "12%"},
                    { title: "Date.", "width": "16%"},
                    { title: "Name", "width": "17%"},
                    { title: "City", "width": "17%"},
                    { title: "Amount", "width": "15%"},
                    { title: "Debet", "width": "15%"},
                    { title: "Saldo", "width": "15%"},
                    { title: "Saldo", "width": "15%"},
                    { title: "Status", "width": "15%"}
                ],
            });
        }
    });
}

// get DatePicker
jQuery(document).on('focus', '.getDatePicker', function () {
    jQuery(this).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        yearRange: "1940:2050"
    });
});
