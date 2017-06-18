$(document).ready(function(){
	sizeIt();
});
$( window ).resize(function(){
	sizeIt();
});

function sizeIt(){
$( "#nameLogo" ).css("width", $("#myName").width());
	$( "body").css("padding-top", $("header").height());
	$('#sideBar').width($('#outBar').innerWidth() - 15);
}

;(function() {
	if(navigator.appVersion.indexOf("MSIE") !== -1){  // anti pattern
		// fix spans
		$('.row div[class^="span"]:first-child').not('[class*="offset"]').addClass('first-child');
 
		// fix offsets
		$('.row div[class*="offset"]:first-child').each(function () {
			var margin_left = parseInt($(this).css('margin-left'), 10) - 20;
			$(this).css('margin-left', margin_left);
		});
	}
})();