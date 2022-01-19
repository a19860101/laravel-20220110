<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .gallery {
            display: none;
            box-sizing: border-box;
        }
        .gallery-overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,.8);
            top: 0;
            left: 0;
        }
        .gallery-container {
            background-color: #fff;
            padding: 50px;
            position: absolute;
            top: 5%;
            width: 80%;
            /* height: 80vh; */
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
        }
        .gallery img {
            width: 150px;
            vertical-align: top;
        }
        .gallery label {
            /* padding: 15px; */
            margin-right: 10px;
            display: inline-block;
        }
        .gallery input[type="radio"] {
            display: none;
        }
        .gallery input[type="radio"]:checked+label {
            border: 3px solid rgb(45, 154, 255);
        }
    </style>
</head>
<body>
    <?php
        $a = 10;
    ?>
    <h1>圖片管理器</h1>
    <form action="" method="post">
        <input type="text" value='{{$a}}'>
        @if(isset($_GET['cover']))
            <img src="{{$_GET["cover"]}}" width="200">
            <a href="#" class="selectImg">切換圖片</a>
            <input type="hidden" name="cover" value="{{Str::substr($_GET['cover'],7)}}">
            <br>
        @else
            <a href="#" class="selectImg">選擇圖片</a>
        @endif

    </form>
    {{-- Gallery視窗 --}}
    <div class="gallery">
        <div class="gallery-overlay"></div>
        <div class="gallery-container">
            <div class="gallery-header">
                <form action="" method="post">
                    @csrf
                    <input type="file" name="imgs">
                    <input type="submit" value="上傳">
                </form>
            </div>
            <hr>
            <div class="gallery-body"></div>
            <hr>
            <div class="gallery-footer">
                <a href="#" class="selected">送出</a>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('.selectImg').click(function(){
                $.ajax({
                    url: 'gallery',
                    success(datas){
                        // console.log(datas);
                        $('.gallery-body').empty();
                        datas.forEach(data => {
                            console.log(data);
                            let img = `
                                <input type="radio" name="cover" class="cover" value="${data}" id="${data}">
                                <label for="${data}">
                                    <img src="${data}">
                                </label>
                            `
                            $('.gallery-body').append(img);
                        })
                        $('.gallery').fadeIn();
                    }
                })
            })
            $('.selected').click(function(){
                $.ajax({
                    url: 'test',
                    type:'get',
                    data:{
                        cover: $('.cover:checked').val()
                    },
                    success(){
                        $('.gallery').hide();
                        location.href = this.url;
                        console.log(this.url);

                    }
                })
            })
        })
    </script>
</body>
</html>
