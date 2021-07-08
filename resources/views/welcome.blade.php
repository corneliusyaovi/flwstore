<h3>Buy AMC Ticket N500.00</h3>
<form method="POST" action="{{ route('pay') }}" id="paymentForm">
    {{ csrf_field() }}

    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name">
    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name">
    <input type="hidden" name="country" value="NG" />
    <input name="email" type="email" placeholder="Your Email" />
    <input name="phone" type="tel" placeholder="Phone number" />
    <input name="currency" type="hidden" value="NGN" />
    <input name="amount" type="hidden" value="500" />
    <input type="hidden" name="payment_method" value="both" />


    <input type="submit" value="Buy" />
</form>