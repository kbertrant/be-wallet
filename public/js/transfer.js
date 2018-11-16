var BwtTransfer = function()
{
    this.elts = {
        divReceiverName: $("#receiver-name"),
        spanReceiver: $("#receiver"),
        divReceiverUnknown: $("#receiver-unknown"),
        form:{
            id: $("#form"),
            receiverId: $('#receiver-id'),
            receiverEmail: $('#receiver-email'),
            btnCheckReceiver: $('#btn-check-receiver'),
            iptAmount: $('#amount'),
            btnTransfer: $('#btn-transfer')
        }
    };

    this.endpoints = {
        searchUsers: "/transfers/search-users",
        register: "agencies/register"
    };

    this.canTransfer = false;
};

var loadTransfers = function(userId) {
    $("#table_transfer").dataTable({
        "aaSorting": [[0, "asc"]],
        "sPaginationType": "full_numbers",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/transfers/users/data?user_id=" + userId,
        "aoColumns": [
            {"sTitle": "Code", "data": "code"},
            {"sTitle": "Amount", "data": "amount"},
            {"sTitle": "Currency", "data": "currency"},
            {"sTitle": "Date", "data": "date"},
            {"sTitle": "Type", "data": "type"},
            {"sTitle": "Sender", "data": "sender"},
            {"sTitle": "Receiver", "data": "receiver"}
        ]
    });

    $.ajax({
        url: '/transfers/users/data?user_id=' + userId,
        type: 'get',
        dataType: 'json',
        success: function (response) {

          $('#total').text(response.total);
          $('#sent').text(response.sent);
          $('#received').text(response.received);

          //console.log(response);
        },
        error: function (a, b, c) {
            alert("Error");
            console.log(a, b, c);
        }
    });
};

$(function(){
    var bwtt = new BwtTransfer();

    loadTransfers($('body').data('uid'));

    bwtt.elts.form.btnCheckReceiver.click(function(e) {
       e.preventDefault();
       var receiverEmail = bwtt.elts.form.receiverEmail.val(),
           receiverId = bwtt.elts.form.receiverId.val();

       if(receiverEmail.length === 0 || receiverId.length === 0) {
           alert('Fill the receiver id and receiver email !');
           return;
       }

        bwtt.elts.divReceiverUnknown.addClass('hide');
        bwtt.elts.divReceiverName.addClass('hide');
        bwtt.elts.form.btnTransfer.attr('disabled', true);
        bwtt.canTransfer = false;

        $.ajax({
            url: '/transfers/search-users?id='+receiverId+'&email='+receiverEmail,
            type: 'get',
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                if(response.code === 200) {
                    bwtt.elts.spanReceiver.text(response.message);
                    bwtt.elts.divReceiverName.removeClass('hide');
                    bwtt.canTransfer = true;
                    bwtt.elts.form.btnTransfer.removeAttr('disabled');
                } else {
                    bwtt.elts.divReceiverUnknown.text(response.message).removeClass('hide');
                }
            },
            error: function (a, b, c) {
                alert("Error");
                console.log(a, b, c);
            }
        });
    });

    bwtt.elts.form.btnTransfer.click(function(e){
       e.preventDefault();

       if(!bwtt.canTransfer) {
           return;
       }

       var receiverEmail = bwtt.elts.form.receiverEmail.val(),
            receiverId = bwtt.elts.form.receiverId.val(),
            userAmount = parseInt($(this).data('amount')),
            amount = parseInt(bwtt.elts.form.iptAmount.val());

       if(amount <= 0) {
           alert('Can\'t proceed your operation !');
       } else if (amount > userAmount){
           alert('The max amount you can transfer is : ' + userAmount);
       } else {
           bwtt.elts.divReceiverUnknown.addClass('hide');
           bwtt.elts.divReceiverName.addClass('hide');
           bwtt.elts.form.btnTransfer.attr('disabled', true);

           $.ajax({
               url: '/transfers',
               type: 'post',
               data: {id: receiverId, email: receiverEmail, amount: amount},
               dataType: 'json',
               success: function (response) {
                   // console.log(response);
                   if(response.code === 200) {
                       bwtt.elts.spanReceiver.text(response.message);
                       bwtt.elts.divReceiverName.removeClass('hide');

                       bwtt.elts.form.receiverId.val('');
                       bwtt.elts.form.receiverEmail.val('');
                       bwtt.elts.form.iptAmount.val(bwtt.elts.form.iptAmount.attr('min'));

                       bwtt.canTransfer = false;
                       setTimeout(function () {
                           document.location.reload();
                       }, 5000);
                   } else {
                       bwtt.elts.form.btnTransfer.removeAttr('disabled');
                       bwtt.elts.divReceiverUnknown.text(response.message).removeClass('hide');
                   }
               },
               error: function (a, b, c) {
                   alert("Error");
                   console.log(a, b, c);
               }
           });
       }
    });
});
