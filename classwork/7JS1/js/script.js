// 1 block. declarations.
var answerToPrompt, output, checkVarType;
var carModel = 'Ford';
var carColor = 'blue';
var isCarNew = false;
var carProductionYear = 2011;

// 2 actions
answerToPrompt = prompt('What is Your car model?');
output = '<p style="color: ' + carColor + ';">' + answerToPrompt + '</p>';
carModel = 'Lamborgini';
carModel = 'ZAZ';
isCarNew = 1;
checkVarType = typeof (isCarNew);

// 3 output
console.log(checkVarType);
document.write(output);
