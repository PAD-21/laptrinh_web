var ThieuHoa = new Array(4);
var curPosition = 0;
var jumping;
var direction = "up";

ThieuHoa[0] = new Image();
ThieuHoa[0].src = "img/jump00.png";
ThieuHoa[1] = new Image();
ThieuHoa[1].src = "img/jump01.png";
ThieuHoa[2] = new Image();
ThieuHoa[2].src = "img/jump02.png";
ThieuHoa[3] = new Image();
ThieuHoa[3].src = "img/jump03.png";

function Jump() {
    if (direction == "up") {
        if (curPosition == 3) {
            --curPosition;
            direction = "down";
        } else {
            ++curPosition;
        }
    } else {
        if (curPosition == 0) {
            ++curPosition;
            direction = "up";
        } else {
            --curPosition;
        }
    }
    document.ThieuHoa.src = ThieuHoa[curPosition].src;
}

function startJumping() {
    if (jumping) {
        clearInterval(jumping);
    }
    jumping = setInterval("Jump()",200);
}