//  menyimpan jumlah poin
let botSums = 0;
let mySums = 0;

let botASCards = 0;
let myASCards = 0;
// mnyimpan daftar kartu
let cards;
// pemain bisa cek ambil krtu atau tdk
let isCanHit = true;
// gabungkan nhtml dan js
const startGameButton = document.getElementById("btn-start-game");
const takeCardButton = document.getElementById("btn-take");
const holdCardsButton = document.getElementById("btn-hold");
// mnpilkan jumlah poin dan uang pemain
const mySumsElement = document.getElementsByClassName("my-sums")[0];
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementsByTagName("input")[0];
// jumlh poin bot
const botSumsElement = document.getElementsByClassName("bot-sums")[0];
const botCardsElement = document.getElementsByClassName("bot-cards")[0];

const resultElement = document.getElementById("result");

window.onload = () => {
    // siapkan permainan
    // mengisi dftr kartu
    buildUserCards();
    // mengajak krtu
    shuffleCards();
    takeCardButton.setAttribute("disabled", true);
    holdCardsButton.setAttribute("disabled", true);
};
// fungsi dftr krtu
function buildUserCards() {
// H=HATI,B=WAJIK,S=SEKOP,K=KERITING
    let cardTypes = ["H", "B", "S", "K"];
    let cardValues = [
        "A",
        "2",
        "3",
        "4",
        "5",
        "6",
        "7",
        "8",
        "9",
        "10",
        "K",
        "Q",
        "J",
    ];
    cards = [];
// mncri tipe card sprti kelor dll
    for (let i = 0; i < cardTypes.length; i++) {
        // tipe value sprti 1234
        for (let j = 0; j < cardValues.length; j++) {
            // gabungkan 
            cards.push(cardValues[ 
                j] + "-" + cardTypes[i]);
        }
    }
}
// mngck krtu
function shuffleCards() {
    for (let i = 0; i < cards.length; i++) {
        // mnghsilkn angka acak randomnum antara 0 dan pnjng array
        let randomNum = Math.floor(Math.random() * cards.length);
        let temp = cards[i];
        cards[i] = cards[randomNum];
        cards[randomNum] = temp;
    }
}

startGameButton.addEventListener("click", function () {
    if (parseInt(myMoney.textContent) <=0) {
        alert("Maaf,uang Anda sdh hbs.Silahkan isi uang Anda untuk bermain.");
        return;
    }
    //  klik star lngsung try again
    if (startGameButton.textContent === "TRY AGAIN") {
        botSums = 0;
        mySums = 0;
        botASCards = 0;
        myASCards = 0;
        isCanHit = true;
// mncri gmbr yg ada di html
        const allCardsImage = document.querySelectorAll("img");
        // mengiterasi gmbr
        for (let i = 0; i < allCardsImage.length; i++) {
            allCardsImage[i].remove();
        }
// carbot kartu trblik setelah di hps memakai ini lgi kode
        let cardImg = document.createElement("img");
        cardImg.src = "assets/cards/BACK.png";
        cardImg.className = "hidden-card";
        botCardsElement.append(cardImg);
// mengisi ulng krtu
        buildUserCards();
        shuffleCards();
    }
// tombol di aktfkan atau prpindahan dri start dan slngjutny
    takeCardButton.disabled = false;
    holdCardsButton.disabled = false
    // button start diubah ke try again
    startGameButton.textContent = "TRY AGAIN";
    startGameButton.setAttribute("disabled", true);
// perulangan
// awal krtu pemain 2
    for (let i = 0; i < 2; i++) {
        let cardImg = document.createElement("img");
        let card = cards.pop();
        cardImg.src = `assets/cards/${card}.png`;
        mySums += getValueOfCard(card);
        myASCards += checkASCard(card);
        mySumsElement.textContent = mySums;
        myCardsElement.append(cardImg);
    }
});
// takecart buttton
takeCardButton.addEventListener("click", function () {
    // cek kondisi apakah bisa mngmbl krtu atau tdk
    if (!isCanHit) return;

    let cardImg = document.createElement("img");
    let card = cards.pop();
    cardImg.src = `assets/cards/${card}.png`;
    mySums += getValueOfCard(card);
    myASCards += checkASCard(card);
    mySumsElement.textContent = mySums;
    myCardsElement.append(cardImg);
// klau lbh dri 21 brrti dia tdk bisa ambil kartu 
    if (reduceASCardValue(mySums, myASCards) > 21) isCanHit = false;
// dan kalah
    if (mySums > 21) {
        takeCardButton.disabled = true;
        holdCardsButton.disabled = true;
        startGameButton.disabled = false;
        resultElement.textContent = "You lose. You can't take a new card";
    // uang di kurang dngn adanya taruhan
        myMoney.textContent -= inputMoney.value;
    }
});
// button holdcard
// mmbrhntikan permainan selama 1 detik
holdCardsButton.addEventListener("click", function () {
    setTimeout(() => {
        document.getElementsByClassName("hidden-card")[0].remove();
    }, 1000);

    const addBotCards = () => {
        setTimeout(() => {
            // acak kartu dri kartu both/mnmplkn smua kartu
            let cardImg = document.createElement("img");
            let card = cards.pop();
            cardImg.src = `assets/cards/${card}.png`;
            botSums += getValueOfCard(card);
            botASCards += checkASCard(card);
            botCardsElement.append(cardImg);
            botSumsElement.textContent = botSums;
// klau kurang dri 18 bisa ambil kartu
            if (botSums < 18) {
                addBotCards();
            } else {
                // nilai AS
                botSums = reduceASCardValue(botSums, botASCards);
                mySums = reduceASCardValue(mySums, myASCards);
                isCanHit = false;

                let message = "";
                if (mySums > 21 || mySums % 22 < botSums % 22) {
                    message = "You lose. You can't take a new card";
                    myMoney.textContent -= inputMoney.value;
                } else if (botSums > 21 || mySums % 22 > botSums % 22) {
                    message = "You Win";
                    myMoney.textContent = inputMoney.value * 2 * 3;
                } else if (mySums === botSums) message = "SERI";

                resultElement.textContent = message;
                startGameButton.disabled = false;
                takeCardButton.disabled = true;
                holdCardsButton.disabled = true;
            }
        }, 1000);
    };

    addBotCards();
});

function getValueOfCard(card) {
    let cardDetail = card.split("-");
    let value = cardDetail[0];
// cek angka atau hrf sprti AS
    if (isNaN(value)) {
        // Kartu AS
        if (value == "A") return 11;
        // Kartu K, Q, J
        else return 10;
    }
// untuk mengubah string menjadi bilangan bulat. 
    return parseInt(value);
}
// Fungsi ini memeriksa apakah kartu tersebut memiliki huruf "A" (As) pada posisi pertama atau tidak. Jika kartu memiliki "A" di posisi pertama,
//  maka fungsi mengembalikan 1, yang mungkin menunjukkan
//  bahwa kartu tersebut adalah As. Jika tidak, maka fungsi mengembalikan 0, menunjukkan bahwa kartu bukan As.
function checkASCard(card) {
    if (card[0] == "A") return 1;
    else return 0;
}
// untuk mengurangi nilai kartu As

function reduceASCardValue(sums, asCards) {
    while (sums > 21 && asCards > 0) {
        sums -= 10;
        asCards -= 1;
    }
    return sums;
}
