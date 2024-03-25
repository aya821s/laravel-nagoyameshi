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

         <li>
         <a href="{{ route('subscription.create') }}">有料プラン登録</a>
         </li>

         <li>
            <a href="{{ route('restaurants.index') }}">店舗一覧</a>
         </li>

             <form method="POST" action="{{ route('logout') }}">
             @csrf
                <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('ログアウト') }}
                </x-dropdown-link>
             </form>
             </a>

         </nav>
         
         <hr>
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
    <div>
        <a href="{{ route('subscription.edit') }}">クレジットカード情報編集（有料会員のみ）</a>
    </div>
    <div>
        <a href="{{ route('subscription.cancel') }}">有料会員解約（有料会員のみ）</a>
    </div>
    <div>アカウント削除</div>
        
     </main>
 
     <footer>
         <hr>
         <p>&copy; NAGOYAMESHI All rights reserved.</p>
     </footer>
 </body>
 
 </html>