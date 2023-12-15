<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html {
            overflow: auto;
        }
        html,body,div,iframe {
            margin: 0px;
            padding: 0px;
            height: 100%;
            border: none;
        }
        iframe {
            display: block;
            width: 100%;
            border: none;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    @foreach ($dataFile as $data)
    <iframe src="{{ asset('storage/'.$data->file) }}" frameborder="0" marginheight="0"
        marginwidth="0" width="100%" height="100%"></iframe>       
    @endforeach
</body>

</html>