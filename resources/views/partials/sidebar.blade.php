<!-- Fixed navbar -->
<div class="navigation-sidebar">
    <ul id = "sidebar" class="col-md-2">
        <li id="sidebar_header"><br/></li>
        @if (!isset($log_drug))<li><a href="#" class="btn_subpage sidebarlink" data-url="inventory/log-drug"> LOG A DRUG </a></li>@endif
        @if (!isset($create))<li><a href="#" class="btn_subpage sidebarlink" data-url="inventory/create"> LOG INVENTORY ITEM </a></li>@endif
        @if (!isset($log_broken))<li><a href="#" class="btn_subpage sidebarlink" data-url="inventory/broken"> LOG BROKEN/EXPIRED PILL </a></li>@endif
    <!--    <li><a href="#"> Support </a></li>-->
    </ul>
</div>
