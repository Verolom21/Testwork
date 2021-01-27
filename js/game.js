let cells = document.querySelectorAll('#game td')
let whoMove = document.querySelector('#who-move')

function start(cells) {
    let i = 0;
    let data = ['X', 'O']
    whoMove.innerHTML = data[0]

    for (let cell of cells) {
        cell.addEventListener('click', function add() {
            cell.removeEventListener('click', add)
            this.innerHTML = data[i % 2]
            whoMove.innerHTML = data[(i + 1) % 2]
            i++
            console.log(i)

            if (isVictory(cells)) {
                setTimeout(function() {
                    alert('Победили ' + data[(i + 1) % 2])
                    i = 0;
                    clear(cells)
                    return false;
                },1)
            start(cells)

            }
            if (i == 9) {
                setTimeout(function() {
                    alert('Ничья!')
                    clear(cells)
                    i = 0;
                },1)
                start(cells)
            }

        })

    }
}

function isVictory(cells) {
    let combs = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6],
    ];

    for (let comb of combs) {
        if (
            cells[comb[0]].innerHTML == cells[comb[1]].innerHTML &&
            cells[comb[1]].innerHTML == cells[comb[2]].innerHTML &&
            cells[comb[0]].innerHTML != ''
        ) {
            return true;
        }
    }

    return false;
}

function clear(cells) {
    for (let cell of cells) {
        cell.innerHTML = ''
    }
}

start(cells)

document.querySelector('#newGame').addEventListener(function(e) {
    e.preventDefault()
    start(cells)
})