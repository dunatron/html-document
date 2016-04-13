<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 12/04/16
 * Time: 3:53 PM
 */
class GlossaryTerm extends DataObject implements PermissionProvider{

    private static $db = array(
        'Title' 		=> 'Varchar(255)',
        'Description' 	=> 'Varchar(255)'
    );

    private static $has_one = array();

    private static $belongs_many_many = array(
        'HtmlDocumentPages' => 'HtmlDocumentPage',
    );

    public static $default_sort = 'Title ASC';

    public function getFirstLetter(){
        return strtolower(substr($this->Title, 0, 1));
    }

    public function canEdit($member = null){
        return Permission::check("EDIT_GLOSSARYTERMS");
    }

    public function canView($member = null){
        return true;
    }

    public function canCreate($member = null){
        return Permission::check("EDIT_GLOSSARYTERMS");
    }

    public function canDelete($member = null){
        return Permission::check("EDIT_GLOSSARYTERMS");
    }

    public function providePermissions(){
        return array(
            "VIEW_GLOSSARYTERMS"    =>    array(
                "name"        =>    "View the Glossary Terms",
                "category"    =>    "DataObjects Specific"
            ),
            "EDIT_GLOSSARYTERMS"    =>    array(
                "name"        =>    "Create, edit and delete Vocabulary Terms",
                "category"    =>    "DataObjects Specific"
            )
        );
    }
}