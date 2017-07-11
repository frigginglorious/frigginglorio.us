<head>
<link href="/css/charSelect.css" rel="stylesheet">
<!-- <script src="/js/charSelect.js" type="text/javascript"></script> -->
<link rel="stylesheet" href="css/fa/css/font-awesome.min.css">

</head>
<body>
<div id="root">
</div>
    <h1>Select Your Character</h1>

    <?php
        $pdo = include("cms/dbConnect.php");
        $array = ['fa-calculator','fa-address-book-o','fa-telegram'];
        // for($i = 0; $i < $array.length(); $i++){
        for($i = 0; $i < count($array); $i++){

            echo "<div id='icon$i'></div>";
        }
     ?>
     <a href="/index.php">Go To Main Page.</a>

</body>
<script>
const theArray = <?= json_encode($array) ?>;
// console.info(theArray);
</script>

<script src="/landing/bundle.js" type="text/javascript"></script>
