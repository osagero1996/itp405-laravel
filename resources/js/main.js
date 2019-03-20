let connection = new WebSocket('ws://localhost:8080');
// let connection = new WebSocket('ws://oero-websocket-demo.herokuapp.com');

// 
connection.onopen = () => {
  console.log('connected from the frontend');
  
  // connection.send('hello');
};

connection.onerror = () => {
  console.log('failed to connect from the frontend');
};

connection.onmessage = (event) => {
  console.log('received message', event.data);
  
  document.querySelector('div').innerHTML = event.data;
  // let li = document.createElement('li');
  // li.innerText = event.data;
  // document.querySelector('ul').append(li);
};


document.querySelector('div').addEventListener('input', (event) => {
  event.preventDefault();
  
  let message = document.querySelector('div').innerHTML;
  connection.send(message);
  // document.querySelector('textarea').value="";
});