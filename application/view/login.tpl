{% extends '../application/view/template/page.tpl' %}
{% block headContent %}
<link rel="stylesheet" type="text/css" href="{{server}}css/signin.css">
{% endblock headContent %}
{% block content %}

<form class="form-signin" method="post" action="{{server}}{{lang}}/{{pageUrl.0}}/{{pageUrl.1}}/">
    <h2 class="form-signin-heading">{{'tit_login'|trans}}</h2>
    <label for="mail" class="sr-only">{{'lbl_mail'|trans}}</label>
    <input type="email" name="mail" class="form-control" placeholder="{{'lbl_mail'|trans}}" required autofocus>
    <label for="password" class="sr-only">{{'lbl_password'|trans}}</label>
    <input type="password" name="password" class="form-control" placeholder="{{'lbl_password'|trans}}" required>

    {*<div class="checkbox">*}
        {*<label>*}
            {*<input type="checkbox" value="remember-me"> Remember me*}
        {*</label>*}
    {*</div>*}
    <button class="btn btn-lg btn-primary btn-block" type="submit">{{'lbl_login'|trans}}</button>
</form>

{% endblock content %}
