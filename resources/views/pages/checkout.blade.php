<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>
  <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

<body>

  <!-- <form action="/checkout" method="post">
    <input type="text" value="budi" name="name">
    <input type="text" value="budi.pra@example.com" name="email">
    <input type="number" value="10" name="qty">
  </form> -->

  <button id="pay-button">Pay!</button>

  <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
  <div id="snap-container"></div>

  <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
      // Also, use the embedId that you defined in the div above, here.
      window.snap.embed('{{$snapToken}}', {
        embedId: 'snap-container',
        onSuccess: function(result) {
          /* You may add your own implementation here */
          console.log(result, 'Success'); 
          alert("payment success!");
        },
        onPending: function(result) {
          /* You may add your own implementation here */
          console.log(result, 'pending');
          alert("wating your payment!");
        },
        onError: function(result) {
          /* You may add your own implementation here */
          console.log(result, 'failed');
          alert("payment failed!");
        },
        onClose: function() {
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      });
    });
  </script>
</body>

</html>