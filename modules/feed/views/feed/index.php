    <div class="r pagecontent">
        <?php echo $post_form ?>
        <div id="feeds">
            <?php if(trim($feeds)){ ?>
            <?php echo $feeds ?>
            <?php } else {?>
                <div class="vpad10">
                    No feed
                </div>
            <?php }?>
        </div>
        <?php if(trim($feeds) && ($total_feeds > 5)){ ?>
        <div class="show_more ">
            <a id="more_feeds">Show older feeds &#x25BC;</a>
        </div>
        <?php } ?>
        <div id="feed_event"></div>
    </div>
    
<script type="text/javascript">
new verticalScroll({
    $link : $('#more_feeds'), 
    action : 'feeds',
    start : 6,
    controller : 'feed',
    $appendTO: $('#feeds') //Must Be Id  to which you want to append
});
</script>
