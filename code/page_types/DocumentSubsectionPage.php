<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 12/04/16
 * Time: 4:21 PM
 */
Class DocumentSubsectionPage extends Page
{

    private static $db = array(
        'SubsectionNumber' => 'Varchar(255)',
        'GrandParentID' => 'Int',
        'GreatGrandParentID' => 'Int',
    );

    private static $has_one = array();

    private static $has_many = array();

    private static $many_many = array(
        'AddTags' => 'VocabularyTag'
    );

    private static $belongs_many_many = array();

    private static $many_many_extraFields = array();

    private static $casting = array();

    private static $default_sort = '';

    private static $field_labels = array();

    private static $summary_fields = array();

    private static $indexes = array();

    private static $required_fields = array(); //enforced through the "validate" method

    private static $searchable_fields = array();

    private static $default_child = "";

    private static $default_parent = "DocumentSectionPage";

    private static $can_be_root = false;

    private static $hide_ancestor = null;

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', $textfield = new TextField('SubsectionNumber', 'Subsection Number'), 'Content');


        return $fields;
    }

    public function subSectionTerms()
    {
        $terms = $this->Parent()->Parent()->GlossaryTerms();

        return $terms;
    }


    /**
     * function to add glossary terms to content
     */
    public function EvolvedContent()
    {
        $termsList = new ArrayList();
        $contents = $this->Content;

        $terms = $this->subSectionTerms();
        foreach($terms as $t){
            $termsList->push($t);
            if (preg_match("/$t->Title/i", "$contents")){
                $contents = str_replace("$t->Title", '<a href="javaScript:void(0);" class="tooltip" title="' .$t->Description .'">'.$t->Title.'</a>',"$contents");
            }else {
                continue;
            }
        }

        return $contents;

    }

    public function AddTagClass()
    {
        $returnString = "";
        $myTags = $this->AddTags();
        foreach ($myTags as $tag) {
            if (strtolower($tag->Title) == 'must') {
                $returnString .= " must-tag";
            } else if (strtolower($tag->Title) == 'should') {
                $returnString .= " should-tag";
            } else {
            }
        }
        if (!$returnString) {
            $returnString = ' no-tag ';
        }
        return $returnString;
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        $this->GrandParentID = $this->Parent()->Parent()->ID;
        $this->GreatGrandParentID = $this->Parent()->Parent()->Parent()->ID;
    }

}