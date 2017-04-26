var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var exec = require('child_process').exec;
var fs = require('fs');

server.listen(6001);

// when user connects to browser
io.on('connection', function (socket) {
  socket.emit('news', { hello: 'world' });
  socket.on('discordToggle', function (discordToggle) {
    if (discordToggle == 1){
      var cmd = 'pm2 start bot.js'
    }else {
      var cmd = 'pm2 stop bot.js'
    }
    exec(cmd, function(error, stdout, stderr) {
      console.log('exec was ran');
    });
  });

  // when 'save:discord-keys' broadcast message is recieved
  socket.on('save:discord-keys', function (data) {
    var discordJSON = {client:data.clientID,token:data.token}
    fs.writeFile(__dirname+"/discord.json", JSON.stringify(discordJSON, null, 4), function(err) {
    if(err) return console.log(err);
    socket.emit("success:discord-keys")
});
  })
});

// when the socket server starts
server.on('listening', function() {
  console.log(`
----------------------------------------
               A P P . J S
----------------------------------------`
  );
});
