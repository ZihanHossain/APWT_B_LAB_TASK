<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Shop Name</th>
            <th>Todays sold product's</th>
            <th>Last seven days sold product's</th>
        </tr>
        
        <tr>
            <td><a href="/system/sales/physical_store"><span>Physical Store</span></a></td>
            <td>{{$physicaltodaycount}}</td>
            <td>{{$physicaltodaycount}}</td>
        </tr>
        <tr>
            <td><a href="/system/sales/social_media"><span>Social Media</span></a></td>
            <td>{{$socialtodaycount}}</td>
            <td>{{$socialsevencount}}</td>
        </tr>
        <tr>
            <td><a href="/system/sales/ecommerce"><span>Ecommerce Web App</span></a></td>
            <td>{{$ecommerce_today}}</td>
            <td>{{$ecommerce_seven_days}}</td>
        </tr>
    </table>
</body>
</html>