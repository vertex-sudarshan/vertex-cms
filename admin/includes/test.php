
<html>
<head>
	<title>Nepali Calendar</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="nepali.datepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="nepali.datepicker.css" />
</head>
<body>
	<h2>Nepali Calendar</h2>
	<input type="text" id="nepaliDate" class="nepali-calendar" value="2069-08-02"/>
	<input type="text" id="nepaliDate1" class="nepali-calendar" value="2069-08-12"/><br/>
	<input type="text" id="nepaliDate2" class="nepali-calendar" value="2069-08-18"/>
	<input type="text" id="nepaliDate3" class="nepali-calendar" value="2069-08-21"/><br/>
	<input type="text" id="nepaliDate4" class="nepali-calendar" value="2069-08-25"/>
	<input type="text" id="test">
</body>
</html>
<script>
	$(document).ready(function(){
		$('.nepali-calendar').nepaliDatePicker();
	});
</script>