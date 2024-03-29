<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>トップページ</title>
 </head>
 
 <body>
     <header>
         <h1>NAGOYAMESHI</h1>
         <hr>
     </header>

     <main>
        @if (session('flash_message'))
            <p>{{ session('flash_message') }}</p>
        @endif
        @if (session('error_message'))
            <p>{{ session('error_message') }}</p>
        @endif

        @if (Route::has('login'))
                <div>
                    @auth
                    <a href="{{ route('restaurants.index') }}">店舗一覧</a>
                    @else
                        <a href="{{ route('login') }}">ログイン</a><br>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">新規登録</a>
                        @endif
                    @endauth
                </div>
            @endif
     </main>
 
     <footer>
     <hr>
         <p>&copy; NAGOYAMESHI All rights reserved.</p>
     </footer>
 </body>
 
 </html>