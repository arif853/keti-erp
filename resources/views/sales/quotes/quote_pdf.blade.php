    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        /* reset */
        body {
            background-color: transparent;
            background-image: url(D:\Xampp\htdocs\Laravel_app\keti-erp\public\main\images\Asset3.png); /* Replace with the actual path to your image */
            background-repeat: no-repeat;
            background-size: cover; /* Adjust the background size as needed */
        }

        * {
            border: 0;
            box-sizing: content-box;
            color: inherit;
            font-family: inherit;
            font-size: inherit;
            font-style: inherit;
            font-weight: inherit;
            line-height: inherit;
            list-style: none;
            margin: 0;
            padding: 0;
            text-decoration: none;
            vertical-align: top;
        }

        /* heading */

        h1 {
            font: bold 100% sans-serif;
            letter-spacing: 0.5em;
            text-align: center;
            text-transform: uppercase;
        }

        /* table */

        table {
            font-size: 75%;
            /* table-layout: fixed; */
            width: 100%;
        }

        table {
            border-collapse: separate;
            border-spacing: 2px;
        }

        th,
        td {
            border-width: 1px;
            padding: 0.5em;
            position: relative;
            text-align: left;
        }

        th,
        td {
            border-radius: 0.25em;
            border-style: solid;
        }

        th {
            background: #EEE;
            border-color: #BBB;
        }

        td {
            border-color: #DDD;
        }

        /* page */

        html {
            font: 16px/1 'Open Sans', sans-serif;
            overflow: auto;
        }


        #page-container {
            padding: 20px 30px ;
            /* background-color: #FFF ; */
        }



        #content-wrap {
        padding-bottom: 2.5rem;    /* Footer height */
        }

        /* header */

        header {
            margin: 0 0 3em;
        }

        header:after {
            clear: both;
            content: "";
            display: table;
        }

        header h1 {
            background: transparent;
            border-radius: 0.25em;
            color: #FFF;
            margin: 0 0 0em;
            padding: 0.5em 0;
        }

        header address {
            font-weight: bold;
            font-style: normal;
            line-height: 1.25;
            margin: 0 1em 1em 0;
        }

        header address p {
            margin: 4px 0px 4px;
            font-size: 12px;
        }

        header span,
        header img {
            display: block;
            float: right;
        }

        header span {
            margin: 0 0 1em 1em;
            max-height: 25%;
            max-width: 60%;
            position: relative;
        }

        header img {
            max-height: 100%;
            max-width: 100%;
        }

        header input {
            cursor: pointer;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            height: 100%;
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        /* article */

        article,
        article address,
        table.meta,
        table.inventory {
            margin: 0 0 2em;
        }
        article{
            position: relative;
        }

        article:after {
            clear: both;
            content: "";
            display: table;
        }

        article h1 {
            color:#9AF;
            margin-bottom: 25px;
        }
        article address {
            float: left;
            font-size: 85%;
            font-weight: bold;
        }
        article address p{
            margin: 4px 0px 4px;
            font-size: 12px;
        }

        /* table meta & balance */

        table.meta,
        table.balance {
            float: right;
            width: 36%;
            font-size: 14px;
        }

        table.meta:after,
        table.balance:after {
            clear: both;
            content: "";
            display: table;
        }

        /* table meta */

        table.meta th {
            width: 40%;
            font-weight: 700;
        }

        table.meta td {
            width: 60%;
        }

        /* table items */

        table.inventory {
            clear: both;
            width: 100%;
        }

        table.inventory th {
            font-size: 15px;
            font-weight: bold;
            text-align: center;
        }
        table.inventory td {
            font-size: 14px;
        }

        table.inventory td:nth-child(1) {
            width: 25%;
        }

        table.inventory td:nth-child(2) {
            width: 20%;
        }

        table.inventory td:nth-child(3) {
            text-align: right;
            width: 10%;
        }

        table.inventory td:nth-child(4) {
            text-align: right;
            width: 10%;
        }

        table.inventory td:nth-child(5) {
            text-align: right;
            width: 10%;
        }

        /* table balance */

        table.balance th,
        table.balance td {
            width: 50%;
        }

        table.balance td {
            text-align: right;
        }

        /* aside */

        footer h1 {
            border: none;
            border-width: 0 0 2px;
            margin: 10px 0 12px;
            font-size: 14px;
        }

        footer h1 {
            border-color: #999;
            border-bottom-style: solid;
        }
        footer p{
            text-align: center;
            font-size: 12px;
        }

        #footer {
            position: absolute;
            left: 0;
            bottom: 0px;
            width: 100%;
            /* background-color: #000;
            color: #FFF; */
            height: 65px;
        }

        .sign-part{
            position: absolute;
            bottom: 100px;
            padding: 0 0 30px 0;
            border: none;
        }
        .sign-part li{
            display: inline-block;
            margin: 0 50px 0 50px;
            position: relative;
        }
        .sign-part li::after {
            content: '';
            position: absolute;
            left: 0;
            top: -10px;
            width: 140px;
            height: 1px;
            background-color: #000;
        }
        @media print {
            * {
                -webkit-print-color-adjust: exact;
            }

            html {
                background: none;
                padding: 0;
            }

            body {
                box-shadow: none;
                margin: 0;
            }

            span:empty {
                display: none;
            }

        }

        @page {
            margin: 0;
        }
    </style>
</head>
<body>

    <div id="quote_invoice">
        <div class="page-img">
            <div id="page-container">
                <div id="content-wrap">
                    @foreach ($qdata as $data)

                    @endforeach

                    <header>
                        <h1>Quote</h1>
                        <address>
                            <h2>KETI ERP System</h2>
                            <p>36/A Hardson Road, Calry 58412</p>
                            <p>P: 01795795441, 01901658560, Email: erp@mail.com</p>
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
                                @foreach ($qdata as $items )
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
        </div>

    </div>

</body>

</html>
