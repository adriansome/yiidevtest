<?php
/* @var $this StoreController */

$this->breadcrumbs=array(
	'Store',
);


?>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<h1><em><?php echo CHtml::encode(Yii::app()->name); ?></em></h1><br/>

<?php if(isset($_GET['gid'])){
    foreach($Genres as $Genre){
        echo '<h1>'.$Genre->Name.'</h1><br/>';
        $desc = $Genre->Description;
        
    }
    
   ?> 
   
<div id="gmenu">
    <?php echo $desc; ?>
    
</div>
<table>
    <tr>
        <?php $cntrow=0;
        foreach($Albums as $Album){
            $aid = $Album->ArtistId;
            $cntrow++;
            if($cntrow %2){
                echo "</tr><tr>";
                foreach($Artists as $Artist){
                    if($Artist->ArtistId = $aid){
                        
                        $aname = $Artist->Name.'<br/>';
                        
                    }
                }
                echo "<td><center><strong>".$aname."</strong>";
                echo CHtml::link('<img src="'.Yii::app()->request->baseUrl.$Album->AlbumArtUrl.'"/><br/>', array('store/details/', 'album'=>$Album->AlbumId));
                echo $Album->Title."<br/>".$Album->Price."</center></td>";           
            }
               ?>
    </tr> 
    
    
</table>

<?php } }

elseif(isset($_GET["Album"]))
{
 foreach($Albums as $Album) {
     echo '<img src="'.Yii::app()->requested->baseUrl.$Album->AlbumArtUrl.'"><br/>';
     echo $Album->Title."<br/>";
      echo $Album->Price."<br/>";
    echo CHtml::link('Add to Cart', array('store/cart/', 'album'=>$Album->AlbumId));
 }  
    
    
    
}
else{
    ?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1><br/>





<?php } ?>

<?php
if(isset($_GET["album"]))
{

echo 'the title'.$title;

}

?>