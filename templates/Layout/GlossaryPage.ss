<div id="$Title" class="glossary-page container">
    <div class="breadcrumbs">
        <h3>
            <% loop LatestPages.Reverse %>
                <a class ="breadcrumb-link" href="$Link"><span>$Title <span class="breadcrumb-arrow"><img src="themes/psr/images/arrow-bookmark.png" /></span></span></a>
            <% end_loop %>
        </h3>
        <h1>$Title</h1>
    </div>
    <ul class="alphanumeric-list row">
        <li class="alphabet-list"><a href="glossary/?letter=a" class="paginated-list">a</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=b" class="paginated-list">b</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=c" class="paginated-list">c</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=d" class="paginated-list">d</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=e" class="paginated-list">e</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=f" class="paginated-list">f</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=g" class="paginated-list">g</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=h" class="paginated-list">h</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=i" class="paginated-list">i</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=j" class="paginated-list">j</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=k" class="paginated-list">k</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=l" class="paginated-list">l</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=m" class="paginated-list">m</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=n" class="paginated-list">n</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=o" class="paginated-list">o</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=p" class="paginated-list">p</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=q" class="paginated-list">q</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=r" class="paginated-list">r</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=s" class="paginated-list">s</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=t" class="paginated-list">t</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=u" class="paginated-list">u</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=v" class="paginated-list">v</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=w" class="paginated-list">w</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=x" class="paginated-list">x</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=y" class="paginated-list">y</a></li>
        <li class="alphabet-list"><a href="glossary/?letter=z" class="paginated-list">z</a></li>
    </ul>
    <div id="glossary-terms" class="col-xs-12">
        <% if AllRecords %>
            <ul>
                <% loop AllRecords %>
                    <li>
                        <h2 id="$Title">$Title</h2>
                        $Description
                    </li>
                <% end_loop %>
            </ul>
        <% end_if %>
    </div>
</div>
