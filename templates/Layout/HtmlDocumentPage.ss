<div class="document-page container-fluid">

    <div class="col-md-3">
        <h1>Contents</h1>
        <nav>
            <ul class="nav toc-sidenav">
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
                               onclick="printPage('$URLSegment');return false;"><img class="print-img"
                                                                                     alt="Print this section"
                                                                                     src="$ThemeDir/images/print.png"></a>
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
                                            <a href="#" class="back-to-top-button button"><img class="top-img"
                                                                                               alt="Back to the top of page"
                                                                                               src="$ThemeDir/images/back-to-top.png"></a>
                                            <a class="print-button button light-green"
                                               title="Click to print this sub-section"
                                               onclick="printPage('$URLSegment');return false;"><img class="print-img"
                                                                                                     alt="Print this subsection"
                                                                                                     src="$ThemeDir/images/print.png"></a>
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


</div>