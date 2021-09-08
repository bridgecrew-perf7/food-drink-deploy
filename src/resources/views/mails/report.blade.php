<!DOCTYPE html>
<html>
<head>
  <title>Food and Drinks</title>
</head>
<body>
  <p>{{ __('custom.hello') }} Admin,</p>
  <br>
  <h2>{{ $details['title'] }}!</h2>
  <h2>{{ __('custom.mail_total_amount_month') }}: {{ formatPrice($details['totalAllPrice']) }}</h2>
  <h2>{{ __('custom.mail_top5_order') }}:</h2>
  @foreach($details['usersOrdered'] as $row)
    <h4>
      - {{ $row->users->name }}
      {{ __('custom.mail_has_ordered') }} {{ $row->number_ordered }} {{ __('custom.mail_times') }},
      {{ __('custom.price_total') }} {{ formatPrice($row->total_money) }}
    </h4>
  @endforeach
  <h2>{{ __('custom.mail_list_orders') }}:</h2>
  <table  style="border-color: #666;" cellpadding="10">
    <tr style='background: #eee;'>
      <th>#</th>
      <th>Id</th>
      <th>{{ __('custom.user') }}</th>
      <th>{{ __('custom.price_total') }}</th>
      <th>{{ __('custom.ordered_at') }}</th>
      <th>{{ __('custom.status') }}</th>
    </tr>
    @foreach($details['body'] as $order)
      <tr>
        <th>{{ $loop->iteration }}</th>
        <td>{{ $order->id }}</td>
        <td>{{ $order->users->name }}</td>
        <td>{{ formatPrice($order->total_money) }}</td>
        <td>{{ checkLanguageWithDay($order->created_at) }}</td>
        <td>{{ checkStatus($order->status) }}</td>
      </tr>
    @endforeach
  </table>
  <p>{{ __('custom.mail_message') }}</p>
  <br>
  <p>{{ __('custom.thank_you') }}!</p>
</body>
</html>
