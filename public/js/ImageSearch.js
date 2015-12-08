$(document).ready(function() {
				var params = {};
		        params.q = $('#titleInput').val();
		        params.num = 10;
		        params.start = 1;
		        params.imgSize = "medium"; 
		        params.searchType = "image"; 
		        params.fileType = "jpg";
		        params.key = "AIzaSyDf_K6_akfp1-pZ5JOYJONWv08bRqNBImY"; 
		        params.cx = "002199004966681570173:9tgzas77axi";

			$('#imageSearch').on("click", function() {
					$('#result img').remove();
					
		    $.ajax({
		    	type: 'GET',
		    	url: 'https://www.googleapis.com/customsearch/v1',
		    	data: params,
		    	success: function(data) {

		    		console.log(data);
		    		var iarr = Math.round(Math.random() * (9 - 1) + 1);
		    		console.log(iarr);
		    		var linked = data.items[iarr].link;
		    		console.log(linked);
		    		var imageToInsert = '<img src="'+ linked + '" width="300" height="300">'
		    		$('#result').append(imageToInsert);
		    		console.log(imageToInsert)

		    		$('#imageInsert').on("click", function() {
			 					tinyMCE.activeEditor.execCommand("mceInsertContent", true, imageToInsert);
						});

		    	}, 
		    	error: function() {
		    	  alert('Daily query limir Exceeded');
		    		var imageToInsert = '<img src="http://static.ibnlive.in.com/ibnlive/pix/sitepix/10_2011/google-502-error-191011.jpg" width="300" height="300">'
		    		$('#result').append(imageToInsert);
		    		console.log(imageToInsert)
		    		$('#imageInsert').on("click", function() {
							tinyMCE.activeEditor.execCommand("mceInsertContent", true, imageToInsert);
						});
		    	}
		    })
			});
    }); 