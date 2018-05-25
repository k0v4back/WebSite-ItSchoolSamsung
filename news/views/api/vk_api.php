
<form action="#" method="POST">
 <p>
            <label>id</label>
            <input type="text"  name="id" placeholder="Введите ваше id из vk" required />
        </p>
        <p>
            <label>Текст сообщения:</label><br>
            <textarea name="message" cols="40" rows="6" required ></textarea>
        </p>
        <p>
            <button class="submit" type="submit" name="submit">Отправить сообщение</button>
        </p>
</form>


<?php

if(isset($_POST['submit'])){
    $id1 = $_POST['id'];
    $message1 = $_POST['message'];

    function send($id , $message)
    {
        $url = 'https://api.vk.com/method/messages.send?';
        // $id = 'vadim19123';
        // $message = 'Hello!';
        $params = array(
            //'user_id' => $id,    // Кому отправляем
            'domain' => $id,    
            'message' => $message,   // Что отправляем
            'access_token' => '23cf7ee3ae8b72dbd2fd9827a2c441a71682070f7fc3d74c477798211db744e42f2be61d16bf4625d50cf',  // access_token можно вбить хардкодом, если работа будет идти из под одного юзера
            'v' => '5.69',
        );

        // В $result вернется id отправленного сообщения
        $result = file_get_contents($url, false, stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($params)
            )
        )));
        echo "$result";
    }send("$id1","$message1");
}