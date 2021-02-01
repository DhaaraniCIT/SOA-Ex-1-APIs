const express = require('express');
const bodyParser = require('body-parser');

const api = express();
api.use(express.static(__dirname));
api.use(bodyParser.json());

api.listen(3000, () => {
  console.log('API up and running!');
});

api.post('/convert-currency', (req, res) => {
    console.log(req.body);
        var number = req.body.figure
        var digit = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];  
        var elevenSeries = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];  
        var countingByTens = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];  
        var shortScale = ['', 'thousand', 'million', 'billion', 'trillion'];  
  
        number = number.toString(); 
        number = number.replace(/[\, ]/g, ''); 
        if (number != parseFloat(number)) 
        alert('not a number');
        var x = number.indexOf('.');
        if (x == -1) x = number.length; 
        if (x > 15) return 'too big'; 
        var n = number.split(''); 
        var str = ''; 
        var sk = 0; 
        for (var i = 0; i < x; i++) 
        { 
            if ((x - i) % 3 == 2) 
            { 
                if (n[i] == '1') 
                { 
                    str += elevenSeries[Number(n[i + 1])] + ' '; i++; 
                    sk = 1; 
                } 
                else if (n[i] != 0) 
                { 
                    str += countingByTens[n[i] - 2] + ' '; 
                    sk = 1; 
                } 
            } 
            else if (n[i] != 0) 
            { 
                str += digit[n[i]] + ' '; 
                if ((x - i) % 3 == 0) str += 'hundred '; 
                sk = 1; 
            } 
            if ((x - i) % 3 == 1) 
            { 
                if (sk) str += shortScale[(x - i - 1) / 3] + ' '; 
                sk = 0; 
            } 
        } 
        if (x != number.length) 
        { 
            var y = number.length; 
            str += 'point '; 
            for (var i = x + 1; i < y; i++) 
            str += digit[n[i]] + ' '; 
        } 
        str = str.replace(/\number+/g, ' ');   
        res.send(number+'='+str.trim() + ".");
});