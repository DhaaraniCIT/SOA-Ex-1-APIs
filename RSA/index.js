const express = require('express');
const bodyParser = require('body-parser');

const api = express();
api.use(express.static(__dirname));
api.use(bodyParser.json());

api.listen(3000, () => {
  console.log('API up and running!');
});

api.post('/otp', (req, res) => {
    console.log(req.body);
    var len = req.body.set1;
    var digits = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'; 
    let OTP = ''; 
    for (let i = 0; i < len; i++ ) { 
        OTP += digits[Math.floor(Math.random() * digits.length)]; 
    }
    console.log("otp",OTP); 
    res.send(OTP); 
});