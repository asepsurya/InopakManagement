<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	@foreach ($dataFile as $data)
	<iframe src="https://docs.google.com/gview?url={{ asset('storage/'.$data->file) }}&embedded=true" frameborder="0" width="100%" height="700">
	</iframe>
	@endforeach
</body>
</html>