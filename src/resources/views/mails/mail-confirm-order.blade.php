<!DOCTYPE html>
<html>
<head>
  <title>Food and Drinks</title>
</head>
<body>
<p>{{ __('custom.hello') }} {{ $details['name_user'] }},</p>
  <br>
  <h2>{{ $details['title'] }}!</h2>
  <p>{{ $details['message'] }},</p>
  <br>
  <h4>- {!! $details['notify'] !!}</h4>
   @if(!empty($details['orders']))
    <table style="border-color: #666;" cellpadding="10">
      <tr style='background: #eee;'>
        <th>#</th>
        <th>{{ __('custom.product') }}</th>
        <th>{{ __('custom.quantity') }}</th>
        <th>{{ __('custom.price') }}</th>
        <th>{{ __('custom.price_total') }}</th>
        <th>{{ __('custom.ordered_at') }}</th>
      </tr>
      @foreach($details['orders'] as $order)
        <tr>
          <th>{{ $loop->iteration }}</th>
          <td>{{ $order->products->name }}</td>
          <td>{{ $order->amount_of }}</td>
          <td>{{ $order->products->price }}</td>
          <td>{{ formatPrice($order->total_money) }}</td>
          <td>{{ checkLanguageWithDay($order->created_at) }}</td>
        </tr>
      @endforeach
    </table>
  @endif
  <p>{{ __('custom.thank_you') }}!</p>
</body>
</html>
