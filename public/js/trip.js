const ReceiptCloseBtn = document.getElementById('ReceiptCloseBtn');
const receipt = document.getElementById('receipt');

ReceiptCloseBtn.addEventListener('click', ()=>{
    receipt.style.display = 'none';
});


// var paymentForm = document.getElementById('paymentForm');

// paymentForm.addEventListener('submit', payWithPaystack, false);

// function payWithPaystack() {

//   var handler = PaystackPop.setup({

//     key: 'pk_test_4c1ece0d564f9d1036ae872e759ceb6eebb4b4da', // Replace with your public key
//     email: document.getElementById('email-address').value,
//     amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
//     currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
//     ref: 'YOUR_REFERENCE', // Replace with a reference you generated
//     callback: function(response) {
//       //this happens after the payment is completed successfully
//       var reference = response.reference;
//       alert('Payment complete! Reference: ' + reference);
//       // Make an AJAX call to your server with the reference to verify the transaction
//     },
//     onClose: function() {
//       alert('Transaction was not completed, window closed.');
//     },
//   });
//   handler.openIframe();
// }