<!DOCTYPE html>
<html>

<head>
    <title>出品物登録</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <form id="upload_form" enctype="multipart/form-data">
        <label for="name">名前:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="item_name">出品物名:</label><br>
        <input type="text" id="item_name" name="item_name"><br>
        <label for="item_condition">出品物の状態:</label><br>
        <input type="text" id="item_condition" name="item_condition"><br>
        <label for="item_image">出品物の写真:</label><br>
        <div id="drop_zone">
            <input type="file" id="item_image" name="item_image">
        </div>
        <img id="preview" src="" alt="画像プレビュー" style="display: none;">
    </form>
    <button id="submit_button">Submit</button>
</body>

</html>