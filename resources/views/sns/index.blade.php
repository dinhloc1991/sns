<htmL>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-color: #f2f4f2;
        }
        .container {
            width: 500px;
            margin: auto;
        }
    
        #postBody {
            width: 100%
        }

        #postBtn {
            /* float: right; */
            margin-top: 5px;
        }
        .part1, .part2 {
            background-color: white;
            padding: 10px;
        }

        .part2 {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="part1">
            <ul class="list-group">
                <li class="list-group-item"> 
                    <div>
                        ホーム
                        <a style="float:right;" href="/logout">ログアウト</a>
                    </div>
                </li>
                <li class="list-group-item"> 
                    <div class="form">
                        <div>
                            <input id="postBody" type="text" placeholder="いまどうしてる？">
                        </div>
                        <div style="float:right;">
                            <button id="postBtn" class="btn btn-light">つぶやく</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        
        <div class="part2">
            <ul class="list-group">
                @foreach ($posts as $post)
                <li class="list-group-item">
                    <table style="width:100%">
                    <tr>
                        <td style="font-weight:bold;"> {{ $post->name }} </td>
                        <td style="text-align: right"> {{ $post->created_at }} </td>
                    </tr>
                    </table>
                    <table style="width:100%; margin-top: 10px">
                    <tr>
                        <td style="width:90%; overflow-wrap: anywhere;"> {{ $post->body }} </td>
                        <td style="text-align: right;"> 
                        @if( Auth::user()->id == $post->user_id)
                            <span onclick="deletePost({{ $post->id }} )" style="color:red;cursor: pointer;">削除</a>
                        @endif
                        </td>
                    </tr>
                    </table>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

<script>
    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $("#postBtn").on("click", function() {
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
        });


    });

    function deletePost(postId) {
        $.ajax({
            type: "post",
            url:'/sns/delete',
            dataType: 'json',
            data: {
                id: postId
            }
        })
        .done((res)=>{
            location.reload();
        })
    }
</script>
</html>