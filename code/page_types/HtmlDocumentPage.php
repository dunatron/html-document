<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 12/04/16
 * Time: 3:44 PM
 */
class HtmlDocumentPage extends Page
{

    private static $db = array(
        'DocumentTitle' => 'Text',
        'DocumentAuthor' => 'Varchar(255)',
        'AboutSection' => 'HTMLText',
        'ValidUntil' => 'Text',
        'ContactPhone' => 'Varchar(255)',
        'ContactEmail' => 'Varchar(255)',
        'ContactInformation' => 'HTMLText'
    );

    private static $has_one = array();

    private static $has_many = array();

    private static $many_many = array(
        'GlossaryTerms' => 'GlossaryTerm',
        'RelatedDocuments' => 'HtmlDocumentPage',
    );

    private static $belongs_many_many = array(
        'BelongsRelatedDocuments' => 'HtmlDocumentPage'
    );

    private static $many_many_extraFields = array();

    private static $casting = array();

    private static $default_sort = '';

    private static $field_labels = array();

    private static $summary_fields = array();

    private static $indexes = array();

    private static $required_fields = array(); //enforced through the "validate" method

    private static $searchable_fields = array();

    private static $allowed_children = array("DocumentSectionPage");

    private static $default_child = "DocumentSectionPage";

    private static $default_parent = null;

    private static $can_be_root = true;

    private static $hide_ancestor = null;

    /**
     * Add DataBase fields to the CMS
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        // Document Title Section
        $fields->addFieldToTab('Root.Main', new TextField('DocumentTitle', 'Title of the Document'), 'Content');
        // Document Author Section
        $fields->addFieldToTab('Root.Main', new TextField('DocumentAuthor', 'Author of the Document'), 'Content');
        //About Section
        $fields->addFieldToTab('Root.Main', new HTMLEditorField('AboutSection', 'Document Overview'), 'Content');
        //Contact Information
        $fields->addFieldToTab('Root.Main', new HTMLEditorField('ContactInformation', 'Contact Information (Site default if empty)'), 'Content');
        //Valid Until
        $datefield = TextField::create('ValidUntil', 'Validity Statement (Site default if empty)');
        $fields->addFieldToTab('Root.Main', $datefield, 'Content');

        //Glossary Terms
        $glossaryTerms = new GridField(
            'GlossaryTerms',
            'Glossary Terms',
            $this->GlossaryTerms(),
            GridFieldConfig_RelationEditor::create()
        );
        $fields->addFieldToTab('Root.GlossaryTerms', $glossaryTerms);

        //Related Requirement Pages
        $relatedDocuments = new GridField(
            'RelatedDocuments',
            'Related Documents',
            $this->RelatedDocuments(),
            GridFieldConfig_RelationEditor::create()
        );
        $fields->addFieldToTab('Root.RelatedDocuments', $relatedDocuments);


        //Contact Details
        $fields->addFieldToTab('Root.Main', new TextField('ContactPhone', 'Contact Phone Number (Site default if empty)'), 'Content');
        $fields->addFieldToTab('Root.Main', new TextField('ContactEmail', 'Contact Email Address (Site default if empty)'), 'Content');


        $fields->removeFieldFromTab("Root.Main", "Content");

        // Return the fields
        return $fields;
    }

}




