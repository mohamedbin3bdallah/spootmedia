function picwish()
{
	$(".wishgifcounter").hide();
	/*$(".wishword").hide();*/
	$(".yourwish").hide();
	setTimeout(function() { $(".wishgifcounter").show(); }, 2000);
	
	setTimeout(function() { $(".waitwish").hide(); }, 7000);
	setTimeout(function() { $(".wishgifcounter").hide(); }, 7000);
	/*setTimeout(function() { $(".wishgif").show(); }, 7000);*/
	setTimeout(function() { $("#wish").css("background", "url(uploads/wish.gif)"); }, 7000);
	/*setTimeout(function() { $("#wish").css("background-attachment", "fixed"); }, 7000);*/
	setTimeout(function() { $("#wish").css("background-size", "100% 100%"); }, 7000);
	/*setTimeout(function() { $(".wishword").show(); }, 7000);*/
	setTimeout(function() { $(".yourwish").show(); }, 7000);
	$("#wish").modal('show');
	var audio = $('#wishSoundClip')[0];
	audio.play();
}