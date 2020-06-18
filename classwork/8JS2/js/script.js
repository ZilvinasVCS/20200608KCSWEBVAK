/* 1. sukurti kintamaji auksto ivedimui. 2. kintamajui priskirti prompt 3. gauta rezultata/prompt reiksme ivesti i jam skirta paragrafa */

var floorNumberFromPrompt, counter;
var maxFloorToLive = 100;
var namePromptValue = '';
var isNameTest = false;
var disallowWord = 'test';

//floorNumberFromPrompt = prompt('In which floor You live?');

/* jeigu ivestas aukstas yra maziau nei nulis ir daugiau nei simtas vel ismesti jam prompt (kol ives skaiciu tinkama) */
while (floorNumberFromPrompt < 0 || floorNumberFromPrompt > 100) {

	floorNumberFromPrompt = prompt('In which floor You live?');

	if (Number.isInteger(floorNumberFromPrompt)) {
		console.log('Prompt value >> ' + floorNumberFromPrompt);
		document.getElementsByClassName('in-which-floor-user-live')[0].innerHTML = floorNumberFromPrompt;
		break;
	}
}

// TEMP
counter = 0; // 0
counter++; // 1
counter = counter + 1; //2
counter--; //1
--counter;

for (counter = 10; counter > 0; counter--) {
	console.log(counter);

	(counter === 8) ? console.log('last') : '' ; // ternary
}

/* sukurti nauja prompta. prasyti ivesti varda. Jeigu vardas ivestas trumpesnis nei 4 simboliai ismest alert('ivesk pilna varda'); jeigu zmogus ivede varta 'test' ismesti alert('ivesk savo varda'); */

namePromptValue = prompt('Please enter Your name');


if (/*namePromptValue != 'null' &&*/ namePromptValue.length < 4) {
	alert('ivesk pilna varda');
}

indexOfNameText = namePromptValue.indexOf(disallowWord);
(indexOfNameText > -1) ? isNameTest = true : '';

if (isNameTest) {
	alert('ivesk savo varda');
}

document.getElementById('short-description').innerHTML = '<u>Just some text inserted with javascript</u>';
