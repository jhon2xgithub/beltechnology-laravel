<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex, nofollow">
	<title>Setting text part language</title>
	<script src="https://cdn.ckeditor.com/4.9.1/standard-all/ckeditor.js"></script>
</head>

<body>

	<textarea cols="80" id="editor2" name="editor2" rows="10">		&lt;p&gt;&lt;strong&gt;Language&lt;/strong&gt;&amp;nbsp;is the&amp;nbsp;&lt;a href="http://en.wikipedia.org/wiki/Human"&gt;human&lt;/a&gt;&amp;nbsp;ability to acquire and use complex systems of&amp;nbsp;&lt;a href="http://en.wikipedia.org/wiki/Communication"&gt;communication&lt;/a&gt;, and&amp;nbsp;&lt;strong&gt;a language&lt;/strong&gt;&amp;nbsp;is any specific example of such a system. The scientific study of language is called&amp;nbsp;&lt;a href="http://en.wikipedia.org/wiki/Linguistics"&gt;linguistics&lt;/a&gt;.&lt;/p&gt;		&lt;p&gt;&lt;span dir="rtl" lang="he"&gt;&lt;strong&gt;שפה&lt;/strong&gt;&amp;nbsp;היא דרך&amp;nbsp;&lt;a href="http://he.wikipedia.org/wiki/%D7%AA%D7%A7%D7%A9%D7%95%D7%A8%D7%AA"&gt;תקשורת&lt;/a&gt;&amp;nbsp;המבוססת על&amp;nbsp;&lt;a href="http://he.wikipedia.org/wiki/%D7%9E%D7%A2%D7%A8%D7%9B%D7%AA"&gt;מערכת&lt;/a&gt;&amp;nbsp;&lt;a href="http://he.wikipedia.org/wiki/%D7%A1%D7%9E%D7%9C"&gt;סמלים&lt;/a&gt;&amp;nbsp;מורכבת בעלת חוקיות, המאפשרת לקודד&amp;nbsp;&lt;a href="http://he.wikipedia.org/wiki/%D7%90%D7%A8%D7%92%D7%95%D7%9F_(%D7%A4%D7%A2%D7%95%D7%9C%D7%94)"&gt;ולארגן&lt;/a&gt;&amp;nbsp;&lt;a href="http://he.wikipedia.org/wiki/%D7%9E%D7%99%D7%93%D7%A2"&gt;מידע&lt;/a&gt;&amp;nbsp;בעל&amp;nbsp;&lt;a href="http://he.wikipedia.org/wiki/%D7%9E%D7%A9%D7%9E%D7%A2%D7%95%D7%AA"&gt;משמעויות&lt;/a&gt;&amp;nbsp;רבות ומגוונות. נהוג להבדיל בין הסמל השפתי ה&lt;a href="http://he.wikipedia.org/wiki/%D7%9E%D7%A1%D7%9E%D7%9F"&gt;מסמן&lt;/a&gt;&amp;nbsp;לבין המושג או התוכן ה&lt;a href="http://he.wikipedia.org/wiki/%D7%9E%D7%A1%D7%95%D7%9E%D7%9F"&gt;מסומן&lt;/a&gt;&amp;nbsp;בו, אשר יכול להיות&amp;nbsp;&lt;a href="http://he.wikipedia.org/wiki/%D7%9E%D7%A6%D7%99%D7%90%D7%95%D7%AA"&gt;מציאותי&lt;/a&gt;&amp;nbsp;או&amp;nbsp;&lt;a href="http://he.wikipedia.org/wiki/%D7%94%D7%A4%D7%A9%D7%98%D7%94"&gt;מופשט&lt;/a&gt;.&lt;/span&gt;&lt;/p&gt;		&lt;p&gt;&lt;span dir="ltr" lang="es"&gt;Un&amp;nbsp;&lt;strong&gt;lenguaje&lt;/strong&gt;&amp;nbsp;(del&amp;nbsp;&lt;a href="http://es.wikipedia.org/wiki/Idioma_occitano"&gt;provenzal&lt;/a&gt;&amp;nbsp;&lt;em&gt;lenguatge&lt;/em&gt;&amp;nbsp;y este del&amp;nbsp;&lt;a href="http://es.wikipedia.org/wiki/Lat%C3%ADn"&gt;lat&amp;iacute;n&lt;/a&gt;&amp;nbsp;&lt;em&gt;lingua&lt;/em&gt;) es un sistema de&amp;nbsp;&lt;a href="http://es.wikipedia.org/wiki/Comunicaci%C3%B3n"&gt;comunicaci&amp;oacute;n&lt;/a&gt;&amp;nbsp;estructurado para el que existe un&amp;nbsp;&lt;a href="http://es.wikipedia.org/wiki/Significado"&gt;contexto&lt;/a&gt;&amp;nbsp;de uso y ciertos principios combinatorios formales. Existen contextos tanto naturales como artificiales.&lt;/span&gt;&lt;/p&gt;		&lt;p&gt;&lt;span dir="rtl" lang="ar"&gt;&lt;strong&gt;اللغة&lt;/strong&gt;&amp;nbsp;نسق من الإشارات والرموز، يشكل أداة من أدوات&amp;nbsp;&lt;a href="http://ar.wikipedia.org/wiki/%D8%A7%D9%84%D9%85%D8%B9%D8%B1%D9%81%D8%A9"&gt;المعرفة&lt;/a&gt;، وتعتبر اللغة أهم وسائل التفاهم والاحتكاك بين أفراد المجتمع في جميع ميادين الحياة. وبدون اللغة يتعذر نشاط الناس المعرفي.&lt;/span&gt;&lt;/p&gt;
	</textarea>

	<script>
		CKEDITOR.replace( 'editor2', {
			extraPlugins: 'language',
			// Customizing list of languages available in the Language drop-down.
			language_list: [ 'ar:Arabic:rtl', 'fr:French',  'he:Hebrew:rtl', 'es:Spanish' ],
			height: 270
		} );
	</script>
</body>

</html>