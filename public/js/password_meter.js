var m_strUpperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
var m_strLowerCase = "abcdefghijklmnopqrstuvwxyz";
var m_strNumber = "0123456789";
var m_strCharacters = "!@#$%^&*?_~";

function checkPwdStrength() {
    var pwd = document.getElementById("password").value;
    len = pwd.length;

    var scorebar = document.getElementById('scorebar');
    var comp = "";

    if (len == 0) {
        scorebar.style.width = "0%"
        comp = "";
    } else {
        scr = parseInt(getPwdScore(pwd));

        if (scr >= 90) {
            scorebar.style.width = "100%"
            scorebar.style.background = "#06bf06";
            comp = "Very Strong";
        } else if (scr >= 70) {
            scorebar.style.width = "80%"
            scorebar.style.background = "#2bc24d";
            comp = "Strong";
        } else if (scr >= 50) {
            scorebar.style.width = "60%"
            scorebar.style.background = "#34eb5e";
            comp = "Good";
        } else if (scr >= 30) {
            scorebar.style.width = "40%"
            scorebar.style.background = "#ffff00";
            comp = "Weak";
        } else if (scr >= 0) {
            scorebar.style.width = "20%"
            scorebar.style.background = "#de1616";
            comp = "Very Weak";
        }
    }

    document.getElementById('complexity').innerHTML = comp;
    return false;
}

function getPwdScore(strPassword) {
    // Reset combination count
    var nScore = 0;

    // Password length
    // -- Less than 4 characters
    if (strPassword.length < 5) {
        nScore += 5;
    }
    // -- 5 to 7 characters
    else if (strPassword.length > 4 && strPassword.length < 8) {
        nScore += 10;
    }
    // -- 8 or more
    else if (strPassword.length > 7) {
        nScore += 25;
    }

    // Letters
    var nUpperCount = countContain(strPassword, m_strUpperCase);
    var nLowerCount = countContain(strPassword, m_strLowerCase);
    var nLowerUpperCount = nUpperCount + nLowerCount;
    // -- Letters are all lower case
    if (nUpperCount == 0 && nLowerCount != 0) {
        nScore += 10;
    }
    // -- Letters are upper case and lower case
    else if (nUpperCount != 0 && nLowerCount != 0) {
        nScore += 20;
    }

    // Numbers
    var nNumberCount = countContain(strPassword, m_strNumber);
    // -- 1 number
    if (nNumberCount == 1) {
        nScore += 10;
    }
    // -- 3 or more numbers
    if (nNumberCount >= 3) {
        nScore += 20;
    }

    // Characters
    var nCharacterCount = countContain(strPassword, m_strCharacters);
    // -- 1 character
    if (nCharacterCount == 1) {
        nScore += 10;
    }
    // -- More than 1 character
    if (nCharacterCount > 1) {
        nScore += 25;
    }

    // Bonus
    // -- Letters and numbers
    if (nNumberCount != 0 && nLowerUpperCount != 0) {
        nScore += 2;
    }
    // -- Letters, numbers, and characters
    if (nNumberCount != 0 && nLowerUpperCount != 0 && nCharacterCount != 0) {
        nScore += 3;
    }
    // -- Mixed case letters, numbers, and characters
    if (nNumberCount != 0 && nUpperCount != 0 && nLowerCount != 0 &&
        nCharacterCount != 0) {
        nScore += 5;
    }

    return nScore;
}

// Checks a string for a list of characters
function countContain(strPassword, strCheck) {
    // Declare variables
    var nCount = 0;

    for (i = 0; i < strPassword.length; i++) {
        if (strCheck.indexOf(strPassword.charAt(i)) > -1) {
            nCount++;
        }
    }

    return nCount;
}