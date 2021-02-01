const express = require('express');
const bodyParser = require('body-parser');

const api = express();
api.use(express.static(__dirname));
api.use(bodyParser.json());

api.listen(3000, () => {
  console.log('API up and running!');
});

api.post('/add', (req, res) => {
	console.log(req.body);
	var diff = (new Date(req.body.item2).getTime() - new Date(req.body.item).getTime()) / 1000;
	var year = diff/(60 * 60 * 24);
	var month = diff/(60 * 60 * 24 * 7 * 4);
	var millisec =(new Date(req.body.item2).getTime() - new Date(req.body.item).getTime());
	var hours = millisec / (1000 * 3600);  
	var minutes = diff/60; 
	var sec = Math.floor(minutes * 60); 
	res.send('No.of Years:'+Math.abs(Math.round(year/365.25)) +'\nNo.of Months:'+Math.abs(Math.round(month))+'\nNo.of Days:'+Math.abs(Math.round(diff/(3600 * 24)))+'\nNo.of Hours:'+hours+'\nNo.of Minutes:'+minutes+'\nNo.of Seconds:'+sec);
});