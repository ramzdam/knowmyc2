<!-- Fixed navbar -->
<div class="navigation-sidebar navigation">
    <ul id = "sidebar" class="col-md-2">
        <li @if (isset($create)) class='active' @endif><a href="#" class="btn_subpage sidebarlink" data-url="inventory/create"><i class="glyphicon glyphicon-list-alt"> </i> LOG INVENTORY ITEM </a></li>
        <li @if (isset($log_drug)) class='active' @endif><a href="#" class="btn_subpage sidebarlink " data-url="inventory/log-drug"><i class="glyphicon glyphicon-level-up"> </i> LOG A DRUG    </a></li>
        <li @if (isset($log_broken)) class='active' @endif><a href="#" class="btn_subpage sidebarlink" data-url="inventory/broken"><i class="glyphicon glyphicon-wrench"> </i> LOG BROKEN/EXPIRED PILL </a></li>
    <!--    <li><a href="#"> Support </a></li>-->
    </ul>
</div>
