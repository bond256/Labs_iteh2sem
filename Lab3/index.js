var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/', function(req, res) {
  res.sendFile(__dirname + '/indexx.html');
});

http.listen(3000, function() {
  console.log('listening on *:3000');
});

users=[];
connections=[];

io.sockets.on('connection', function(socket){
	console.log("connect"); 
	connections.push(socket);
	
	socket.on('disconnect', function(data){
		connections.splice(connections.indexOf(socket),1);
		console.log("disconnect"); 
	});
	socket.on('send', function(data){
		io.sockets.emit('add mess', {mess: data.mess, name: data.name});
	});
	
	
});