/**
 * link foto validate : https://www.itsolutionstuff.com/post/laravel-53-image-dimension-validation-rules-exampleexample.html
 * link 1: https://www.babastudio.com/blog/tutorial-form-validation-dengan-laravel
 * link 2 : https://jqueryvalidation.org/
 * link 3 : https://jqueryvalidation.org/documentation/
 */


$(document).ready(function(){

	// $("#identity_validate").keyup(function(){
	// 	var nama = $("#nama").val();
	// 	var username = $("#username").val();
	// 	var email = $("#email").val();
	// 	var password = $("#password").val();
	// 	var tanggallahir = $("#tanggallahir").val();
	// 	var alamat = $("#alamat").val();
	// 	var telephone = $("#telephone").val();
	// 	var  = $("#username").val();
	// })

	$("#nama").keyup(function(){
		var nama = $("#nama").val();
		$.ajax({
			success:function(resp){
				// alert(resp);
				if(resp=="false"){
					$("#chkNama").html("<font color='red'>Current Password is Incorrect</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});


	$("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'get',
			url: '/admin/check-pwd',
			data: {current_pwd:current_pwd},
			success:function(resp){
				// alert(resp);
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
				}else if(resp == "true"){
					$("#chkPwd").html("<font color = 'green'>Current Password is Correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:8,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:8,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:8,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
    });
    
    $("#identity_validate").validate({
		rules:{
			nama:{
				required: true,
                maxlength:20
			},
			username:{
                required: true,
                regex:/(^[A-Za-z0-9]+$)+/,
				maxlength:20
			},
			email:{
				required:true,
				maxlength:100,
				email:true
			},
			password:{
                required: true,
                regex:/(^[A-Za-z0-9@ ()%,:<>?!*&-]+$)+/,
				minlength:8,
				maxlength:30
			},
			tanggallahir:{
				required: true,
                date:true
			},
			alamat:{
				text:true
			},
			telephone:{
				required: true,
				maxlength:14,
				digits:true
				// regex:/(^[0-9]+$)+/
			},
			foto:{
				required:true,
				image:true,
				mimes:jpeg,jpg,
				max:2000000,
				dimensions:max_width=1920,max_height=720
			},
		},
		message :{
			// nama: {
			// 	required : "wajib diisi",
			// 	maxlength: "maksimal 20 karakter"
			// },
			// username :{
			// 	required: "wajib diisi",
			// 	regex : "kombinasi angka dan huruf",
			// 	maxlength : "maksimal 20 karakter"
			// },
			// email :{
			// 	required : "wajib diisi",
			// 	maxlength: "maksimal 100 karakter",
			// 	email : "harus format email"
			// },
			// password :{
			// 	required : "wajib diisi",
			// 	maxlength: "maksimal 30 karakter",
			// 	regex: "kombinasi angka, huruf dan symbol"
			// },
			// tanggallahir :{
			// 	required : "wajib diisi",
			// 	date : "harus format tanggal"
			// },
			// alamat : "tuliskan alamat Anda",
			// telephone : {
			// 	required : "wajib diisi",
			// 	maxlength: "maksimal 14 karakter",
			// 	digits : "hanya angka saja"
			// },
			foto :{
				required : "wajib diisi",
				max : "maksimal berukuran 2MB",
				dimensions : "maksimal resolusi 1920x720",
				mimes : "wajib berekstensi .jpg atau .jpeg"
			},
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
    });
});
