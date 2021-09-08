<div class="container">
    @if(session('message'))
        <div id="message_time" class="alert {{ session('alert') }} text-center">
            <h4>{{ session('message') }}</h4>
        </div>
    @endif
    <div class="form-group">
        <h3>{{ __('custom.shopping_cart') }}</h3>
    </div>
    <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td class="image">{{ __('custom.item') }}</td>
                    <td class="description"></td>
                    <td class="price">{{ __('custom.price') }}</td>
                    <td class="quantity">{{ __('custom.quantity') }}</td>
                    <td class="total">{{ __('custom.total_price') }}</td>
                    <td>
                        <a class="btn btn-danger" id="cart__btn-delete-all" href="javascript:void(0);"
                           title="{{ __('custom.delete_all') }}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach (Cart::content() as $item)
                    <tr id="cart-product-{{ $item->id }}">
                        <td class="cart_product">
                            <a href="{{ route('product_detail', ['slug' => $item->options->slug]) }}">
                                <img src="/images/products/{{ $item->options->image }}" alt="">
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4>
                                <a href="{{ route('product_detail', ['slug' => $item->options->slug]) }}">
                                    {{ $item->name }}
                                </a>
                            </h4>
                            <p>{{ __('custom.quantity') }}:
                              <span id="cart-quantity-value-{{ $item->id }}">{{ $item->options->quantity }}</span>
                            </p>
                        </td>
                        <td class="cart_price">
                            <p>{{ formatPrice($item->price) }}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_down" href="javascript:void(0)"
                                    onclick="addToCart({!! $item->id !!},1,'decrease')">-</a>
                                <input class="cart_quantity_input" type="text" name="quantity"
                                    id="cart-quantity-{{ $item->id }}" value="{{ $item->qty }}"
                                    autocomplete="off" size="2" disabled>
                                <a class="cart_quantity_up" href="javascript:void(0)"
                                    onclick="addToCart({!! $item->id !!},1,'increment')">+</a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price" id="cart-total-{{ $item->id }}">
                                {{ formatPrice($item->price) }}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="javascript:void(0)"
                                title="{{ __('custom.delete') }}"
                                onclick="addToCart({!! $item->id !!},0,'delete')">
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
