<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    
<div style="text-align:center;" class="visible-print text-center">
	
    {!! QrCode::size(250)->generate($_GET['c']); !!}
    <p style="text-align:center;"  > <h2> {{$_GET['c']}} </h2> </p>
    
</div>
    
</body>
</html>