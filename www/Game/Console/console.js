//xlxi be like
//BRRRRR
//(c) xlxi 2020

var finished = false;

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + '=';
    var begin = dc.indexOf('; ' + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(';', begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
} 

function invalidate(Text) {
	if($('#siteLockFormGroupInvalid').length == 0){
		$('#siteLockFormGroup').addClass('has-danger');
		$('#siteLockPassword').addClass('is-invalid');
		$('#siteLockFormGroup').append('<div id="siteLockFormGroupInvalid" class="invalid-feedback">' + Text + '</div>');
	}
}

function success(Text) {
	if($('#siteLockFormGroupInvalid').length == 0){
		$('#siteLockFormGroup').addClass('has-success');
		$('#siteLockPassword').addClass('is-valid');
		$('#siteLockFormGroup').append('<div id="siteLockFormGroupInvalid" class="valid-feedback">' + Text + '</div>');
	}
}

function checkIfValid() {
	if(!finished){
		$.post('auth.php', { 'submit':'submit', sitePassword:$('#siteLockPassword').val()}).done(function(data) {
			if(data.success==false){
				invalidate(data.message);
			}else{
				finished=true;
				$('#siteLockSubmit').prop('disabled', true);
				success(data.message);
				setTimeout(function(){
					location.reload();
				}, 2000);
			}
		});
	}
}

$(document).ready(function (){
	var cookie = getCookie('.RCCSecurityToken');

	$('#content').fadeIn("fast");

    if (cookie == null) {
        $('#lockedModal').modal({backdrop:'static', keyboard:false});
		$('#siteLockPassword').keypress(function(event) {
			if(!finished){
				var keycode = (event.keyCode ? event.keyCode : event.which);
				if($('#siteLockFormGroupInvalid').length != 0){
					$('#siteLockFormGroup').removeClass('has-danger');
					$('#siteLockPassword').removeClass('is-invalid');
					$('#siteLockFormGroupInvalid').remove();
				}
				if(keycode == '13'){
					checkIfValid();
				}
			}
		});
		$('#siteLockSubmit').click(function() {
			if($('#siteLockPassword').val().length == 0){
				invalidate('Please enter a password.');
			}else{
				checkIfValid();
			};
		});
    }
    else {
        $('#content').load("content.php?pw=" + cookie, function( response, status, xhr ) {
			if ( status == "error" ) {
				document.cookie = ".RCCSecurityToken=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
				location.reload();
			}
		});
    }
});