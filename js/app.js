var countries = [];

$(document).ready(function () {
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
	});

	$("#saveButton").addClass('disabled');

	$.getJSON("./js/countries.json", function(data){
		$.each(data, function(i, v){
			countries.push(v);
			$("#nationality").append('<option  name="nationality" value="'+ v.name + '">' + v.country + '</option>');
		})
	});

	$('#sidebarCollapse_1').on('click', function () {
		$('#sidebar').toggleClass('active');
		
		var active = $('#sidebar').hasClass('active'); 
		if(active){
			$('#collapse-icon').removeClass('fas fa-angle-double-left');
			$('#collapse-icon').addClass('fas fa-angle-double-right');
			$("#collapse-icon").css("color", "white");

		}
		else{
			$('#collapse-icon').removeClass('fas fa-angle-double-right');
			$('#collapse-icon').addClass('fas fa-angle-double-left');
			$("#collapse-icon").css("color", "white");
		}

	});
});

function parseParams(name, forename, nationality, ageMin, ageMax, sexId, variation){
	
	const params = {};

	if(typeof(name) !== "undefined" && name !== ""){
		params.name = name;
	}
	if(typeof(forename) !== "undefined" && forename !== ""){
		params.forename = forename;
	}
	if(typeof(nationality) !== "undefined" && nationality !== ""){
		params.nationality = nationality;
	}
	if(typeof(ageMin) !== "undefined" && ageMin !== ""){
		params.ageMin = ageMin;
	}
	if(typeof(ageMax) !== "undefined" && ageMax !== ""){
		params.ageMax = ageMax;
	}
	if(typeof(sexId) !== "undefined" && sexId !== ""){
		params.sexId = sexId;
	}

	if(variation){
		if(typeof($("#hidden_username").val()) !== "undefined" && $("#hidden_username").val() !== ""){
			params.username = $("#hidden_username").val();
		}
		if(typeof($("#hidden_total").val()) !== "undefined" && $("#hidden_total").val() !== ""){
			params.total = $("#hidden_total").val();
		}
	}
	
	return params;
}

function showResults(total){
	//Shows an alert informating the results of the query
	$("#query_info").append(
		'<div class="col-lg-12 col-md-12 col-xs-12">'+
			'<div class="alert alert-info alert-dismissible fade show" role="alert">'+
				'Se encontraron <strong>' + total + '</strong> resultados' + 
				'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
					'<span aria-hidden="true">&times;</span>'+
				'</button>'+
			'</div>'+
		'</div>'
	);

	$("#saveButton").removeClass('disabled');
}

function calculate_age(dob) { 
    var diff_ms = Date.now() - dob.getTime();
    var age_dt = new Date(diff_ms); 
  
    return Math.abs(age_dt.getUTCFullYear() - 1970);
}

function setDeletionId(id){
	
	$("#delete_consult").html('');
	$("#delete_consult").append(id);
	
}

function executeDeletion(){
	var _id = $("#delete_consult").text();
	$.post('./deleteConsult.php', { "id": _id })
	.done(function(response){
		console.log(response);
		$("#deletion_info").append(
			'<div class="col-lg-12 col-md-12 col-xs-12">'+
				'<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
					'<strong><i class="fas fa-thumbs-up"></i>&nbsp;&nbsp;Se borró existosamente su búsqueda de la base de datos</strong>' + 
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
						'<span aria-hidden="true">&times;</span>'+
					'</button>'+
				'</div>'+
			'</div>'
		);


	}).fail(function(jqXHR, textStatus, errorThrown ){
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
	});
}

function printCountries(nationalities){
	answ = "Desconocida";

	if(nationalities !== null){
		for(ctrs of countries){
			for(var i = 0; i < nationalities.length; i++){
				if(nationalities[i] === ctrs.name){
					answ = "";
					answ += (ctrs.country + " ");
				}
			}
		}
	}

	return answ;
}


function searchRedSheets(){
	
	//0. Clear results:
	$("#query_results").html('');

	//1. Take all the params:
	var name = $("#name").val();
	var forename = $("#forename").val();
	var nationality = $("#nationality").val();
	var ageMin = $("#ageMin").val();
	var ageMax = $("#ageMax").val();
	var sexId = $("#sex").val();


	params = parseParams(name, forename, nationality, ageMin, ageMax, sexId, false);

	//2. Print the cards of the results
	$.getJSON("https://ws-public.interpol.int/notices/v1/red/", params,
	function(data){
		showResults(data.total);

		$("#hidden_total").val(data.total);

		let sheets = data._embedded.notices;
		$.each(sheets, function(i, v){

			var img_src = './img/default.png';

			if(typeof(v._links.thumbnail) !== "undefined"){
				img_src = v._links.thumbnail.href;
			}
			
			$("#query_results").append(
				'<div class="col-lg-4 col-md-4 col-xs-12">'+
					'<div class="card card-beautify">' +
						'<img src="'+ img_src +'" class="card-img-top" alt="bad guy thumbnail">'+
						'<div class="card-body">'+
							'<h5 class="card-title">'+ v.forename+'</h5>'+
							'<p class="card-text">Edad: '+ calculate_age(new Date(v.date_of_birth)) + '<br/> Nacionalidad: '+ printCountries(v.nationalities)+ '</p>'+
						'</div>'+
					'</div>'+
				'</div>'
			);
		})
	})
}

function saveSearch(){
	//1. Take all the params:
	var forename = $("#name").val();
	var name = $("#forename").val();
	var nationality = $("#nationality").val();
	var ageMin = $("#ageMin").val();
	var ageMax = $("#ageMax").val();
	var sexId = $("#sex").val();

	params = parseParams(name, forename, nationality, ageMin, ageMax, sexId, true);

	//2. Guardar la busqueda y mostrar informacion
	$.post("./saveSearch.php", params)
	.done(function(response){
		console.log(response);
		$("#query_info").append(
			'<div class="col-lg-12 col-md-12 col-xs-12">'+
				'<div class="alert alert-success alert-dismissible fade show" role="alert">'+
					'<strong><i class="fas fa-thumbs-up"></i>&nbsp;&nbsp;Se agregó existosamente su búsqueda a la base de datos</strong>' + 
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
						'<span aria-hidden="true">&times;</span>'+
					'</button>'+
				'</div>'+
			'</div>'
		);


	}).fail(function(jqXHR, textStatus, errorThrown ){
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
	});
}

function enableInput(inputId){
	$(inputId).removeAttr("readonly");
	$("#update-data").removeAttr("disabled");
}

