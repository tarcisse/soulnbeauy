

        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>

    <style>
        span.reference{
            position:fixed;
            left:10px;
            bottom:0px;
            font-size:9px;
        }
        span.reference a{
            color:#aaa;
            text-decoration:none;
        }
        span.reference a:hover{
            color:#ddd;
            
        }

    </style>
    <body>
        <div class="albumbar">
            <span>
                    Select
            </span>
            <div id="albumSelect" class="albumSelect">
                <ul>
                    <?php
                    $firstAlbum = '';
                    $i=0;
                    if(file_exists('images')) {
                        $files = array_slice(scandir('images'), 2);
                        if(count($files)) {
                            natcasesort($files);
                            foreach($files as $file) {
                                if($file != '.' && $file != '..') {
                                    if($i===0)
                                        $firstAlbum = $file;
                                    else
                                        echo "<li><a>$file</a></li>";
                                    ++$i;
                                }
                            }
                        }
                    }
                    ?>
                </ul>
                <div class="title down"><?php echo $firstAlbum;?></div>
            </div>
        </div>
        <div id="loading"></div>
        <div id="preview">
            <div id="imageWrapper">               
            </div>  
        </div>
        <div id="thumbsWrapper">
        </div>
        <div class="infobar">
            <span id="description"></span>
            <!--<span class="reference">
                <a href="http://tympanus.net/codrops/2010/05/23/fresh-sliding-thumbnails-gallery-with-jquery-php">Soulnbeauty</a>
            </span>-->
        </div>
        <!-- The JavaScript -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="jquery.gallery.js"></script>
    </body>
</html>