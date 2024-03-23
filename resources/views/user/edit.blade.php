<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>会員情報</title>
 </head>
 
 <body>
     <header>
         <nav>
         <li>
           <a href="{{ route('mypage') }}">マイページ</a>
         </li>
         </nav>
     </header>

     <h1>会員情報編集</h1>
     <form method="POST" action="{{ route('mypage.update', $user) }}">
         @method('PUT')
         @csrf
         <div>氏名（必須）</div>
         <div>
             <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus placeholder="名古屋 太郎">
         </div>
         <div>メールアドレス（必須）</div>
             <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" placeholder="taro.nagoya@example.com">
         <div>電話番号</div>
             <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" autocomplete="tel-national" minlength="10" maxlength="11" placeholder="09012345678">
         <button type="submit">更新</button>
 
     <footer>
         <p>&copy; NAGOYAMESHI All rights reserved.</p>
     </footer>
 </body>
 
 </html>