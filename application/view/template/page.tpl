<!DOCTYPE html>
<html>
<head>
    {% include '../application/view/template/head.tpl' %}
    {% block headContent %}{% endblock %}
</head>
<body>
<script>var server = '{{server}}';</script>
{% include '../application/view/template/menu.tpl' %}
<div class="container-fluid body-container">
    {% block content %}{% endblock %}
</div>
<script type="text/javascript" src="{{server}}js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>