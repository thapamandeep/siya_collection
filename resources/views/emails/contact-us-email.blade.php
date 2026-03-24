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

        <h2 style="color:#28a745;">Siya Collection contact </h2>



       

     <p>Name: <span style="color:green">{{$data['name']}}</span></p>
     
     <p>Email:  <span style="color:green">{{$data['email']}}</span></p>
     <p>Message:  </p>

     

      
        <div style="
            background:#f7f7f7;
            padding:15px;
            border-radius:8px;
        ">
            {{ $data['message']}}
        </div>
  <p style="color:green; font-size:bold">Thank you for contact  with us.</p>
    </div>

</body>
</html>
