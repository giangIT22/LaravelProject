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
			alert('Successful');
			window.location.reload();
		}
	}) 
	.catch(function (error) {
		console.log(error);
	});
})