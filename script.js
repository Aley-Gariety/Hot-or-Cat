$(function(){

	$('.left-pic').attr('data-src',$('.left-pic').children('img').attr('src')).attr('data-winsloses',$('.left-pic').children('img').attr('data-winsloses'))
	$('.right-pic').attr('data-src',$('.right-pic').children('img').attr('src')).attr('data-winsloses',$('.right-pic').children('img').attr('data-winsloses'))

	var secret = ''

	if (localStorage.getItem($('.left-pic').children('img').attr('src')) == 'seen' || localStorage.getItem($('.right-pic').children('img').attr('src')) == 'seen') {
		location.reload()
	}

	if (localStorage.getItem('nsfw') == 'true') {
		$('.nsfw').show()
	}

	$(document).keydown(function(e){
		setTimeout(function(){
			secret = secret + String.fromCharCode(e.which).toLowerCase()
			if (secret.indexOf('datass') > -1) {
				if (localStorage.getItem('nsfw') == 'true') {
					localStorage.setItem('nsfw','false')
					window.location.href = "http://hotorcat.com/"
				} else {
					localStorage.setItem('nsfw','true')
					window.location.href = "http://hotorcat.com/?filter=nsfw"
				}

			}
		},0)
	});

	$('img').load(function(){
		if ($(this).width() > $(this).height()) {
			$(this).height('400').css({'left':'50%','margin-left':'-400px'});
		} else if ($(this).height() > $(this).width()) {
			$(this).width('400')
		} else if ($(this).height() == $(this).width()) {
			$(this).width('400').height('400')
		}
	});

	$('img').parent().attr('data-src',$(this).children('img').attr('src'))

	$('.left-pic,.right-pic').click(function(){
		if (localStorage.getItem('votecount')) {
			localStorage.setItem('votecount',parseFloat(localStorage.getItem('votecount'))+1)
		} else {
			localStorage.setItem('votecount',1)
		}
		var chosenURL = encodeURIComponent($(this).attr('data-src').replace('http://','')),
			losingURL = encodeURIComponent($(this).siblings('div').attr('data-src').replace('http://',''))
		$('.left-pic,.right-pic').off('click')
		if ($(this).hasClass('left-pic')) {
			$('.left-pic').attr('data-winsloses',parseFloat($('.left-pic').attr('data-winsloses'))+1)
			$('.left-pic').addClass('chosen').siblings().css('pointer-events','none')
			$('.left-pic').siblings('div').addClass('not-chosen')
		} else {
			$('.right-pic').attr('data-winsloses',parseFloat($('.right-pic').attr('data-winsloses'))+1)
			$('.right-pic').addClass('chosen').siblings().css('pointer-events','none')
			$('.right-pic').siblings('div').addClass('not-chosen')
		}

		$.ajax({
      	url: 'http://hotorcat.com/vote.php?win='+chosenURL+'&lose='+losingURL+'&winnerReddit='+$(this).attr('id')+'&losingReddit='+$(this).siblings('div').attr('id'),
      	method: 'POST',
        success: function(data) {
        	setTimeout(function(){
	        	location.reload()
        	},700)
        },
        error: function() {
            console.log('ERROR')
        }
        });
	})
})