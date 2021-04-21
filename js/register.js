$(document).ready(function(){
	$("#dealercompany").hide();
	$("#dealer").change(function(){
		if(this.checked)
		{
			$("#dealercompany").show();
		}
		else
		{
			$("#company").val(' ');
			$("#dealercompany").hide();
		}
	});
});