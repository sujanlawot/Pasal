$(function(){
				var countItem=$(".slider .item").length;
				var items=$(".slider .item");
				var currentItem=0;

				
				$(items).eq(currentItem).fadeIn(1000);
				function cycleItem(){
	
					$(items).fadeOut(1000);
					$(items).eq(currentItem).fadeIn(1000);

				}

				var autoplay=setInterval(function(){
						currentItem++;	
						if(currentItem > countItem - 1){
							currentItem = 0;
						}
						cycleItem();

				},3000);
				



				$("a.next").click(function(){
					clearInterval(autoplay);
					currentItem++;

					if(currentItem > countItem - 1){
						currentItem = 0;
					}

					cycleItem();
				});
				$("a.prev").click(function(){
					clearInterval(autoplay);
					currentItem--;
					if(currentItem < 0){
						currentItem= countItem - 1;
					}
					cycleItem();
				})
			});

