/*const canvas = document.getElementById('treeCanvas');
const ctx = canvas.getContext('2d');

// Carica l'immagine dell'albero
const treeImage = new Image();
treeImage.src = 'images/tree-flowers.svg'; // Percorso dell'immagine

// Array per i petali
let petals = [];

// Disegna l'albero
treeImage.onload = function() {
    ctx.drawImage(treeImage, 0, canvas.height - treeImage.height);
    startPetals(); // Inizia a far cadere i petali
};

// Funzione per creare i petali
function startPetals() {
    setInterval(() => {
        let petal = {
            x: Math.random() * canvas.width, // Posizione casuale
            y: 0, // Partono dall'alto
            size: Math.random() * 5 + 3, // Dimensioni casuali
            speed: Math.random() * 2 + 1, // Velocità di caduta casuale
            rotation: Math.random() * 360 // Rotazione casuale
        };
        petals.push(petal);
    }, 100);
}

// Funzione per disegnare e animare i petali
function drawPetals() {
    ctx.clearRect(0, 0, canvas.width, canvas.height); // Pulisce il canvas

    // Ridisegna l'albero
    ctx.drawImage(treeImage, 0, canvas.height - treeImage.height);

    // Disegna e anima ogni petalo
    petals.forEach((petal, index) => {
        ctx.save();
        ctx.translate(petal.x, petal.y);
        ctx.rotate(petal.rotation * Math.PI / 180);
        ctx.fillStyle = 'white'; // Colore dei petali
        ctx.beginPath();
        ctx.arc(0, 0, petal.size, 0, Math.PI * 2); // Disegna il cerchio del petalo
        ctx.fill();
        ctx.restore();

        // Aggiorna la posizione di caduta del petalo
        petal.y += petal.speed; // Fa cadere il petalo

        // Se il petalo è fuori dal canvas, lo rimuoviamo
        if (petal.y > canvas.height) {
            petals.splice(index, 1);
        }
    });

    requestAnimationFrame(drawPetals); // Crea l'animazione continua
}

// Avvia l'animazione dei petali
drawPetals();

 */
