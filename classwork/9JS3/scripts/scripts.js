var successfullyInserted = false;

function getInputValueFromElementById(idName) {
	var inputObject = document.getElementById(idName);
	var inputValue = inputObject.value;
	return inputValue;
}

function validateInputValue(inputValue) {
	inputValue = Number(inputValue);
	if (isNaN(inputValue)) {
		alert('Don\'t cheat! Please insert number.');
	}
}

function sumUpTwoNumbers(firstNumber, secondNumber = 0) {
	var result = Number(firstNumber) + Number(secondNumber);
	return result;
}

function writeTextToElementById(textToInsert = '', idName) {
	// var textToInsert = sumUpTwoNumbers(29, 2);
	document.getElementById(idName).innerHTML = textToInsert;
	successfullyInserted = true;
}

function writeTextToConsole(textToConsole = 'Failed to write to console') {
	console.log(textToConsole);
}

/* function mainFlow() {
	1. gauti skaiciu reiksmes (tas reiksmes sudeti i du kintamuosius), kuriuos reikes sudeti
	2. sudeti tuos skaicius
	3. irasyti tuos skaicius i main-content
	4. i console irasyti sekmes pranesima.
} */

function mainFlow() {
	var firstInputValue = getInputValueFromElementById('first-number');
	var secondInputValue = getInputValueFromElementById('second-number');

	// iskviesti funkcija, kuri patikrins ar gauti input value yra TIK skaitines reiksmes. Jeigu nera skaiciai ismesti alert ir nustoti vykdyti tolimesni koda.
	validateInputValue(firstInputValue);

	// TODO: create function which transforms number from . to ,

	var sumUpResult = sumUpTwoNumbers(firstInputValue, secondInputValue);

	if (firstInputValue !== '') {
		writeTextToElementById(sumUpResult, 'sum-up-result');
	} else {
		successfullyInserted = false;
	}

	if (successfullyInserted) {
		writeTextToConsole('Our result saved succesfully.');
	} else {
		writeTextToConsole();
	}

}
