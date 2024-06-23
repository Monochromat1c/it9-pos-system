@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/userProducts.css">
<title>Receipt</title>

<section class="adminDashboardBody kld--display-flex">
    <section class="mobileSidebar kld--display-none"></section>
    <section class="kld--site kld--min-width-dvw-100">
        <main>
            <div class="header kld--margin-top-2">
                <h1 class="kld--text-color-white kld--text-align-center">Receipt</h1>
            </div>
            <section class="kld--container kld--margin-top-1">
                <div class="table-container">
                    <div class="receipt-table kld--margin-bottom-2">
                        <h3 class="kld--text-color-white">Cashier: {{ $cashier->first_name }} {{ $cashier->last_name }}</h3>
                        <h3 class="kld--text-color-white">Payment Method: {{ $payment_method->payment_method }}</h3>
                        <h3 class="kld--text-color-white kld--margin-bottom-1">Discount: {{ $discount->discount_name }}</h3>
                        <table class="">
                            <thead class="">
                                <tr class="sticky">
                                    <th class="kld--text-color-white kld--text-align-center">Product</th>
                                    <th class="kld--text-color-white kld--text-align-center">Quantity</th>
                                    <th class="kld--text-color-white kld--text-align-center">Price</th>
                                    <th class="kld--text-color-white kld--text-align-center">Total</th>
                                </tr>
                            </thead>
                            <tbody id="" class="">
                                @foreach($cartItems as $item)
                                    <tr class="table-row{{ $loop->last ? ' last-row' : '' }}">
                                        <td class="kld--text-color-white center-content">{{ $item->product->product_name }}</td>
                                        <td class="kld--text-color-white center-content">{{ $item->quantity }}</td>
                                        <td class="kld--text-color-white center-content">{{ $item->price }}</td>
                                        <td class="kld--text-color-white center-content">{{ $item->quantity * $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="">
                    <div class="kld--text-color-white">
                        <div class="kld--display-flex kld--justify-space-between">
                            <h3>Total Amount: </h3>
                            <h3>{{ number_format($totalAmount, 2) }}</h3>
                        </div>
                        <div class="kld--display-flex kld--justify-space-between">
                            <h3>Discount Amount:</h3>
                            <h3>
                                {{ $discount ? ($discount->discount_amount == 20 ? '20% off' : '0') : '0' }}
                            </h3>
                        </div>
                        <div class="kld--display-flex kld--justify-space-between">
                            <h3>Payable Amount:</h3>
                            <h3>{{ number_format($totalAmountWithDiscount, 2) }}</h3>
                        </div>
                        <div class="kld--display-flex kld--justify-space-between">
                            <h3>Amount Paid: </h3>
                            <h3>{{ number_format($amount_paid, 2) }}</h3>
                        </div>
                        <div class="kld--display-flex kld--justify-space-between">
                            <h3>Change: </h3>
                            <h3>{{ number_format($changeAmount, 2) }}</h3>
                        </div>
                        <form id="print-form" action="{{ route('process-receipt') }}" method="POST">
                            @csrf
                            <input type="hidden" name="cashier" value="{{ $cashier->user_id }}">
                            <input type="hidden" name="payment_method"
                                value="{{ $payment_method->payment_method_id }}">
                            <input type="hidden" name="discount"
                                value="{{ $discount->discount_id ?? '' }}">
                            <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
                            <input type="hidden" name="total_amount_with_discount"
                                value="{{ $totalAmountWithDiscount }}">
                            <input type="hidden" name="amount_paid" value="{{ $amount_paid }}">
                            <input type="hidden" name="change_amount" value="{{ $changeAmount }}">
                            <div class="kld--display-flex kld--justify-flex-end">
                                <button type="" onclick="window.print()"
                                    class="kld--button-primary kld--text-color-white kld--border-radius-medium kld--padding-button-2 kld--margin-top-1 kld--margin-bottom-1">
                                    <i class="fa-solid fa-print"></i>
                                </button>
                            </div>
                            <!-- <button type="submit"
                                class="kld--button-error kld--text-color-white kld--border-radius-medium kld--padding-button-2 kld--margin-top-1 kld--margin-bottom-1 kld--margin-left-1">
                                <i class="fa-solid fa-house"></i>
                            </button> -->
                        </form>

                    </div>
                </div>
            </section>
        </main>
    </section>
</section>
@if(session('success'))
    <script>
        window.onload = function () {
            window.print();
            window.location.href = '{{ route('posUserDashboard.products') }}';
        };
    </script>
@endif
@endsection
