<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 12/04/16
 * Time: 4:20 PM
 */
class DocumentSectionPage extends Page
{

    private static $db = array(
        'SectionNumber' => 'Varchar(255)',
        'GrandParentID' => 'Int',
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

    private static $allowed_children = array("DocumentSubsectionPage");

    private static $default_child = "DocumentSubsectionPage";

    private static $default_parent = "HtmlDocumentPage";

    private static $can_be_root = false;

    private static $hide_ancestor = null;

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', $textfield = new TextField('SectionNumber', 'Section Number'), 'Content');

        $vocabTags = new GridField(
            'AddTags',
            'Add Tags',
            $this->AddTags(),
            GridFieldConfig_RelationEditor::create()
        );
        $fields->addFieldToTab('Root.AddTags', $vocabTags);

        return $fields;
    }

    /**
     * Get Document Glossary Terms for Section
     */
    public function SectionTerms()
    {
        $terms = $this->Parent()->GlossaryTerms();

        return $terms;
    }

    /**
     * function to add glossary terms to content
     */
    public function EvolvedContent()
    {
        $termsList = new ArrayList();
        $contents = $this->Content;

        $terms = $this->SectionTerms();
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
    }

}
