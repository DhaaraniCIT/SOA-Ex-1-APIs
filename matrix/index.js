const express = require('express');
const bodyParser = require('body-parser');

const api = express();
api.use(express.static(__dirname));
api.use(bodyParser.json());

api.listen(3000, () => {
  console.log('API up and running!');
});

api.post('/matrixoperatioins', (req, res) => {
    console.log(req.body);
    set1 = req.body.set1;
    var transpose = new Array(3);
    //Transpose
    for(var i=0;i<3;i++){
        transpose[i] = [];
      }
    for(var i=0;i<3;i++){
        for(var j=0;j<3;j++){
            transpose[j][i] = set1[i][j];
        }
    }
    //Lower diagonal
    var i, j,k,l;
    var lowerleft = new Array(3);
    var lowerright = new Array(3);
    var clockrotate = new Array(3);
    var upperright = new Array(3);
    for(i=0,j=0;i<3,j<3;i++,j++){
        lowerleft[i] = [];
        lowerright[j] = [];
        clockrotate[i] = [];
        upperright[j] = [];
    }
    for(i=0;i<3;i++){
      for(j=0;j<3;j++){
        lowerright[i][j] = set1[i][j];
        // upperleft[i][j] = set1[i][j];
      }
    }
    for ( i = 0; i < 3; i++){
      for ( j = 0; j < 3; j++){
        if( i < j ){
          lowerleft[i][j] = 0
        }
        else{
          lowerleft[i][j] = set1[i][j];
        }
      }
    }
    
    for ( i = 0; i < 3; i++){
      for ( j = i; j < 3; j++){
        lowerright[i][j]=0;
      }
    }
   
   //Upper diagonal
    for ( i = 0; i < 3; i++){
      for ( j = 0; j < 3; j++){
        if( i > j ){
          upperright[i][j] = 0;
        }
         else{
          upperright[i][j] = set1[i][j];
         }
      }
         
   }

   //Rotate matrix
   for (j = 0,k=0; j < 3,k<3; j++,k++) 
    {
        for (i = 3 - 1,l=0; i >= 0,l<3; i--,l++)
        clockrotate[k][l] = set1[i][j]
    }
    res.send({transpose:transpose,lowertriangle:lowerleft,uppertriangle:upperright,rotatedmatrix:clockrotate});
});
