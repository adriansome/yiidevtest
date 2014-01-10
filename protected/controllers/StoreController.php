<?php

class StoreController extends Controller
{
    public $message;
	public function actionIndex()
	{
            echo $this->message = 'hello from store index';
		$this->render('index', array('content'=>$this->message));
                
	}
        
        public function actionBrowse()
	{
                 echo 'hello';
            if(isset($_GET["gid"]))
            {
           
               $genreCriteria = new CDbCriteria();
               $genreCriteria-> select = "GenreId, Name, Description" ;
               $genreCriteria->condition = "GenreId = ".$_GET["gid"];
            
               $artistCriteria = new CDbcriteria();
               $artistCriteria->alias = "t1";
               $artistCriteria->select = "DISTINCT t1.Name, t1.ArtistId";
               $artistCriteria->join ="LEFT JOIN tbl_album ON tbl_album.ArtistId = t1.ArtistId";
               $artistCriteria->condition = "tbl_album.GenreId = ".$_GET['gid'];
               $artistCriteria->order = "t1.ArtistId ASC";
               
               $albumCriteria = new CDbCriteria();
               $albumCriteria->alias = "t2";
               $albumCriteria->select = "AlbumId, GenreId, ArtistId, Title Price, AlbumThumbUrl, AlbumArtUrl";
               $albumCriteria->condition = "GenreId = ".$_GET["gid"];
               $albumCriteria->order = "ArtistId ASC";
               
              $this->render('index', array('Albums'=>Album::model()->findAll($albumCriteria),
                  'Artists'=>Artist::model()->findAll($artistCriteria),
                  'Genres'=>Genre::model()->findAll($genreCriteria))
                      );               
            }
            else{           
            $this->message = 'hello from store browse';
		$this->render('index', array('content'=>$this->message));
	} }
         public $title;
         public $content;
        public function actionDetails()
	{
              if(isset($_GET["albid"]))
            {
                  /*
                   *  Method 1 was devised from a membership tutorial
                   * because I did not think the musicstore tutorial covered a detailed view option
                   *  however method 2 was introduced much later in the musicstore tutorial
                   * so I reverted to method 2
                   */
                  
              /*      //Method 1
           $albumId = $_GET["album"];
              $query = Album::model()->findByPK($albumId);
              $this->title = $query->Title;        
             $this->render('index', ar
             ray('title'=>$this->title));
                 */
               
                  //Method 2
                  
                  $albumCriteria = new CDbCriteria();
                  $albumCriteria->select = "*";
                  $albumCriteria->condition = "AlbumId = ".$_GET['albid'];
                  $this->render('index', array('Albums'=>Album::model()->findAll($albumCriteria)))
                  ;
                echo 'error';
                
                  
                  
               //$query = Customername::model()->findByPK(2);
            //$this->firstname = $query->firstName;
		//$this->render('index', array('firstname'=>$this->firstname));
                
            }
                else{           
            $this->message = 'hello from action album';
		$this->render('index', array('content'=>$this->message));
	}
         
	}
        
        public function actionArtistDetails(){
            
           if($_GET['artistid'])
           {
               echo 'gggggggg'.$_GET['artistid'];
               $artistCriteria = new CDbCriteria();
               $artistCriteria->select = "*";
               $artistCriteria->condition = "ArtistId = ".$_GET['artistid'];
               $this->render("index", array("Artists"=>Artist::model()->findAll($artistCriteria)));
     
               
           }
                  else{           
            $this->message = 'please select an artist to view their deatali artist details';
		$this->render('index', array('content'=>$this->message));
	}
            
      }
      
        
        

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}