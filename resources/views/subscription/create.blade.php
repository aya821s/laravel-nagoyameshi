<!DOCTYPE html> 
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>有料プラン登録</title>
 </head>
 
 <body>
     <header>
         <nav>
         <li>
           <a href="{{ route('mypage') }}">マイページ</a>
         </li>
         <li>
            <a href="{{ route('restaurants.index') }}">店舗一覧</a>
         </li>
         </nav>
         <hr>
     </header>

    <main>
        <div>
			<h1>有料プラン登録</h1>
            <div>有料プランの内容</div>
            <ul>
                <li>当日の2時間前までならいつでも予約可能</li>
                <li>店舗をお好きなだけお気に入りに追加可能</li>
                <li>レビューを投稿可能</li>
                <li>月額たったの300円</li>
            </ul>
        </div>
        <div class="container">
	        <div class="card-body">
		        <form id="payment-form" action="{{ route('subscription.store') }}" method="POST">
		        @csrf
		        <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="カード名義人">
	        </div>
        </div>
		<div class="row mt-3">
			<div class="col-xl-4 col-lg-4">
				<div class="form-group">
					<div id="card-element"></div>
				</div>
			</div>
		<div class="col-xl-12 col-lg-12">
		    <hr>
			<button type="submit" class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">登録</button>
		</div>
	    </div>
				</form>
		</div>

        <script src="https://js.stripe.com/v3/"></script>
        <script>
	        const stripe = Stripe("{{ config('services.stripe.pb_key') }}")
	        const elements = stripe.elements()
	        const cardElement = elements.create('card')	
	        cardElement.mount('#card-element')
	
	        const cardHolderName = document.getElementById('card-holder-name')
	        const cardBtn = document.getElementById('card-button')
            const form = document.getElementById('payment-form')
		
	        form.addEventListener('submit', async (e) => {
	             e.preventDefault()	
	             cardBtn.disabled = true
	        const { setupIntent, error } = await stripe.confirmCardSetup(
	            cardBtn.dataset.secret, {
	            payment_method: {
	                card: cardElement,
	                billing_details: {
	                    name: cardHolderName.value
	                }   
	            }
	            }
	        )
	
	        if(error) {	
	            cardBtn.disable = false
	        } else {
	            let token = document.createElement('input')
	            token.setAttribute('type', 'hidden')
	            token.setAttribute('name', 'token')
	            token.setAttribute('value', setupIntent.payment_method)
	            form.appendChild(token)
	            form.submit();
	        }
	        })
	
        </script>

    </main>
 
    <footer>
        <hr>
            <p>&copy; NAGOYAMESHI All rights reserved.</p>
        </footer>
    </body>
 
 </html>