<!DOCTYPE html>
<html>
<head>
    <title>Contact Message</title>
</head>
<body style="font-family:Arial;background:#f4f4f4;padding:30px;">

    <div style="
        max-width:500px;
        margin:auto;
        background:#fff;
        padding:25px;
        border-radius:10px;
    ">

        <h2 style="color:#28a745;">Siya Collection update status</h2>

       <h2>Hello {{$user->name }}</h2>

        <p>Your order has been updated.</p>

     <p>Product: <span style="color:green">{{$order->product->name}}</span></p>

     <p>Size: 
            <span style="color:green">
                {{ $order->size->name ?? 'N/A' }}
            </span>
        </p>

        <p>Color: 
            <span style="color:green">
                {{ $order->color->name ?? 'N/A' }}
            </span>
        </p>

     
     <p>Quantity:  <span style="color:green">{{$order->quantity}}</span></p>

         <p>Cost: <span style="color:green">{{$order->product->cost * $data->quantity}}</span></p>

        <p>Status:  <span style="color:green">{{ strtoupper($order->status) ?? ""}}</span></p>

        <p style="color:green; font-size:bold">Thank you for shopping with us.</p>
        <div style="
            background:#f7f7f7;
            padding:15px;
            border-radius:8px;
        ">
            {{ $customMessage }}
        </div>

    </div>

</body>
</html>
