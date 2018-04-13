
$(document).ready(function(){
	var json = <?php echo $myJSON_full; ?>;
	buildD01(json,false);
	$("#fAvailable").click(function(){
		buildD01(json,true);
	});
	$('#all').click(function(){
		buildD01(json,false);
	});
	$('.requestBtn').click(function(){
		alert($(this).attr('owner'));
	});
});
function buildD01(json,foodFilter){
	document.getElementById("d01").innerHTML = "";
	var temp = '';
	for(a in json.testData){
		if(foodFilter){
			if(json.testData[a].foodAvailability.toUpperCase()=="YES")
				temp=render(temp,json.testData[a]);
		}
		else
			 temp=render(temp,json.testData[a]);
	}
	$("#d01").html(temp);
}
function render(temp,a){
		temp += '<div class="w3-third w3-container w3-margin-bottom "><img src="'+a.image+'" width="100%" height="250px">';
		temp += '<div class="w3-container w3-white"><p><b>'+a.location+'</b><br><b>'+a.address+'</b><br>';
		temp += '<b>Food Availability: '+a.foodAvailability+'<br><br>Details:- </b>';
		temp += '<br>Big Spacious fully furnished room. Attached Toilet and kitchen. Tv, Fridge, Ac already installed. The room is on the top most floor.</p>';
		temp += '<button class="btn btn-info center-block img-responsive requestBtn" owner="'+a.email+'"><span>Request Contact</span></button></div></div>';
		return temp;
}