$("#fButton").click(function(){
	var string = $("#fURL").val();
    $("#stuff").load(string);
	$.get(string, function(){
		$("#more").append("<tr><td>Tag</td><td>Count</td></tr>");
		$("#more").append("<tr><td>p</td><td>" + $("p").length + "</td></tr>");
		$("#more").append("<tr><td>a</td><td>" + $("a").length + "</td></tr>");
		$("#more").append("<tr><td>div</td><td>" + $("div").length + "</td></tr>");
	});
});


