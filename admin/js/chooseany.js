// function add_product()
// {
// 	var add_product=document.getElementById('add_product');	
// 	add_product.setAttribute('onclick',"remove_product()");	
// 	add_product.setAttribute('id',"remove_product");	
// 	add_product.innerHTML="Cancel product";
// 	add_product.style.width='200px';	
// 	var product_category=document.getElementsByClassName('product_category')[0];
// 	product_category.style.display='block';
// }

// function remove_product()
// {
// 	var remove_product=document.getElementById('remove_product');
// 	remove_product.setAttribute('onclick',"add_product()");	
// 	remove_product.setAttribute('id',"add_product");	
// 	remove_product.innerHTML="Add product";
// 	remove_product.style.width='150px';

// 	var product_detail0=document.getElementsByClassName('product_detail')[0];
// 	product_detail0.style.display='none';
// 	var product_detail1=document.getElementsByClassName('product_detail')[1];
// 	product_detail1.style.display='none';
// 	var product_category=document.getElementsByClassName('product_category')[0];
// 	product_category.style.display='none';
	

// }

function choose_category()
	{
	var category=document.getElementById('choose').value;
	if(category=="mobile_detail")
	{
	
		var product_detail0=document.getElementsByClassName('product_detail')[0];
		product_detail0.style.display='block';
		

		var product_detail1=document.getElementsByClassName('product_detail')[1];
		product_detail1.style.display='none';
		var product_detail2=document.getElementsByClassName('product_detail')[2];
		product_detail2.style.display='none';		
	
	}
	if(category=="laptop_detail")
	{
		var product_detail1=document.getElementsByClassName('product_detail')[1];
		product_detail1.style.display='block';	

		var product_detail0=document.getElementsByClassName('product_detail')[0];
		product_detail0.style.display='none';	
		var product_detail2=document.getElementsByClassName('product_detail')[2];
		product_detail2.style.display='none';			

	}
	if(category=="accessories")
	{
		var product_detail2=document.getElementsByClassName('product_detail')[2];
		product_detail2.style.display='block';		
		var product_detail0=document.getElementsByClassName('product_detail')[0];
		product_detail0.style.display='none';
		var product_detail1=document.getElementsByClassName('product_detail')[1];
		product_detail1.style.display='none';
	}
	

}
