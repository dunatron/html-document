<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 12/04/16
 * Time: 3:45 PM
 */
class HtmlDocumentPage_Controller extends Page_Controller
{

    private static $allowed_actions = array(
        'VocabularyTags',
        'SomeMethod',
        'Export'
    );

    public function init()
    {
        parent::init();
        Requirements::css("html-doc-builder/css/html-doc-base.css");
        Requirements::css(" https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css");


        Requirements::javascript("http://code.jquery.com/jquery-1.9.0.js");
//        Requirements::css("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");
        Requirements::javascript("html-doc-builder/js/print.js");
        Requirements::javascript("html-doc-builder/js/affix-sidebar.js");
        //ToDo I didn't really understand what was going on here
        //ToDo Also need to get css added in here for default templates
        //ToDo Then it can be overwritten? find a way to easily not use our template
    }

    /*
     * Get all Vocabulary Tags from all children and all children-of-children. Order them by their occurrence, then
     * remove the duplicates.
     *
     * @params nil
     * @return ArrayList The sorted Vocabulary Tags.
     */
    public function VocabularyTags()
    {
        $vocabTags = new ArrayList();
        $vocabTitles = array();
        $cPages = $this->Children();
        foreach ($cPages as $page) {
            $gcPages = $page->Children();
            $cTags = $page->AddTags();
            foreach ($cTags as $key) {
                $vocabTags->push($key);
                $vocabTitles[] = $key->Title;
            }
            foreach ($gcPages as $gcPage) {
                if ($gcPage->ClassName == 'DocumentSubsectionPage') {
                    $gcTags = $gcPage->AddTags();
                    foreach ($gcTags as $gcKey) {
                        $vocabTags->push($gcKey);
                        $vocabTitles[] = $gcKey->Title;
                    }
                }
            }
        }
        $countKeys = array_count_values($vocabTitles);
        arsort($countKeys);
        $new = array_unique($vocabTitles);
        $finalArray = new Arraylist();;
        foreach ($countKeys as $key => $value) {
            if ($key != 'Must' && $key != 'Should') {
                $arrayData = new ArrayData(array(
                        'Title' => $key,
                        'Weight' => $value
                    )
                );
                $finalArray->add($arrayData);
            }
        }
        return $finalArray;
    }


    public function VocabularyTagID($title)
    {
        $tag = VocabularyTag::get()
            ->filter(array(
                    'Title' => $title)
            )->First();
        return $tag->ID;
    }

    public function Export()
    {
        return $this->renderWith('DocumentRTFTemplate', 'Page');
    }
}