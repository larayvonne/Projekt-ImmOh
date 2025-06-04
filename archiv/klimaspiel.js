document.addEventListener('DOMContentLoaded', () => {
    const startBtn = document.getElementById('start-btn');
    const scoreDisplay = document.getElementById('score');
    const gameArea = document.getElementById('game-area');
  
    let score = 0;
    let gameTime = 10; // Sekunden
  
    function randomPosition() {
      const x = Math.random() * (gameArea.clientWidth - 500); // hier wird random Position festgelegt / spiele area ändern wo müll angezeigt werden kann  
      const y = Math.random() * (gameArea.clientHeight - 500);
      return { x, y };
    }
  
    function createTrash() { // hier wird der müll erstellt (hier noch herrausfinden wie Müll als button element hinterlegt ist)
      const trash = document.createElement('div');
      trash.classList.add('circle');
      trash.textContent = '🗑️';
  
      const { x, y } = randomPosition(); // hier wird festgelegt  / Const = Objekt 
      trash.style.left = `${x}px`;
      trash.style.top = `${y}px`;
  
      trash.addEventListener('click', () => {
        score++;
        scoreDisplay.textContent = `Gesammelter Müll: ${score}`;
        trash.remove();
        createTrash();
      });
  
      gameArea.appendChild(trash);
    }
  
    function startGame( ) { // hier muss dann hinterlegt werden, dass bei start text verschwindet 
      score = 0;
      scoreDisplay.textContent = 'Gesammelter Müll: 0';
      gameArea.innerHTML = '';
      createTrash();
      startBtn.disabled = true;
      
  
      setTimeout(() => {
        gameArea.innerHTML = ''; // hier ist ein Pop-up und alert hinterlegt 
        alert(`🌱 Super! Du hast ${score} Müllstücke eingesammelt.`);
        startBtn.disabled = false;
      }, gameTime * 1000); // hier wird gametime in sek angezeigt 
    }
  
    startBtn.addEventListener('click', startGame);
    
  });