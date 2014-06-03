<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script>
$(function() {
    $( "#sortable1, #sortable2" ).sortable().disableSelection();
 
    var $tabs = $( "#tabs" ).tabs();
 
    var $tab_items = $( "ul:first li", $tabs ).droppable({
        accept: ".connectedSortable li",
        hoverClass: "ui-state-hover",
        drop: function( event, ui ) {
            var $item = $( this );
            var $list = $( $item.find( "a" ).attr( "href" ) )
            .find( ".connectedSortable" );
 
        ui.draggable.hide( "slow", function() {
            $tabs.tabs( "option", "active", $tab_items.index( $item ) );
        $( this ).appendTo( $list ).show( "slow" );
        });
        }
    });
});
  
$(function(){
    $('#tabs-1 li#submenu ul').hide();
    $('#tabs-1 li#submenu').hover(
        function(){
            $(this).find('ul').slideDown();
        }, function(){
            $(this).find('ul').slideUp('fast');
        });
});
</script>
</head>
<body>
 

<div style = "width:210px;" id="tabs-1">
    <ul id="sortable1">
    <? for ($i=1;$i<=5;$i++){
        echo "<li id='submenu'>Пункт".$i;
        echo "<ul>";
            for ($j=1;$j<=3;$j++){			
                echo "<li>Подпункт ".$i.".".$j."</li>";
            }
        echo "</ul>";
        echo "</li>";
    }
    ?>
</ul>
</div>
</body>
</html>