const express = require('express');
const bodyParser = require('body-parser');

const api = express();
api.use(express.static(__dirname));
api.use(bodyParser.json());

api.listen(3000, () => {
  console.log('API up and running!');
});

api.post('/setoperatioins', (req, res) => {
    console.log(req.body);
    var set1 = req.body.set1;
    var set2 = req.body.set2;
    var length1 = 0;
    var length2 = 0;
    var array = [];
    var arrset1 = [];
    var arrset2 = [];
    var len=0
    for(var i=0 ;set1[i]!==undefined;i++){
        
        if(set1[i] != ','){
            length1++;
            array[len++] =set1[i];
            arrset1[length1-1] = set1[i];
        } 
    }
    for(var i=0 ;set2[i]!==undefined;i++){
        
        if(set2[i] != ','){
            length2++;
            array[len++] =set2[i];
            arrset2[length2-1] = set2[i];
        }
    }
    var inter=[];
    var interlen=0;
    for(var i=0;i<len;i++){
        for(var j=i+1;j<len;j++){
            if(array[i] == array[j]){
                inter[interlen++] = array[i];
            }
        }
    }
    var minusA = [];
    var minusB = [];
    var minlen=0;
    for(var i=0;i<length1;i++){
        for(var j=0;j<length2;j++){
            if(arrset1[i] == arrset2[j]){
                arrset1[i] = 0;
                arrset2[j] = 0;
            }
        }
    }
    for(var i=0;i<length1;i++){
        if(arrset1[i]!=0){
            minusA[minlen++] = arrset1[i];
        }
    }
    minlen=0;
    for(var i=0;i<length2;i++){
        if(arrset2[i]!=0){
            minusB[minlen++] = arrset2[i];
        }
    }
    res.send('Union: '+array+'\nIntersection: '+inter+'\nMinus (A-B): '+minusA+'\nMinus (B-A): '+minusB);
});
