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
 
     <main>
         <h1>マイページ</h1>

         @if (session('flash_message'))
             <p>{{ session('flash_message') }}</p>
         @endif
         
         <div class="d-flex justify-content-end align-items-end mb-3">
                    <div>
                        <a></a>
                    </div>
        </div>
        <div>
            <div>
                <span>氏名</span>
            </div>

            <div>
                <span>{{ $user->name }}</span>
            </div>
        </div>
        <div>
            <div>
                <span>メールアドレス</span>
             </div>
            <div>
                <span>{{ $user->email }}</span>
            </div>
        </div>
        <div>
            <div>
                <span>電話番号</span>
            </div>
        <div>
            <span>
            @if ($user->phone_number !== null)
                {{ $user->phone_number }}
            @else
                未設定
            @endif
            </span>
        </div>
    </div>

    <div>
        <a href="{{route('mypage.edit')}}">マイページ編集</a>
    </div>
    <div>お気に入り店舗一覧（有料会員のみ）</div>
    <div>予約一覧（有料会員のみ）</div>
    <div>クレジットカード情報編集（有料会員のみ）</div>
    <div>有料会員解約（有料会員のみ）</div>
    <div>アカウント削除</div>
        
     </main>
 
     <footer>
         <p>&copy; NAGOYAMESHI All rights reserved.</p>
     </footer>
 </body>
 
 </html>