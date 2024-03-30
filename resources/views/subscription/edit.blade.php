<!DOCTYPE html>
 <html lang="ja">
 
 
 <head>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripeKey = "{{ env('STRIPE_KEY') }}";
    </script>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お支払い方法編集</title>
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
    <h1 class="mb-3 text-center" id="test">お支払い方法</h1>
      <div class="container mb-4">
        <div class="row pb-2 mb-2 border-bottom">
          <div class="col-3">
            <span class="fw-bold">カード種別</span>
          </div>

          <div class="col">
            <span>{{ $user->pm_type }}</span>
          </div>
        </div>

        <div class="row pb-2 mb-2 border-bottom">
          <div class="col-3">
            <span class="fw-bold">カード名義人</span>
          </div>

          <div class="col">
            <span>{{ $user->defaultPaymentMethod()->billing_details->name }}</span>
          </div>
        </div>

        <div class="row pb-2 mb-2 border-bottom">
          <div class="col-3">
            <span class="fw-bold">カード番号</span>
          </div>

          <div class="col">
            <span>**** **** **** {{ $user->pm_last_four }}</span>
          </div>
        </div>
      </div>

      <div class="alert alert-danger nagoyameshi-card-error" id="card-error" role="alert">
        <ul class="mb-0" id="error-list"></ul>
      </div>

      <form id="card-form" action="{{ route('subscription.update') }}" method="post">
        @csrf
        @method('patch')
        <input type="text" class="nagoyameshi-card-holder-name mb-3" id="card-holder-name" placeholder="カード名義人" required>
        <div class="nagoyameshi-card-element mb-4" id="card-element"></div>
      </form>
      <div class="d-flex justify-content-center">
        <button class="btn text-white shadow-sm w-50 nagoyameshi-btn" id="card-button" data-secret="{{ $intent->client_secret }}">変更</button>
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