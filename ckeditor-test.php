<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex, nofollow">
	<title>Setting editor UI language</title>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
	var arrLang = {
		'en' : {
			'home' : 'Home',
			'about' : 'About Us',
			'contact' : 'Contact Us'
		},
		'fr' : {
			'home' : 'Huis',
			'about' : 'Over ons',
			'contact' : 'Neem contact met ons op'
		}
	};

	$(function(){
		$('.translate').click(function(){

			var lang = $(this).attr('id');			

			$('.lang').each(function(index, element){
				$(this).text(arrLang[lang][$(this).attr('key')]);
			});
		});
	});	
	</script>
</head>
<body>
	<button class="translate" id="en">English</button>
	<button class="translate" id="fr">French</button>

	<ul>
		<li class="lang" key="home">Home</li>
		<li class="lang" key="about">About Us</li>
		<li class="lang" key="contact">Contact Us</li>
	</ul>

	
</body>
</html>