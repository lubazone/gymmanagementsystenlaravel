<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>
    {{$mailData['title']}}
  </h1>
  <p>
    Dear {{$mailData['name']}},<br>
    {{$mailData['body']}}
  </p>
  <p>
    Registration Fee(Yearly): {{$mailData['regFee']}}
  </p>
  <p>
    ID Card Fee: {{$mailData['idCardFee']}}
  </p>
  <p>
    Monthly Fee: {{$mailData['monthlyFee']}}
  </p>
  <p>
    Total Fee: {{$mailData['total']}}
  </p>
  <p>Please Pay through Bkash (01785214488) or Bank (Agrani Bank Limited, account number: 0998896007)</p>
  <p>
    Thank you
  </p>
</body>
</html>