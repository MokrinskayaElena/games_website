
function initializeLevelButtons() {
    // Обновляем отображение значения requiredScore
    const scoreDisplay = document.getElementById('scoreDisplay');
    if (scoreDisplay) {
        scoreDisplay.textContent = requiredScore;
    }

    const btnLevel1 = document.getElementById("level1");
    const btnLevel2 = document.getElementById("level2");
    const btnLevel3 = document.getElementById("level3");

    btnLevel1.onclick = () => {
        window.location.href = "/three_in_row?level=0";
    };

    btnLevel2.onclick = () => {
        window.location.href = "/three_in_row?level=1";
    };
    btnLevel3.onclick = () => {
        window.location.href = "/three_in_row?level=2";
    };
}

// вызываем после загрузки DOM
window.addEventListener('DOMContentLoaded', initializeLevelButtons);

// createLevelButtons();

