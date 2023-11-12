<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせの受付</title>
</head>
<body>
 <p>ありがとうございます、お問い合わせを受け付けました</p>
 ------
 <p>件名：{{ $inputs['title'] }}</p>
 <p>お問い合わせ内容：{{ $inputs['body']}}</p>
 <p>メールアドレス：{{ $inputs['email']}}</p>
 ------
<p>担当者より折り返しご連絡させていただきますので、今しばらくお待ちくださいませ。</p>
</body>
</html>
