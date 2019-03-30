<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Enviar TTS</title>
</head>
<body>
    <h1>Enviar mensaje</h1>
    <form method="post">
        <input type="text" name="phone" placeholder="Número telefónico">
        <input type="text" name="message" placeholder="Mensaje a dictar">
        <input type="submit" name="submit" value="Llamar">  
    </form>
    <?php
    if (isset($_POST['submit']) & isset($_POST['phone']) & isset($_POST['message'])) {
        $call = curl_init();
        curl_setopt_array($call, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://127.0.0.1:5000/call',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => 'phone=' . $_POST['phone'].'&message="'.$_POST['message'].'"',
        ]);
        curl_exec($call);
    }
?>
</body>
</html>
