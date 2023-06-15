<form id="subForm" action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <!-- Identify your business so that you can collect the payments -->
    <input type="hidden" name="business" value="info@byteducate.com">
    <!-- Specify a subscriptions button. -->
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <!-- Specify details about the subscription that buyers will purchase -->
    <input type="hidden" name="item_name" id="item_name" value="<?= $pln['plan_title']; ?>">
    <input type="hidden" name="item_number" id="item_number" value="<?= $pln['id']; ?>">
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="a3" id="item_price" value="<?= $pln['price']; ?>">
    <input type="hidden" name="p3" id="interval_count" value="<?= $pln['duration']; ?>">
    <input type="hidden" name="t3" id="interval" value="<?= $pln['intervals']; ?>">
    <input type="hidden" name="src" value="1">
    <input type="hidden" name="srt" value="52">
    <!-- Custom variable user ID -->
    <input type="hidden" name="custom" value="<?= $usr['id']; ?>">
    <!-- Specify urls -->
    <input type="hidden" name="cancel_return" value="<?= base_url('Membership_plans/payment_cancel'); ?>">
    <input type="hidden" name="return" value="<?= base_url('Membership_plans/payment_success/'.urlencode(base64_encode($usr['id']))); ?>">
    <input type="hidden" name="notify_url" value="<?= base_url('paypal/ipn'); ?>">
    <!-- Display the payment button -->
    <input class="buy-btn" type="hidden" value="Buy Subscription">
</form>

<script type="text/javascript">
    document.getElementById('subForm').submit();
</script>

