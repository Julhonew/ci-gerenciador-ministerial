function previewImg(){
		var img = document.querySelector('input[name=img]').files[0];
		var preview = document.querySelector('img');

		var reader = new FileReader();

		reader.onloadend = function(){
			preview.src = reader. result;
		}

		if (img){
			reader.readAsDataURL(img);
		}else{
			preview.src = "" ;
		}
	}

