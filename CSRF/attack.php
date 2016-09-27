
<head>

    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>

</head>

<body>
<form action="index.php" id="automatic" method="post">
<input type="hidden" value="Ei" name="new"/>
</form>

<a href="#"><img src="button.jpg" alt="PUSH HERE" id="pic"></a>

<script>
    $(document).ready(function () {
        $('#pic').click(function () {

            $('#automatic').submit(function () {

                $(this).submit();
            });


        })

    });

</script>

</body>
<?php


