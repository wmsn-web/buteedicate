<form id="subForm" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <!-- Identify your business so that you can collect the payments -->
    <input type="" name="business" value="sb-ute3h22344887@business.example.com">
    <!-- Specify a subscriptions button. -->
    <input type="" name="cmd" value="_xclick-subscriptions">
    <!-- Specify details about the subscription that buyers will purchase -->
    <input type="" name="item_name" id="item_name" value="<?= $pln['plan_title']; ?>">
    <input type="" name="item_number" id="item_number" value="<?= $pln['id']; ?>">
    <input type="" name="currency_code" value="USD">
    <input type="" name="a3" id="item_price" value="<?= $pln['price']; ?>">
    <input type="" name="p3" id="interval_count" value="<?= $pln['duration']; ?>">
    <input type="" name="t3" id="interval" value="<?= $pln['intervals']; ?>">
    <input type="" name="src" value="1">
    <input type="" name="srt" value="52">
    <!-- Custom variable user ID -->
    <input type="" name="custom" value="<?= $usr['id']; ?>">
    <!-- Specify urls -->
    <input type="" name="cancel_return" value="<?= base_url('Membership_plans/payment_cancel'); ?>">
    <input type="" name="return" value="<?= base_url('Membership_plans/payment_success/'.urlencode(base64_encode($usr['id']))); ?>">
    <input type="" name="notify_url" value="<?= base_url('paypal/ipn'); ?>">
    <!-- Display the payment button -->
    <input class="buy-btn" type="hidden" value="Buy Subscription">
</form>

<script type="text/javascript">
    document.getElementById('subForm').submit();
</script>

