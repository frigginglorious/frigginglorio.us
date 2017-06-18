    <header>

    <nav role="navigation" class="navbar navbar-default">
      <div id="nameLogo" class="pull-left navbar-header">
        <a href="index.php"><h1><span id="fName">DANIEL</span><span id="lName">Kraft</span></h1></a>
        <div id="tag" class="pull-right">
            <a href="https://github.com/frigginglorious"><i class="fa fa-github" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/frigginglorious"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href="https://soundcloud.com/daniel-kraft"><i class="fa fa-soundcloud" aria-hidden="true"></i></a>
            <a href="http://twitter.com/frigginglorious"><i class="fa fa-twitter" aria-hidden="true"></i>
@frigginglorious</a></div>

      </div>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNav"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
      </button>

      <div id="topNav" class="collapse navbar-collapse navbar-default navbar-static-top">
        <ul class="nav navbar-nav">
            <?php
                $sql = "SELECT * FROM cat";
                $stmt = $pdo->query($sql);
                foreach ($stmt as $row)
                {
                    printf ("<li><span class='backdrop-icon'><i class='fa %s fa-4x' aria-hidden='true'></i></span><a class='category-link' href='index.php?cat=%s'>%s</a></li>", $row['icon'], $row['cat'], $row['name']);
                }
             ?>
        </ul>
      </div>

    </nav>

    </header>
