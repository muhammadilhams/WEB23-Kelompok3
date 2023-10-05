function isPanlindrome(word) {
    // word = word.replace(/\s/g, "").toLowerCase();
    for (let i = 0; i < word.length / 2; i++) {
        if (word[i] !== word[word.length - 1 - i]) {
            return false;
        }
    }
    return true;
}
let kata = "121";
if (isPanlindrome(kata)){
    console.log(kata + " adalah palindrome.");
} else {
    console.log(kata + " bukan palindrome.");
}