@extends('layout')

@section('title', 'Document')


@section('main')
<br>
<br>
<div id="doc" contenteditable="true">
  This text can be edited by the user.
</div>

<script>
let connection = new WebSocket('ws://oero-nodelab5.herokuapp.com');
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
  // console.log('received message', event.data);
  
  document.getElementById('doc').innerHTML = event.data;
  var el = document.getElementById('doc'); 
  setEndOfContenteditable(el);

  // let li = document.createElement('li');
  // li.innerText = event.data;
  // document.querySelector('ul').append(li);
};


document.getElementById('doc').addEventListener('input', (event) => {
  event.preventDefault();
  
  let message = document.getElementById('doc').innerHTML;
  connection.send(message);
  // document.querySelector('textarea').value="";
});



function setEndOfContenteditable(contentEditableElement)
{
    var range,selection;
    if(document.createRange)//Firefox, Chrome, Opera, Safari, IE 9+
    {
        range = document.createRange();//Create a range (a range is a like the selection but invisible)
        range.selectNodeContents(contentEditableElement);//Select the entire contents of the element with the range
        range.collapse(false);//collapse the range to the end point. false means collapse to end rather than the start
        selection = window.getSelection();//get the selection object (allows you to change selection)
        selection.removeAllRanges();//remove any selections already made
        selection.addRange(range);//make the range you have just created the visible selection
    }
    else if(document.selection)//IE 8 and lower
    { 
        range = document.body.createTextRange();//Create a range (a range is a like the selection but invisible)
        range.moveToElementText(contentEditableElement);//Select the entire contents of the element with the range
        range.collapse(false);//collapse the range to the end point. false means collapse to end rather than the start
        range.select();//Select the range (make it the visible selection
    }
}





</script>
@endsection