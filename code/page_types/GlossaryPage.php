<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 12/04/16
 * Time: 4:13 PM
 */
class GlossaryPage extends SiteTree{
    private static $db = array();

    private static $default_URLSegment = 'obey';

    private static $has_one = array();

    private static $has_many = array();

    private static $many_many = array();

    private static $belongs_many_many = array();

    private static $many_many_extraFields = array();

    private static $casting = array();

    private static $default_sort = '';

    private static $field_labels = array();

    private static $summary_fields = array();

    private static $indexes = array();

    private static $required_fields = array(); //enforced through the "validate" method

    private static $searchable_fields = array();

    private static $allowed_children = "none";

    private static $default_child = "";

//    private static $default_parent = "HomePage";

    private static $can_be_root =true;

    private static $hide_ancestor = null;
}