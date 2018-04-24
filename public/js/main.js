var getUrl = window.location
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/"
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.add').on('click', function()
{

	$.post(baseUrl + 'shop/add', { id:$(this).attr('id')})
})
$('.delete').on('click', function()
{
	$.post(baseUrl + 'shop/delete', { id:$(this).attr('id')})
	console.log($("#shoppingcart li").length)
	if($("#shoppingcart li").length == 1)
	{

		$('#sub').remove();
	}

	$(this).parent().remove()
	c()
})
$('.quantitychange').on('change', function()
{
	c()

})
function c()
{
		let tot = 0;
	$('.quantitychange').each(function(){
		let quantity =  $(this).val()
		let price = $(this).prev().attr('value')
		let all = quantity * price
		tot = tot + all

	})
	$('#totprice').html(tot + ",00")
}