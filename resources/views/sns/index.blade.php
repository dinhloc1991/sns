<htmL>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>ホーム</h1>
        <div class="form">
            <input id="postBody" type="text" placeholder="いまどうしてる？">
            <button id="postBtn">つぶやく</button>
        </div>
        <div class="posts">
        </div>

    </div>
</body>

<script>
    $( document ).ready(function() {
        $("#postBtn").on("click", function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "post",
                url:'/sns/create',
                dataType: 'json',
                data: {
                    body: $("#postBody").val()
                }
            })
            .done((res)=>{
                console.log(res.message);
                location.reload();
            })
            .fail((error)=>{
                console.log(error)
            })
        })
    });
</script>
</html>