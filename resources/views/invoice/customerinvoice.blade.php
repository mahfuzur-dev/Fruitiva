<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="script.js"></script>
	</head>
    <style>
*{
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

/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }

/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 7.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #39B54A; border-radius: 0.25em; color: #000; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: right; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: left; }
header span { margin: 10px 0 0em 0em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: right; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */



/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }
header h2{
    font-size: 20px;
    font-weight: 700;
    padding-bottom: 10px;
   
}
header h5{
    font-size: 18px;
    font-weight: 900;
}




@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
    </style>
<body>
    <header>
        
        <h1>Invoice</h1>
        <h5>Fruitiva Shoping Center</h5>
        
        <span><img alt="" src="https://i.postimg.cc/C19zrzrH/Triphography.png"></span>
        <address>
            <h2>Company Address</h2>
            <p>Street: 101 A. Chapman Ave<br>Orange, CA 92866</p>
            <p>Phone: (+880) 123456789</p>
            <p>Email Address: fruitiva@gmailc.om</p>
        </address>
        
    </header>
    <article>
        @php
                $sub_total = App\Models\Order::find($order_id)->subtotal;
                $discount = App\Models\Order::find($order_id)->discount;
                $delivery = App\Models\Order::find($order_id)->delivary;
            @endphp
        <table style="margin-bottom: 20px;">
            <tr>
                <th style="background: #F7941D;"><span>Invoice #</span></th>
                <td><span>{{App\Models\Billing::where('order_id',$order_id)->first()->created_at->format('d.m.y')}}/{{$order_id}}</span></td>
            </tr>
            <tr>
                <th style="background: #F7941D;"><span>Date</span></th>
                <td><span>{{App\Models\Billing::where('order_id',$order_id)->first()->created_at->format('d.M.Y')}}</span></td>
            </tr>
            <tr>
                <th style="background: #F7941D;"><span>Amount Due</span></th>
                <td><span id="prefix">TK </span><span>{{$sub_total - $discount + $delivery}}</span></td>
            </tr>
        </table>
        <table  style="margin-bottom: 20px;">
            <tr>
                <th style="text-align: center;font-size:25px;font-weight:700;background: #83C223;" colspan="2">Billing Info</th>
            </tr>
            <tr>
                <th style="background: #98e4ff;"><span>Name</span></th>
                <td><span>{{App\Models\Billing::where('order_id',$order_id)->first()->name}}</span></td>
            </tr>
            <tr>
                <th style="background: #98e4ff;"><span>Email</span></th>
                <td><span>{{App\Models\Billing::where('order_id',$order_id)->first()->email}}</span></td>
            </tr>
            <tr>
                <th  style="background: #98e4ff;"><span>Company Name</span></th>
                <td><span>{{App\Models\Billing::where('order_id',$order_id)->first()->company}}</span></td>
            </tr>
            <tr>
                <th style="background: #98e4ff;"><span>Address</span></th>
                <td><span>{{App\Models\Billing::where('order_id',$order_id)->first()->address}}</span></td>
            </tr>
            <tr>
                <th style="background: #98e4ff;"><span>Phone</span></th>
                <td><span>{{App\Models\Billing::where('order_id',$order_id)->first()->mobile}}</span></td>
            </tr>
        </table>
        <table>
            <thead>
                <tr>
                    <th style="background: #83C223;text-align: center;"><span>Item</span></th>
                    <th style="background: #83C223;text-align: center;"><span>Description (Color/Size)</span></th>
                    <th style="background: #83C223;text-align: center;"><span>Rate</span></th>
                    <th style="background: #83C223;text-align: center;"><span>Quantity</span></th>
                    <th style="background: #83C223;text-align: center;"><span>Price</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\OrderProduct::where('order_id',$order_id)->get() as $product)
                    <tr> 
                        <td style="text-align: center;"><span >{{$product->rel_to_product->product_name}}</span></td>
                        <td style="text-align: center;"><span >{{$product->rel_to_color->color_name}} /{{$product->rel_to_size->size_name}}</span></td>
                        <td style="text-align: center;"><span data-prefix>TK </span><span>{{$product->rel_to_product->after_discount}}</span></td>
                        <td style="text-align: center;"><span >{{$product->quantity}}</span></td>
                        <td style="text-align: center;"><span data-prefix>TK </span><span>{{$product->rel_to_product->after_discount*$product->quantity}}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       
        <table class="balance" style="margin-top: 15px;">
            <tr>
                <th style="background: #FAC800;"><span>Sub Total</span></th>
                <td><span data-prefix>TK </span><span>{{App\Models\Order::find($order_id)->subtotal}}</span></td>
            </tr>
            <tr>
                <th style="background: #FAC800;"><span>Discount</span></th>
                <td><span data-prefix>TK </span><span>{{App\Models\Order::find($order_id)->discount}}</span></td>
            </tr>
            <tr>
                <th style="background: #FAC800;"><span>Delivery Charge</span></th>
                <td><span data-prefix>TK </span><span>{{App\Models\Order::find($order_id)->delivary}}</span></td>
            </tr>
            @php
                $sub_total = App\Models\Order::find($order_id)->subtotal;
                $discount = App\Models\Order::find($order_id)->discount;
                $delivery = App\Models\Order::find($order_id)->delivary;
            @endphp
            <tr>
                <th style="background: #FAC800;"><span>Total</span></th>
                <td><span data-prefix>TK </span><span>{{$sub_total - $discount + $delivery}}</span></td>
            </tr>
        </table>
       
    </article>
    <aside>
        <h1><span>Additional Notes</span></h1>
        <div>
            <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
        </div>
    </aside>
</body>
</html>