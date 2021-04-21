$("body").css('visibility', 'hidden');
function loading()
{	
	setTimeout(function() { $(".loading").hide(); }, 0);
	setTimeout(function() { $("body").css('visibility', 'visible'); }, 0);
}