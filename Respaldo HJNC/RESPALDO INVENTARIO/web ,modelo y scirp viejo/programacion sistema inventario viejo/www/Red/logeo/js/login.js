/******************************
**	PHP Login Ajax JQuery
**	programmer@chazzuka.com
**	http://www.chazzuka.com/
*******************************/
// GLOBAL PARAMS
var file			=	'login.submit.php';
var placeholder		=	'#wrapper';
var waitholder		=	'#err';
var waitnote		=	'<img src="../../imagenes/loading.gif" /><br />Por favor un momento ...';
			
// DOM READY
$(document).ready(function()
{ 
	// FIRST LOAD FORM
	$(waitholder).html(waitnote);
	$(placeholder).fadeOut('fast').html($.ajax({url: file,async: false}).responseText).slideDown('slow');
	$(waitholder).fadeOut('slow').hide();
		
	// AJAX SUBMIT OPTIONS /
	var options = { 
		beforeSubmit:	FilterForm,
		success:		ShowResult,
		//target:		target,
		url:			file,
		type:      		'post',
		dataType:  		'json',
		clearForm: 		false,
		resetForm: 		false,
		timeout:   		3000 
	}; 
	// ON SUBMIT FORM
	$('#ajaxform').submit(function(){$(this).ajaxSubmit(options);return false;}); 
	//*/
});
			
// SHOW RESULT
function ShowResult(data)
{
	$(waitholder).html(data.title).slideDown('slow');
	if(data.succes){$(placeholder).html(data.content).slideDown('slow');}
}			
			
// WAIT MESSAGE
function wait()
{
	$(waitholder).html(waitnote).fadeIn('fast');
}
			
// CLEAR WAIT MESSAGE
function wipe()
{
	$(waitholder).fadeOut('fast').html('');
}
			
// VALIDATION
function FilterForm(formData, jqForm, options)
{ 
	$(waitholder).html(waitnote).fadeIn('fast');
	for (var i=0; i < formData.length; i++)
	{ 
		wait();
		switch(formData[i].name)
		{
			case 'nameuser':
				if(!formData[i].value.length)
				{
					$(waitholder).html('Requiere de un Usuario').slideDown('slow');
					return false;
				}
				break;
			case 'passuser':
				var len = formData[i].value.length;
				if(len<5||len>50)
				{
					$(waitholder).html('Requiere de un Password').slideDown('slow');
					return false;
				}
				break;															
		}
	}
}