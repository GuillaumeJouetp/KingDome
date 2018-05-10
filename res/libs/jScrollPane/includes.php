<!-- styles needed by jScrollPane -->
<link type="text/css" href="../res/libs/jScrollPane/style/jquery.jscrollpane.css" rel="stylesheet" media="all" />

<!-- latest jQuery direct from google's CDN -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<!-- the mousewheel plugin - optional to provide mousewheel support -->
<script type="text/javascript" src="../res/libs/jScrollPane/script/jquery.mousewheel.js"></script>

<!-- the jScrollPane script -->
<script type="text/javascript" src="../res/libs/jScrollPane/script/jquery.jscrollpane.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $('.pieces').jScrollPane();
    });

</script>