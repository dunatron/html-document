<div class="document-page container-fluid">

    <div class="col-md-3">
        <h1>Contents</h1>
        <div class="doc-left-panel">
            <nav id="doc-sidebar">
                <ul class="nav sticky-sidebar">
                    <% if $Children %>
                        <% loop $Children %>
                            <li>
                                <a class="$AddTagClass <% if $Last %><% if not $Children %>last-child<% end_if %><% end_if %>"
                                   href="#{$URLSegment}"> $SectionNumber $Title</a>
                                <% if $Children %>
                                    <ul class="nav">
                                        <% loop $Children %>
                                            <% if $ClassName = 'DocumentSubsectionPage' %>
                                                <li>
                                                    <a class="$AddTagClass <% if $Up.Last %><% if $Last %>last-child<% end_if %><% end_if %>"
                                                       href="#{$URLSegment}">$SubsectionNumber $Title</a></li>
                                            <% end_if %>
                                        <% end_loop %>
                                    </ul>
                                <% end_if %>
                            </li>
                        <% end_loop %>
                    <% end_if %>
                </ul>
            </nav>
        </div>

    </div>

    <div class="col-md-9">
        <h1>Body</h1>

        <div class="requirement-information-section">
            <% loop $Children %>
                <div id="$URLSegment" class="section-content <% if $Pos = 1 %>$AddTagClass introduction<% end_if %>">
                    <h2 class=" $AddTagClass<% if $Children %><% loop $Children %>$AddTagClass <% if $Children %><% loop $Children %>$AddTagClass<% end_loop %><% end_if %><% end_loop %><% end_if %> section-title">$SectionNumber $Title</h2>
                    <% if $Content %>
                        <div class="$AddTagClass">
                            $Content
                        </div>
                    <% end_if %>
                    <div class="$AddTagClass row p-and-b">
                        <div class="pull-right">
                            <a class="print-button button light-green" title="Click to print this section"
                               onclick="printPage('$URLSegment');return false;"><i class="fa fa-print" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <% if $Children %>
                        <% loop $Children %>
                            <% if $ClassName = 'DocumentSubsectionPage' %>
                                <div id="$URLSegment" class="$AddTagClass subsection-content">
                                    <h3 class=" $AddTagClass subsection-title">$SubsectionNumber $Title</h3>

                                    <div class="$AddTagClass">
                                        $Content
                                    </div>
                                    <div class="$AddTagClass row p-and-b">
                                        <div class="pull-right">
                                            <a href="#" class="back-to-top-button button"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                                            <a class="print-button button light-green"
                                               title="Click to print this sub-section"
                                               onclick="printPage('$URLSegment');return false;"><i class="fa fa-print" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <% end_if %>
                        <% end_loop %>
                    <% end_if %>
                </div>
            <% end_loop %>
        </div>
    </div>

    <%-- Glossary Terms Section --%>
    <div class="col-md-3">

    </div>

    <div class="col-md-9">
        <div class="tag-section">

            <% if GlossaryTerms %>
                <h3 class="subsection-content">This content refers to the following glossary terms:</h3>
                <% loop GlossaryTerms %>
                    <a href="{$BaseHref}Glossary?letter={$FirstLetter}#{$Title}" class="button grey">
                        $Title
                    </a>
                <% end_loop %>
            <% end_if %>

            <% if VocabularyTags %>
                <h3 class="subsection-content">Tagged with the terms:</h3>
                <% loop VocabularyTags %>
                    <a href="{$BaseHref}siteSearch?Keyword=$Title&clicked=true" class="button grey">
                        $Title
                    </a>
                <% end_loop %>
            <% end_if %>
        </div>
    </div>

</div>