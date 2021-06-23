<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phycial Store</title>
</head>
<body>

	<h2>Physical store sales details:</h2>

	<table border="1">
		<tr>
			<td>Nubmer of Todays sold products</td>
			<td>{{$physicaltodaycount}}</td>
		</tr>
		<tr>
			<td>Number of Last seven days sold products</td>
			<td>{{$physicaltodaycount}}</td>
		</tr>
		<tr>
			<td>Most sold item</td>
			<td>'ABS'</td>
		</tr>
	</table>

    <form method="POST">
        @csrf
        <table>
            <tr>
                <td>Customer Name</td>
                <td><input type="text" name="customer_name"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="number" name="phone"></td>
            </tr>
            
            <tr>
                <td>Product Name</td>
                <td><select name="product_name" id="">
                @foreach($products as $product)
                    <option value="{{$product->product_name}}">{{$product->product_name}}</option>
                @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="number" name="quantity"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="ADD"></td>
            </tr>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <tr>
                @isset($msg)
                    <td>{{$msg}}</td>
                @endisset
            </tr>
        </table>
        </form>
</body>
</html>