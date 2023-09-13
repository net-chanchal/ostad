"use strict";

const element = (selector) => {
    return document.querySelector(selector);
}

const replaceCharacter = (character) => {
    if (character === '-') {
        return '&#8722;';
    }
    else if (character === '+') {
        return '&#43;';
    }
    else if (character === '*') {
        return '&#215;';
    }
    else if (character === '/') {
        return '&#247;';
    }
    else if (character === '%') {
        return '&#37;';
    }
    else {
        return character;
    }
}

const displayInput = (character) => {
    element('#input-math-expression').value += character;
    element('.input').innerHTML += replaceCharacter(character);
}

const allClear = () => {
    element('#input-math-expression').value = '';
    element('.input').innerHTML = '';
    element('.output').innerHTML = '';
}

const clearEntry = () => {
    const input_math_expression = element('#input-math-expression').value.slice(0, -1);
    const input = element('.input').innerHTML.slice(0, -1);

    element('#input-math-expression').value = input_math_expression;
    element('.input').innerHTML = input;
    element('.output').innerHTML = '';
}

const calculation = () => {
    const input_math_expression = element('#input-math-expression').value;

    try {
        element('.output').innerHTML = eval(input_math_expression);
    }
    catch (error) {
        element('.output').innerHTML = 'Error';
    }
}

document.querySelectorAll('button').forEach(element => {
    element.addEventListener('click', function() {

        if (this.value === 'ac') {
            allClear();
        }
        else if (this.value === 'ce') {
            clearEntry();
        }
        else if (this.value === '=') {
            calculation();
        }
        else {
            displayInput(this.value);
        }
    });
});