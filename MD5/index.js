const express = require('express');
const bodyParser = require('body-parser');
const crypto = require('crypto')


const api = express();
api.use(express.static(__dirname));
api.use(bodyParser.json());

api.listen(3000, () => {
  console.log('API up and running!');
});

api.post('/md5', (req, res) => {
    console.log(req.body);
    let hash = crypto.createHash('md5').update(req.body.set1).digest("hex")
  res.send(hash);
  

});