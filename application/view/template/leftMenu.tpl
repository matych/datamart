<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li {%if pageUrl.1 == 'menu'%}class="active"{%endif%}>
            <a href="{{server}}{{lang}}/menu/">{{'lbl_menu'|trans}}</a>
        </li>
        <li {%if pageUrl.1 == 'submenu'%}class="active"{%endif%}>
            <a href="{{server}}{{lang}}/submenu/">{{'lbl_submenu'|trans}}</a>
        </li>
    </ul>
    <ul class="nav nav-sidebar">
        <li {%if pageUrl.1 == 'homepage'%}class="active"{%endif%}>
            <a href="{{server}}{{lang}}/homepage/">{{'lbl_homepage'|trans}}</a>
        </li>
        <li {%if pageUrl.1 == 'pages'%}class="active"{%endif%}>
            <a href="{{server}}{{lang}}/pages/">{{'lbl_pages'|trans}}</a>
        </li>
        <li {%if pageUrl.1 == 'news'%}class="active"{%endif%}>
            <a href="{{server}}{{lang}}/news/">{{'lbl_news'|trans}}</a>
        </li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="">{{'lbl_users'|trans}}</a></li>
    </ul>
</div>