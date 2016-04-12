<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 12/04/16
 * Time: 4:41 PM
 */
class VocabularyTag extends DataObject implements PermissionProvider{

    private static $db = array(
        'Title' => 'Varchar(255)'
    );

    private static $belongs_many_many = array(
        'DocumentSections' 		=> 'DocumentSectionPage',
        'DocumentSubsections' 	=> 'DocumentSubsectionPage',
    );

    public function canEdit($member = null){
        return Permission::check("EDIT_VOCABULARYTERMS");
    }

    public function canView($member = null){
        return true;
    }

    public function canCreate($member = null){
        return Permission::check("EDIT_VOCABULARYTERMS");
    }

    public function canDelete($member = null){
        return Permission::check("EDIT_VOCABULARYTERMS");
    }

    public function providePermissions(){
        return array(
            "VIEW_VOCABULARYTERMS"    =>    array(
                "name"        =>    "View the Vocabulary Terms",
                "category"    =>    "DataObjects Specific"
            ),
            "EDIT_VOCABULARYTERMS"    =>    array(
                "name"        =>    "Create, edit and delete Vocabulary Terms",
                "category"    =>    "DataObjects Specific"
            )
        );
    }
}