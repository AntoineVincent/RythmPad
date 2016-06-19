$(document).ready(function() 
{
	var bouton;

	$('.ong').click(function(){
		if ($(this).hasClass("ong1")) 
		{
			bouton = 1;
		}
		else if ($(this).hasClass("ong2")) 
		{
			bouton = 2;
		}
		else 
		{
			bouton = 3;
		}

		if ($('.corps'+bouton).hasClass("open"))
		{
			$('.corpsother').css("display","none");
			$('.corps'+bouton).removeClass("open");
		}
		else
		{
			$('.corpsother').css("display","none");
			$('.corpsother').removeClass("open");
			$('.corps'+bouton).css("display","block");
			$('.corps'+bouton).addClass("open");
		}
	});
});
