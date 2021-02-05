<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript" src="lib/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="lib/jquery.jcarousel.min.js"></script>
<link rel="stylesheet" type="text/css" href="skin.css" />
</head>

<body>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        // Configuration goes here
    });
});

<div class="jcarousel-skin-name">
  <div class="jcarousel-container">
    <div class="jcarousel-clip">
      <ul class="jcarousel-list">
        <li class="jcarousel-item-1">First item</li>
        <li class="jcarousel-item-2">Second item</li>
      </ul>
    </div>
    <div disabled="disabled" class="jcarousel-prev jcarousel-prev-disabled"></div>
    <div class="jcarousel-next"></div>
  </div>
</div>

</script>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        itemLoadCallback: itemLoadCallbackFunction
    });
});
</script>

<script type="text/javascript">
function itemLoadCallbackFunction(carousel, state)
{
    for (var i = carousel.first; i <= carousel.last; i++) {
        // Check if the item already exists
        if (!carousel.has(i)) {
            // Add the item
            carousel.add(i, "I'm item #" + i);
        }
    }
};
</script>

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel();
});

var carousel = jQuery('#mycarousel').data('jcarousel');

var index = 1;
var html = 'My content of item no. 1';
jQuery('#mycarousel').jcarousel('add', index, html);

</body>
</html>
