<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="post-wall">

    <div id="post-list">
        <?php
            require_once ('db.php');
            $sqlQuery = "SELECT * FROM tbl_posts";
            $result = mysqli_query($conn, $sqlQuery);
            $total_count = mysqli_num_rows($result);
            
            $sqlQuery = "SELECT * FROM tbl_posts ORDER BY id  LIMIT 10";
            $result = mysqli_query($conn, $sqlQuery);
         ?>
        <input type="hidden" name="total_count" id="total_count"
            value="<?php echo $total_count; ?>" />

        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $content = substr($row['content'], 0, 100);
                ?>
        <div class="post-item" id="<?php echo $row['id']; ?>">
            <p class="post-title">
                <?php echo $row['title']; ?>
            </p>
            <p>
                <?php echo $content; ?>
            </p>
        </div>
        <?php
            }
        ?>
    </div>
    <div class="ajax-loader text-center">
        <img src="LoaderIcon.gif"> Loading more posts...
    </div>

<script type="text/javascript">
$(document).ready(function(){
        windowOnScroll();
});
function windowOnScroll() {
       $(window).on("scroll", function(e){
        if ($(window).scrollTop() == $(document).height() - $(window).height()){
            if($(".post-item").length < $("#total_count").val()) {
                var lastId = $(".post-item:last").attr("id");
                //getMoreData(lastId);
            }
        }
    });
}

function getMoreData(lastId) {
       $(window).off("scroll");
    $.ajax({
        url: 'testscrollData.php?lastId=' + lastId,
        type: "get",
        beforeSend: function ()
        {
            $('.ajax-loader').show();
        },
        success: function (data) {
        	   setTimeout(function() {
                $('.ajax-loader').hide();
            $("#post-list").append(data);
            windowOnScroll();
        	   }, 1000);
        }
   });
}
</script>
</div>
</body>
</html>