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
        // Для каждого элемента сохраняем значение в personsIdsArray,
        // если значение есть.


        	// Создать пустой массив
        arr.push($(el).attr('value'));

    });

    var token = $("meta[name='csrf-token']").attr("content");
    var dropdown = $("#dropdown option:selected").attr("value");
    // console.log(dropdown);
    $.post("/invoice/delete", { 'ids': arr, 'dropdown': dropdown, 'delBtn': '1', '_csrf': token} );
}