//ajax gio hang 
$('#checkout').click(function(){
    let name = $('#name').val();
    let email = $('#email').val();
    let phone = $('#phone').val();
    let address = $('#address').val();

    axios({
		method: 'post',
	  	url: '/cart/checkout',
	  	data: {
	    	name: name,
	    	email: email,
	    	phone: phone,
	    	address: address,
	  	}
	}).then(function (response) {
		if(response.data.status == true){
			console.log(response.data);
			alert('Successful');
			window.location.reload();
		}
	}) 
	.catch(function (error) {
		console.log(error);
	});
})

//ajax detail product
$('.product-modal-detail').click(function(){
	let productId = $(this).data('id');

	axios({
		method: 'get',
	  	url: `/product/show/${productId}`,
	}).then(function (response) {
		$('.modal').html(response.data);
	}) 
	.catch(function (error) {
		console.log(error);
	});
})