<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 12/04/16
 * Time: 4:14 PM
 */
class GlossaryPage_Controller extends Page_Controller{

    private $sort_on = "Title";
    protected static $recordType = "GlossaryTerm";
    private $letter;

    private static $allowed_actions = array(
        'getAllRecords'
    );

    public function init(){
        parent::init();
        Requirements::css("html-doc-builder/css/html-doc-glossary.css");
//        $this->ResetHistory();
        $this->letter = (isset($_GET['letter'])) ? $_GET['letter'] : '';
    }

    public function getAllRecords() {
        if ($this->letter) {
            // $letter =  $_GET['letter'];
            $all = GlossaryTerm::get()
                ->where("\"Title\" LIKE '$this->letter%'");
        } else {
            $all = GlossaryTerm::get();
        }
        return $all;
    }

}