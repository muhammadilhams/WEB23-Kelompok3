let cards = []; //untuk menyimpan kartu
let sum = 0; //menghitung total dr beberapa nilai
let hasBlackjack = false; //untuk lacak permainannya udah dapat blackjack 
let isAlive = true;

let message = "";
let messageEl = document.getElementById("message-el") // get message

// user
let sumEl = document.getElementById("sum-el");
let cardsEl = document.getElementById("cards-el");

// ai
let aiSum = 0;
let aiEl = document.getElementById("ai-el");
let aiCardsEl = document.getElementById("ai-cards-el");
let aiCards = [];

let aiIsAlive = true;

let aiAceCount = 0;
let yourAceCount = 0; 

let startBtn = document.getElementById("start")
let addBtn = document.getElementById("new-card")
let holdBtn = document.getElementById("hold")

// credit
let userCredit = 25000
let finalCredit = document.getElementById("credit")
finalCredit.textContent += userCredit

let aiCredit = Math.floor(Math.random * 1000)

// bet
let bet = 0
let betBtn = document.getElementById("input-bet-btn")
let theBet = document.getElementById("input-bet")
let yourBet = document.getElementById("bet")
let arrBet = []

let deck

function getBet() {
    if (theBet.value !== "") {
        arrBet.push(theBet.value)
        yourBet.textContent += arrBet
        console.log(parseInt(arrBet));

        // adding hover to start button
        startBtn.addEventListener("mouseover", function() {
            startBtn.style.boxShadow = "0 0 10px 5px #0000007d"
            startBtn.style.cursor = "Pointer"
        })
        
        startBtn.addEventListener("mouseout", function() {
            startBtn.style.boxShadow = "none"
        })

        // removing style from bet button
        betBtn.style.boxShadow = "none"
        betBtn.style.cursor = "auto"
    } return
}

function start() {
    if (theBet.value != "") {
        buildDeck();
        shuffleDeck();
        startGame();

        addBtn.style.background = "Black"
        addBtn.style.color = "White"
        addBtn.addEventListener("mouseover", function() {
            addBtn.style.cursor = "Pointer"
            addBtn.style.boxShadow = "0 0 10px 5px #0000007d"
        })
        
        addBtn.addEventListener("mouseout", function() {
            addBtn.style.boxShadow = "none"
        })

        // styline hold button
        holdBtn.style.background = "Black"
        holdBtn.style.color = "White"
        holdBtn.addEventListener("mouseover", function() {
            holdBtn.style.boxShadow = "0 0 10px 5px #0000007d"
            holdBtn.style.cursor = "Pointer"
        })
        
        holdBtn.addEventListener("mouseout", function() {
            holdBtn.style.boxShadow = "none"
        })

        startBtn.style.background = "White"
        startBtn.style.color = "Black"
    }
}

function buildDeck() {
    let values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    let types = ["C", "D", "H", "S"];
    deck = [];

    for (let i = 0; i < types.length; i++) {
        for (let j = 0; j < values.length; j++) {
            deck.push(values[j] + "-" + types[i]); 
        }
    }
}

function shuffleDeck() {
    for (let i = 0; i < deck.length; i++) {
        let j = Math.floor(Math.random() * deck.length); 
        let temp = deck[i];
        deck[i] = deck[j];
        deck[j] = temp;
    }
}

function startGame() {
    document.getElementById("new-card").addEventListener("click", addCard)
    document.getElementById("hold").addEventListener("click", holdCard)
}

function addCard() {
    if (!isAlive) {
        return;
    }

    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    sum += getValue(card);
    yourAceCount += checkAce(card);
    cardsEl.append(cardImg);

    if (reduceAce(sum, yourAceCount) > 21 || (sum, yourAceCount) == 21) {
        isAlive = false;
        displayMessage()
    }
    displaySum()
};

function holdCard() {
    if (isAlive && !hasBlackjack) {
        isAlive = false;
        aiTurn();
    }
};

function displaySum() {
    sumEl.textContent = "Your Sum: " + sum;
    aiEl.textContent = "AI Sum: " + aiSum;
}

function displayMessage() {
    if (sum == 21) {
        message = "You've Got Blackjack!"
        finalCredit.textContent = "Your Credit: " + (userCredit + parseInt(arrBet));
    } else if (sum > 21) {
        message = "You're out of game."
        finalCredit.textContent = "Your Credit: " + (userCredit - parseInt(arrBet));
    } else if (aiSum > 21) {
        message = "You Win!";
        finalCredit.textContent = "Your Credit: " + (userCredit + parseInt(arrBet));
    } else if (sum == aiSum) {
        message = "Tie."
    } else if (sum > aiSum) {
        message = "You Win!";
        finalCredit.textContent = "Your Credit: " + (userCredit + parseInt(arrBet));
    } else if (sum < aiSum) {
        message = "You Lose!";
        finalCredit.textContent = "Your Credit: " + (userCredit - parseInt(arrBet));
    }

    messageEl.textContent = message;
}

function aiTurn() {
    if (aiIsAlive == true) {
        const aiInterval = 1000; // Delay between showing cards in milliseconds
        let index = 0;

        function displayNextCard() {
            if (aiSum < 12) {
                let cardImg = document.createElement("img");
                let card = deck.pop();
                cardImg.src = "./cards/" + card + ".png";
                aiSum += getValue(card);
                aiAceCount += checkAce(card);
                aiCardsEl.append(cardImg);
                displaySum();

                index++;

                if (index < aiInterval) {
                    setTimeout(displayNextCard, aiInterval);
                }
                displayMessage();
            }
        }

        displayNextCard();
    }
}

function getValue(card) {
    let data = card.split("-");
    let value = data[0];

    if (isNaN(value)) { 
        if (value == "A") {
            return 11;
        }
        return 10;
    }
    return parseInt(value);
}

function checkAce(card) {
    if (card[0] == "A") {
        return 1;
    }
    return 0;
}

function reduceAce(playerSum, playerAceCount) {
    while (playerSum > 21 && playerAceCount > 0) {
        playerSum -= 10;
        playerAceCount -= 1;
    }
    return playerSum;
}