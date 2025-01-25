const guessInput = document.getElementById('guessInput');
const guessButton = document.getElementById('guessButton');
const resultElement = document.getElementById('result');

let secretNumber = Math.floor(Math.random() * 100) + 1;
let attempts = 0;

guessButton.addEventListener('click', () => {
  const userGuess = parseInt(guessInput.value);
  attempts++;

  if (userGuess === secretNumber) {
    resultElement.textContent = `Congratulations! You guessed the number in ${attempts} attempts.`;
  } else if (userGuess < secretNumber) {
    resultElement.textContent = 'Too low. Try again.';
  } else {
    resultElement.textContent = 'Too high. Try again.';
  }
});