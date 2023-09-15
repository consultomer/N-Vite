const input1 = document.getElementById('input1');
const input2 = document.getElementById('input2');
const input3 = document.getElementById('input3');
const input4 = document.getElementById('input4');
const input5 = document.getElementById('input5');
const heading = document.getElementById('myHeading');
const myPhone = document.getElementById('myPhone');
const paragraph2 = document.getElementById('myParagraph2');
const paragraph3 = document.getElementById('myParagraph3');
const myDate = document.getElementById('myDate');

function updateText() {
  const text1 = input1.value;
  const text2 = input2.value;
  const text3 = input3.value;
  const text4 = input4.value;
  const text5 = input5.value;

  heading.textContent = text1;
  myPhone.textContent = text2;
  paragraph2.textContent = text3;
  paragraph3.textContent = text4;
  myDate.textContent = text5;

}

input1.addEventListener('input', updateText);
input2.addEventListener('input', updateText);
input3.addEventListener('input', updateText);
input4.addEventListener('input', updateText);
input5.addEventListener('input', updateText);

