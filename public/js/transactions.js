var BwtTransaction = function()
{
    this.elts = {
        tableTransactions: $("#table_transactions")
    };

    this.endpoints = {

    };

};

var loadTransactions = function(table, userId) {
    table.dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/transactions/users/data?user_id=" + userId,
        "aoColumns": [
            {"sTitle": "Code", "data": "code"},
            {"sTitle": "Amount", "data": "amount"},
            {"sTitle": "Currency", "data": "currency"},
            {"sTitle": "Date", "data": "date"},
            {"sTitle": "Type", "data": "type"},
            {"sTitle": "Status", "data": "status"},
            {"sTitle": "Payment method", "data": "payment_method"}
        ]
    });
};

$(function(){
    var bwtt = new BwtTransaction();

    loadTransactions(bwtt.elts.tableTransactions, $('body').data('uid'));
});