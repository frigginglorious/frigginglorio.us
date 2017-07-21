<head>
<link href="/css/charSelect.css" rel="stylesheet">
<!-- <script src="/js/charSelect.js" type="text/javascript"></script> -->
<link rel="stylesheet" href="css/fa/css/font-awesome.min.css">

</head>
<body>
    <h1>Select Your Character</h1>


    <?php
        $pdo = include("cms/dbConnect.php");

        $sql = "SELECT post.id as postID, title, content, cat.icon from post JOIN cat ON post.catID = cat.id WHERE post.featured=1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $array = $stmt->fetchAll();
        // print_r($array);
        // $array = ['fa-calculator','fa-address-book-o','fa-telegram'];
        // for($i = 0; $i < $array.length(); $i++){
        // for($i = 0; $i < count($array); $i++){
        //     echo "<div id='icon$i'></div>";
        // }
     ?>
     <div id="root">
     </div>
     <a href="/index.php">Go To Main Page.</a>

</body>
<script>

var theArray = <?= json_encode($array) ?>;
var el = document.createElement( 'html' );
theArray.forEach(function(element){
    // console.log(element["content"]);
    el.innerHTML = element["content"];
    tags = el.getElementsByTagName( 'img' );
    console.log(tags);
    element["img"] = tags[0].src;
    tags = el.getElementsByTagName( 'blockquote' );
    console.log(tags);
    element["content"] = tags[0].innerText || element.textContent;
    // element["title"] = element["title"].toUpperCase();

})

// console.info(theArray);
// newRay = Object.keys(theArray).map(function(_) { return theArray[_]["icon"]; })
// console.log(newRay);
</script>

<script src="/landing/bundle.js" type="text/javascript"></script>
