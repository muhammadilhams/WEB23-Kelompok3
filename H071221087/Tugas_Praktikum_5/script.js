const body = document.body;

function gantiWarna(btn) {
    btn.style.backgroundColor = "white";
}

function gantiWarnaOut(btn) {
    btn.style.backgroundColor = "green";
}

function gantiWarnaHit(btn) {
    btn.style.backgroundColor = "grey";
}


let modalAwal = 5000;

let h3 = document.createElement("h3");
h3.textContent = "Jumlah Chip : $" + modalAwal;
h3.classList.add("jumchip")

let chip = document.getElementById("chip");
chip.appendChild(h3);

let taruhan = document.getElementById("taruhan");
let nilaiTaruhan = 0;
let takebtnclicked = false;
let totalKartuPlayer = 0;
let totalKartuComputer = 0;

let nilaiKartu = {
    '2_of_clubs': 2,
    '3_of_clubs': 3,
    '4_of_clubs': 4,
    '5_of_clubs': 5,
    '6_of_clubs': 6,
    '7_of_clubs': 7,
    '8_of_clubs': 8,
    '9_of_clubs': 9,
    '10_of_clubs': 10,
    'jack_of_clubs': 10,
    'queen_of_clubs': 10,
    'king_of_clubs': 10,
    'ace_of_clubs': 11,
    '2_of_hearts': 2,
    '3_of_hearts': 3,
    '4_of_hearts': 4,
    '5_of_hearts': 5,
    '6_of_hearts': 6,
    '7_of_hearts': 7,
    '8_of_hearts': 8,
    '9_of_hearts': 9,
    '10_of_hearts': 10,
    'jack_of_hearts': 10,
    'queen_of_hearts': 10,
    'king_of_hearts': 10,
    'ace_of_hearts': 11,
    '2_of_spades': 2,
    '3_of_spades': 3,
    '4_of_spades': 4,
    '5_of_spades': 5,
    '6_of_spades': 6,
    '7_of_spades': 7,
    '8_of_spades': 8,
    '9_of_spades': 9,
    '10_of_spades': 10,
    'jack_of_spades': 10,
    'queen_of_spades': 10,
    'king_of_spades': 10,
    'ace_of_spades': 11,
    '2_of_diamonds': 2,
    '3_of_diamonds': 3,
    '4_of_diamonds': 4,
    '5_of_diamonds': 5,
    '6_of_diamonds': 6,
    '7_of_diamonds': 7,
    '8_of_diamonds': 8,
    '9_of_diamonds': 9,
    '10_of_diamonds': 10,
    'jack_of_diamonds': 10,
    'queen_of_diamonds': 10,
    'king_of_diamonds': 10,
    'ace_of_diamonds': 11,
};


deck = [];

function acakKartu() {
    let nilaiKartu = ['ace', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'jack', 'queen', 'king'];
    let suitKartu = ['clubs', 'diamonds', 'hearts', 'spades'];

    if (deck.length === 0) {
        for (let i = 0; i < suitKartu.length; i++) {
            for (let j = 0; j < nilaiKartu.length; j++) {
                let card = nilaiKartu[j] + '_of_' + suitKartu[i];
                deck.push(card);
            }
        }
    }

    let index = Math.floor(Math.random() * deck.length);
    let kartu = deck[index];
    deck.splice(index, 1);

    return kartu;
}

function appendCardImage(element, kartu) {
    let image = document.createElement("img");
    image.src = 'images/cards/' + kartu + '.png';
    image.style.width = "70px";
    image.style.height = "90px";
    image.style.paddingBottom = "0px";
    element.appendChild(image);
}

function playAgain() {
    let tryagainbtn = document.createElement("button")
    tryagainbtn.textContent = "TRY AGAIN"
    tryagain.appendChild(tryagainbtn)
    tryagainbtn.style.height = "40px"
    tryagainbtn.style.backgroundColor = "red";
    tryagainbtn.style.Color = "white";
    tryagainbtn.style.padding = "10px";
    tryagainbtn.style.borderRadius = "15px";
}

function computerWin() {
    winner.textContent = "Istri plankton Menang!";
}

function playerWin() {
    winner.textContent = "Kakegurui  Menang!";
}

function seri() {
    winner.textContent = "Seri"    
}

document.getElementById("hitbtn").disabled = true;
document.getElementById("holdbtn").disabled = true;

document.getElementById("takebtn").addEventListener("click", function () {
    nilaiTaruhan = parseInt(taruhan.value);
    if (!isNaN(nilaiTaruhan) && nilaiTaruhan > 0 && nilaiTaruhan <= modalAwal) {
        modalAwal -= nilaiTaruhan;
        h3.textContent = "Jumlah chip Anda : $" + modalAwal;

        let kartuPlayer1 = acakKartu();
        let kartuPlayer2 = acakKartu();
        let kartuComputer1 = acakKartu();

        totalKartuPlayer += nilaiKartu[kartuPlayer1];
        totalKartuPlayer += nilaiKartu[kartuPlayer2];
        totalKartuComputer += nilaiKartu[kartuComputer1];

        let h5player1 = document.createElement("h5");
        h5player1.textContent = kartuPlayer1;

        let h5player2 = document.createElement("h5");
        h5player2.textContent = kartuPlayer2;

        playerSums.textContent = "SUMS: " + totalKartuPlayer;

        let kartuPlayer = document.getElementById("kartuPlayer");
        appendCardImage(kartuPlayer, kartuPlayer1);
        appendCardImage(kartuPlayer, kartuPlayer2);

        let h5 = document.createElement("h5");
        h5.textContent = kartuComputer1;

        computerSums.textContent = "SUMS: " + totalKartuComputer;

        let kartuComputer = document.getElementById("kartuComputer");
        appendCardImage(kartuComputer, kartuComputer1);

        takebtnclicked = true;

        document.getElementById("takebtn").disabled = true;
        document.getElementById("resetbtn").disabled = true;

        document.getElementById("hitbtn").disabled = false;
        document.getElementById("holdbtn").disabled = false;

        if (totalKartuPlayer > 21) {
            computerWin();
            playAgain();

            document.getElementById("hitbtn").disabled = true;
            document.getElementById("holdbtn").disabled = true;
        } else {

        }
    } else {
        alert("Taruhan tidak valid atau modal anda kurang.");
    }
    taruhan.value = "";
});

document.getElementById("resetbtn").addEventListener("click", function () {
    modalAwal = 5000;
    h3.textContent = "Jumlah chip Anda : $" + modalAwal;

    taruhan.value = "";
});

document.getElementById("hitbtn").addEventListener("click", function () {
    if (takebtnclicked && totalKartuPlayer <= 21) {
        let playerCardValue = acakKartu();
        totalKartuPlayer += nilaiKartu[playerCardValue];

        let h5 = document.createElement("h5");
        h5.textContent = playerCardValue;

        playerSums.textContent = "SUMS: " + totalKartuPlayer;
        kartuPlayer = document.getElementById("kartuPlayer");
        appendCardImage(kartuPlayer, playerCardValue)

        if (totalKartuPlayer > 21) {
            winner.textContent = "~~ BUSTED ~~";
            playAgain();

            document.getElementById("hitbtn").disabled = true;
            document.getElementById("holdbtn").disabled = true;
        }
    }
});

document.getElementById("holdbtn").addEventListener("click", function () {
    if (takebtnclicked) {
        while (totalKartuComputer < totalKartuPlayer) {
            let kartuComputer1 = acakKartu();
            totalKartuComputer += nilaiKartu[kartuComputer1];

            let h5 = document.createElement("h5");
            h5.textContent = kartuComputer1;
            computerSums.textContent = "SUMS: " + totalKartuComputer;
            let kartuComputer = document.getElementById("kartuComputer");
            appendCardImage(kartuComputer, kartuComputer1)
        }

        if (totalKartuComputer >= totalKartuPlayer && totalKartuComputer <= 21) {
            computerWin();
            playAgain();

            document.getElementById("hitbtn").disabled = true;
            document.getElementById("holdbtn").disabled = true;
        } else {
            let menang = nilaiTaruhan * 2;
            modalAwal += menang;
            h3.textContent = "Jumlah chip Anda : $" + modalAwal;

            playerWin();
            playAgain();
        }
        document.getElementById("hitbtn").disabled = true;
        document.getElementById("holdbtn").disabled = true;
    }
});

document.getElementById("tryagain").addEventListener("click", function () {
    totalKartuPlayer = 0;
    totalKartuComputer = 0;

    playerSums = document.getElementById("playerSums");
    playerSums.textContent = "SUMS: "

    computerSums = document.getElementById("computerSums");
    computerSums.textContent = "SUMS: "

    while (kartuPlayer.firstChild) {
        kartuPlayer.removeChild(kartuPlayer.firstChild);
    }

    while (kartuComputer.firstChild) {
        kartuComputer.removeChild(kartuComputer.firstChild);
    }

    winner.textContent = "";

    document.getElementById("takebtn").disabled = false;
    document.getElementById("resetbtn").disabled = false;

    document.getElementById("hitbtn").disabled = true;
    document.getElementById("holdbtn").disabled = true;

    tryagain.textContent = "";

});

let computerSums = document.getElementById("computerSums");
computerSums.textContent = "SUMS: "

let playerSums = document.getElementById("playerSums");
playerSums.textContent = "SUMS: "

