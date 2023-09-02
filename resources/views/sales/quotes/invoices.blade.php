{{-- @extends('layouts.main')
@section('contents') --}}
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{asset('main/css/invoice.css')}}">
    {{-- <script src="{{asset('main/css/invoice.js')}}"></script> --}}
</head>

<body>
    <div id="page-container">
        <div id="bg-img"></div>
        <div id="content-wrap">
            @foreach ($quotation as $data)

            @endforeach

            <header>
                <h1>Quote</h1>
                <address>
                    <h2>KETI ERP System</h2>
                    <p>36/A Hardson Road, Calry 58412</p>
                    <p>P: 01795795441, 01901658560,<span>Email: erp@mail.com</span></p>
                </address>
            </header>
            <article>
                <h1>Recipient</h1>
                <address>
                    <h4>{{$data->business_name}}</h4>
                    <p>{{$data->del_address}}</p>
                    <p>P: {{$data->phone}}</p>
                </address>
                <table class="meta">
                    <tr>
                        <th><span>Quote #</span></th>
                        <td><span>{{$data->quotation}}</span></td>
                    </tr>
                    <tr>
                        <th><span>Date</span></th>
                        <td><span>{{$data->quote_date}}</span></td>
                    </tr>
                    {{-- <tr>
                        <th><span>Amount Due</span></th>
                        <td><span id="prefix">$</span><span>600.00</span></td>
                    </tr> --}}
                </table>
                <table class="inventory">
                    <thead>
                        <tr>
                            <th><span>Item</span></th>
                            <th><span>Description</span></th>
                            <th><span>Quantity</span></th>
                            <th><span>Rate</span></th>
                            <th><span>Price</span></th>
                        </tr>
                    </thead>
                    @php
                        $totalPrice = 0;
                    @endphp
                    <tbody>
                        @foreach ($quotation as $items )
                            <tr>
                                <td><span>{{$items->items}}</span></td>
                                <td><span>{{$items->description}}</span></td>
                                <td><span>{{$items->quantity}}</span></td>
                                <td><span data-prefix>৳ </span><span>{{$items->price}}</span></td>
                                <td><span data-prefix>৳ </span><span>{{$items->quantity * $items->price}}</span></td>
                            </tr>
                        @php
                            $totalPrice += $items->quantity * $items->price;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <table class="balance">
                    <tr>
                        <th><span>Total</span></th>
                        <td><span data-prefix>৳ </span><span>{{$totalPrice}}</span></td>
                    </tr>
                    {{-- <tr>
                        <th><span>Amount Paid</span></th>
                        <td><span data-prefix>$</span><span>0.00</span></td>
                    </tr>
                    <tr>
                        <th><span>Balance Due</span></th>
                        <td><span data-prefix>$</span><span>600.00</span></td>
                    </tr> --}}
                </table>
            </article>
            <div class="sign-part">
                <ul class="sign-table">
                    <li><span>Customer Signature</span></li>
                    <li><span>Manager Signature</span></li>
                    <li><span>Authority Signature</span></li>
                </ul>
            </div>
        </div>
        <footer id="footer">
            <h1><span>Additional Notes</span></h1>
            <div>
                <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
            </div>
        </footer>
    </div>

</body>

</html>
{{-- @endsection --}}
