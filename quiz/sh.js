const question = document.querySelector(".question");
const answers = document.querySelector(".answers");
const spnQtd = document.querySelector(".spnQtd");
const textFinish = document.querySelector(".finish span");
const content = document.querySelector(".content");
const contentFinish = document.querySelector(".finish");
const btnRestart = document.querySelector("#btnRestart");

import questions from "./queque.js";

let currentIndex = 0;
let questionsCorrect = 0;

btnRestart.onclick = async () => {
    try {
      const formData = new FormData();
      formData.append('result', questionsCorrect);

      console.log([...formData]);
  
      const response = await fetch('./portal/quiz_inset.php', {
        method: 'POST',
        body: formData
      });
  
      if (!response.ok) {
        throw new Error('Network response was not OK');
      }
  
      const data = await response.json();
  
      console.log(data);
    } catch (error) {
      console.error(error);
    }
  
    content.style.display = "flex";
    contentFinish.style.display = "none";
  
    currentIndex = 0;
    questionsCorrect = 0;
  
    loadQuestion();
  };


function nextQuestion(e) {
  if (e.target.getAttribute("data-correct") === "true") {
    questionsCorrect++;
  }

  if (currentIndex < questions.length - 1) {
    currentIndex++;
    loadQuestion();
  } else {
    finish();
  }
}

function finish() {
  textFinish.innerHTML = `Você acertou ${questionsCorrect} de ${questions.length}`;
  content.style.display = "none";
  contentFinish.style.display = "flex";
}

function loadQuestion() {
  spnQtd.innerHTML = `${currentIndex + 1}/${questions.length}`;
  const item = questions[currentIndex];
  answers.innerHTML = "";
  question.innerHTML = item.question;

  item.answers.forEach((answer) => {
    const div = document.createElement("div");

    div.innerHTML = `
    <button class="answer" data-correct="${answer.correct}">
      ${answer.option}
    </button>
    `;

    answers.appendChild(div);
  });

  document.querySelectorAll(".answer").forEach((item) => {
    item.addEventListener("click", nextQuestion);
  });
}

loadQuestion();