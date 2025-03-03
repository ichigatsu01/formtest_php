<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>特別ディナーショーご予約受付ページ</h1>
    <form action="form.php" method="post">
        <table>
        <tr>
                <td bgcolor="#dcf0f0">名前：</td>
                <td><input type="text" name="user_input[]" size="30" maxlength="30" value="テスト太郎"></td>
            </tr>
            <tr>
                <td bgcolor="#dcf0f0">電話番号：</td>
                <td><input type="text" name="user_input[]" size="30" maxlength="30" value="000-111-2222"></td>
            </tr>
            <tr>
                <td bgcolor="#dcf0f0">予約日時：</td>
                <td>
                    <select name="monthDay">
                        <option value="12/24">12/24</option>
                        <option value="12/25" selected>12/25</option>
                    </select>
                    <select name="time">
                        <option value="18:00~" selected>18:00~</option>
                        <option value="20:00~">20:00~</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td bgcolor="#dcf0f0">席のご希望：</td>
                <td>
                    <input type="radio" name="seki" value="禁煙席">禁煙席
                    <input type="radio" name="seki" value="喫煙席" checked>喫煙席
                </td>
            </tr>
            <tr>
                <td bgcolor="#dcf0f0">当店をお知りになった<br>きっかけ：（複数回答可）</td>
                <td>
                    <input type="checkbox" name="toten[]" value="当店のwebサイト">当店のwebサイト
                    <input type="checkbox" name="toten[]" value="検索サイト" checked>検索サイト
                    <input type="checkbox" name="toten[]" value="雑誌">雑誌<br>
                    <input type="checkbox" name="toten[]" value="知人からの紹介" checked>知人からの紹介
                    <input type="checkbox" name="toten[]" value="その他">その他
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="予約する">
                    <input type="reset" value="入力しなおす">
                </td>
            </tr>
        </table>
    </form>
    <?php
        if (isset( $_POST['user_input'])) {
            $name = htmlspecialchars($_POST['user_input'][0], ENT_QUOTES, 'UTF-8');
            $tel = htmlspecialchars($_POST['user_input'][1], ENT_QUOTES, 'UTF-8');
            echo '<br><h2>以下の内容で予約を行います。よろしいですか？</h2>';
            echo '<p>名前：'.$name.'</p>';
            echo '<p>電話番号：'.$tel.'</p>';
        };

        if (isset( $_POST['monthDay'])) {
            $monthDay = htmlspecialchars($_POST['monthDay'], ENT_QUOTES) ;
            echo '<p>日時：'.$monthDay.'</p>';
        };
        
        if (isset( $_POST['time'])) {
            $time = htmlspecialchars($_POST['time'], ENT_QUOTES) ;
            echo '<p>時間：'.$time.'</p>';
        };
        
        if (isset( $_POST['seki'])) {
            $seki = htmlspecialchars($_POST['seki'], ENT_QUOTES) ;
            echo '<p>座席：'.$seki.'</p>';
        };
        if (isset( $_POST['toten'])) {
            // $toten = array($_POST['toten']);
            $toten = array_map(fn($n) => htmlspecialchars($n, ENT_QUOTES, 'UTF-8'), $_POST['toten']);
            // echo '<pre>';
            // print_r($toten);
            // echo '</pre>';
            echo '<p>当店を知ったきっかけ：</p>';
            echo '<ul>';
            foreach ($toten as $item) {
                echo '<li>'. $item. '</li>';
                }
            echo '</ul>';
        };
    ?>
</body>
</html>