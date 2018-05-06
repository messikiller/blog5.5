<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>modal</title>
</head>
<body>

<div id="app"></div>

<script src="{{ mix('js/admin.js') }}"></script>
<script>
new Vue({
    el: '#app',
    mounted: function () {
        this.$Modal.{{ $modal['type'] }}({
            title: "{{ $modal['title'] }}",
            content: "{{ $modal['content'] }}",
            onOk: () => {
                @if (isset($modal['url']))
                    window.location.href = '{{ $modal['url'] }}';
                @else
                    window.location.href = document.referrer;
                @endif
            }
        })
    }
});
</script>
</body>
</html>
