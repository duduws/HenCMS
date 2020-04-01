refresh = {
	player: function(){
		$.ajax({
			type: 'GET',
			url: '/hen/status.php?get=1&Wulles=Rainha',
			dataType: 'json',
			beforeSend: function(){
				effect.init();
    		},
			success:function(data){
				$('.locutorver').html(data['locutor']);
				$('.musicaver').html(data['musica']);
				$('.unicosver').html(data['ouvintes']);
				effect.finish();
			}
		});
		setTimeout(refresh.player, 15000);
	}
}
effect = {
	init: function(){
		$('.locutorver').animate({'opacity':'0.3'}, 500);
		$('.locutorver').animate({'opacity':'0.8'}, 500);
		$('.musicaver').animate({'opacity':'0.3'}, 500);
		$('.musicaver').animate({'opacity':'0.8'}, 500);
		$('.unicosver').animate({'opacity':'0.3'}, 500);
		$('.unicosver').animate({'opacity':'0.8'}, 500);
		$('.locutorver').animate({'opacity':'0.3'}, 500);
		$('.locutorver').animate({'opacity':'0.8'}, 500);
		$('.musicaver').animate({'opacity':'0.3'}, 500);
		$('.musicaver').animate({'opacity':'0.8'}, 500);
		$('.unicosver').animate({'opacity':'0.3'}, 500);
		$('.unicosver').animate({'opacity':'0.8'}, 500);
	},
	finish: function(){
		$('.locutorver').animate({'opacity':'1'}, 500);
		$('.musicaver').animate({'opacity':'1'}, 500);
		$('.unicosver').animate({'opacity':'1'}, 500);
	}
}
$(function(){
	refresh.player();
});