var getUrl = window.location
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/"
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#add').on('click', function(){

	$.post(baseUrl + 'shop/add', { id:$(this).attr('value')})
})
$('.delete').on('click', function(){

	$.post(baseUrl + 'shop/delete', { id:$(this).attr('id')})
})