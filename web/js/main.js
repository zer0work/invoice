$('#checkall').change(function() {
    if ($(this).is(':checked')) {

        $("input:checkbox").attr("checked","checked");
    }
    else {
        $("input:checkbox").removeAttr("checked");
    }
});

function delInvoice() {

    var arr = [];
    $("input:checked").each(function (index, el){
        arr.push($(el).attr('value'));

    });

    var token = $("meta[name='csrf-token']").attr("content");
    var dropdown = $("#dropdown option:selected").attr("value");
    $.post("/invoice/delete", { 'ids': arr, 'dropdown': dropdown, 'delBtn': '1', '_csrf': token} );
    window.location.replace('/');
}