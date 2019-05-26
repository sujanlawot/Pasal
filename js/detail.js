
//this shows the detail of separate brand detail
function detail(value,action)
	{
		var act=action;
		document.getElementById('referenceform').setAttribute('action',act);
		document.getElementById('value').value=value;
		document.getElementById('value').click();		
	}