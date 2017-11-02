<html lang="ja">
<head>
   <meta charset="utf-8">
   <title>chatdemo</title>
   <link href="/css/app.css" rel="stylesheet">
</head>
    <body>
    <div class="app">
        <h1>Chatroom</h1>
          <p>{{ $user->name }}</p>
            <span class="badge pull-right">@{{ usersInRoom.length }}</span>
                <chat-log :messages="messages"></chat-log>
                <chat-composer v-on:messagesent="addMessage"></chat-composer>
    </div>
      <script src="/js/app.js"></script>
    </body>
</html>