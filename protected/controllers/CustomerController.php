<?php

class CustomerController extends Controller
{
    public $firstname = '';
     public $personname = '';
    
	public function actionIndex()
	{
            //line 1. go into database using the customername model, find the primary key return the firstName column
            // line 2. and set the  first name vcariabble the result of the query
            //line 3. find the application render the index page page with a set of arrays one of wich is set a firstname.         
            $query = Customername::model()->findByPK(2);
            $this->firstname = $query->firstName;
		$this->render('index', array('firstname'=>$this->firstname));
                
                
// This is used when you have complex queries, those you find difficult to create with Yii conventions.
//Yii::app()->db->createCommand('SELECT * FROM tbl')->queryAll();
//For example, when you need to pass all the data from the model to an array. 
//You cannot pass it directly as it does pass some ActiveRecord data information that you don't need.
                
                $query_names = Customername::model()->findAll();
$arr = array();
foreach($query_names as $names)
{
    
    $this->personname = $names->firstName;
    $this->render('index', array('personname'=>$this->personname));
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