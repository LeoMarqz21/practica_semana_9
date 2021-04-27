import {SendData} from './clases.js';

const form = document.getElementById('form');

form.addEventListener('submit', (event)=>{
    event.preventDefault();

    const send = new SendData();

    const res = send.validate();
    send.send(res);
    send.clean();

});


