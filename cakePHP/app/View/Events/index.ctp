<!-- calendar.ctp -->
 
<?php
 
    echo $javascript->link('jquery-1.3.2.min.js');
    echo $javascript->link('ui.core.js');
    echo $javascript->link('ui.resizable.js');
    echo $javascript->link('fullcalendar.min.js');
    echo $javascript->link('ui.draggable.js');
    echo $html->css('fullcalendar');
    //Note: to use $html->css as above, the fullcalendar.css 
    //file must be in your app/webroot/css folder.
?>
 
<div id="calendar"></div>
<head>
<script type='text/javascript'>
 
    $(document).ready(function() {
        $('#calendar').fullCalendar({});
    });
 
</script>
</head>