<html>

<head>
    <style resource="pub/main.css"></style>
</head>
<body>
    Please paste the link here:
    <form method="post">
        <input type="hidden" id="token_input" value="<?php echo $token ?>"/>
        <input type="text" name="linkSource" id="url_input"/>
        <button type="button" onclick="return submitForm();">Submit</button>
    </form>

    <span id="shortLink"></span>
    <span id="errorContainer"></span>

<script src="pub/app.js"></script>
</body>
</html>