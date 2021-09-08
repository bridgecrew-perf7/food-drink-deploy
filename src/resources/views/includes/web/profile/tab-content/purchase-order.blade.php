<div class="list-order_text_cancel">
  <span>{{ __('custom.message_order_cancel_condition') }}</span>
</div>
<div class="panel panel-default">
  @forelse($orders as $order)
  <div class="panel-footer text-left">
    <h4>
      <span>#{{ $loop->index + 1 }} -</span>
      <span>{{ __('custom.cart_total') }}: {{ number_format($order->total_money, 0, ',', '.') . 'đ' }} -</span>
      <span>
        {{ checkLanguage('Day: ' . $order->created_at->format('M d, Y \a\t h:i A'), 'Ngày: '
          . $order->created_at->format('d/m/yy \l\ú\c H:i')) }}.
        {!! displayStatusOrder($order->status) !!}
      </span>
      {!! displayCancelOrder($order->created_at, $order->id, $order->status) !!}
    </h4>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('custom.product')}}</th>
        <th scope="col">{{__('custom.quantity')}}</th>
        <th scope="col">{{__('custom.price_total')}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($order->order_product as $row)
        <tr>
          <th scope="row">{{ $loop->index + 1 }}</th>
          <td>{{ $row->products->name }}</td>
          <td>{{ $row->amount_of }}</td>
          <td>{{ formatPrice($row->total_money) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @empty
    <p>{{__('custom.message_order_no_data')}}</p>
  @endforelse
</div>
