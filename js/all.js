function navigationClick1()
{
	document.getElementsByClassName('hide')[0].setAttribute('onclick','hidenavigation()');
	document.getElementById('accessories').style.background="white";
	document.getElementById('laptop').style.background="white";
	document.getElementById('mobile').style.background="green";
	document.getElementsByClassName('dropdown')[0].style.display="block";
	document.getElementsByClassName('dropdown')[1].style.display="none";
	document.getElementsByClassName('dropdown')[2].style.display="none";
}	
function navigationClick2()
{
	document.getElementsByClassName('hide')[1].setAttribute('onclick','hidenavigation()');
	document.getElementById('accessories').style.background="white";
	document.getElementById('mobile').style.background="white";
	document.getElementById('laptop').style.background="green";

	document.getElementsByClassName('dropdown')[1].style.display="block";

	document.getElementsByClassName('dropdown')[0].style.display="none";
	document.getElementsByClassName('dropdown')[2].style.display="none";
}	
function navigationClick3()
{
	document.getElementsByClassName('hide')[2].setAttribute('onclick','hidenavigation()');
	document.getElementById('laptop').style.background="white";
	document.getElementById('mobile').style.background="white";
	document.getElementById('accessories').style.background="green";
	document.getElementsByClassName('dropdown')[2].style.display="block";
	document.getElementsByClassName('dropdown')[0].style.display="none";
	document.getElementsByClassName('dropdown')[1].style.display="none";
	
}	
function hidenavigation()
{
	document.getElementsByClassName('hide')[1].setAttribute('onclick','navigationClick2()');
	document.getElementsByClassName('hide')[0].setAttribute('onclick','navigationClick1()');
	document.getElementsByClassName('hide')[2].setAttribute('onclick','navigationClick3()');
	document.getElementById('laptop').style.background="white";
	document.getElementById('mobile').style.background="white";
	document.getElementById('accessories').style.background="white";
	document.getElementsByClassName('dropdown')[1].style.display="none";
	document.getElementsByClassName('dropdown')[0].style.display="none";
	document.getElementsByClassName('dropdown')[2].style.display="none";
}


function opensearch()
{
	var searchform=document.getElementById('searchform');
	searchform.setAttribute('onclick','closesearch()');
	document.getElementById('search').style.display="block";
	document.getElementById('focus').focus();
}
function closesearch()
{
	var searchform=document.getElementById('searchform');
	searchform.setAttribute('onclick','opensearch()');
	document.getElementById('search').style.display="none";	

}
function user_option()
{
	document.getElementById('user').style.display='block';
	document.getElementById('user_option').setAttribute('onclick','hide_user_option()');
}
function hide_user_option()
{
	document.getElementById('user').style.display='none';
	document.getElementById('user_option').setAttribute('onclick','user_option()');	
}